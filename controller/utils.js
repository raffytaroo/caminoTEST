 //Fonction qui créer le bon objet AJAX selon la version du navigateur
    /*AJAX utilise l'objet "XMLHttpRequest", qui est pris en compte par tout les navigateurs, à l'exception des versions la 7 de internet explorer. Celles-ci utilisent ActiveXObject */
    function getxhr() {
        try {
            xhrObject = new XMLHttpRequest(); // on essaie de créer un objet XMLHttpRequest
        }

        catch (e) { //Si cet objet ne fonctionne pas, alors on récupère l'erreur et..
            try {
                xhrObject = new ActiveXObject("Microsoft.XMLHTTP"); //.. on essaie de créer un objet activeX pour les versions 6 ou plus d'internet explorer..
            }

            catch (e1) { //si l'activeX ne fonctionne pas, alors on récupère l'erreur et..
                try {
                    xhrObject = new ActiveXObject("Msxml2.XMLHTTTP"); // ... on essaie de créer un objet activeX pour les versions 5 d'internet explorer..
                }

                catch (e2) { //.. si l'activeX ne fonctionne pas, alors on récupère l'erreur et on affiche un message:
                    alert("Erreur: AJAX n'est pas supporté par votre navigateur. Veuillez le mettre à jour"); //Ce message sera affiché pour les versions d'e 'internet explorer 5 ou moins (datant d'avant 2001, donc improbable)
                }
            }
        }

        return xhrObject;
    }
 
 //fonction qui permet la récupération des messages AJAX
 function getAjaxMsg(onReceive) {
    //1. création AJAX / connexion au server
    const xhr = getxhr();
    xhr.open("POST", "../controller/handlerElement.php");

    //2. traitement des données récupérés
    xhr.onload = function(){
        const resultat = JSON.parse(xhr.responseText);
        onReceive(resultat);
    };
    //3. envoie de la requête
    xhr.send();
}
