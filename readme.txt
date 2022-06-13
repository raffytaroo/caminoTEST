J'ai utilisé MySQL, vous pourrez importer la base avec le fichier localhost.sql, avec l’hôte localhost, le nom de la base étant mon code lors de l’inscription et l’utilisateur root sans mot de passe, comme demandé.

J'ai utilisé la méthode AJAX pour envoyer les données, la mise à jour des données est bien fonctionnelle et on peut définir l'intervalle d'actualisation à l'écran. Ici j'ai choisi d'actualiser toutes les 2 ou 3 secondes pour ne pas surcharger le serveur virtuel , mais si on utilise un serveur, on pourrait choisir d'actualiser toutes les demis secondes par exemple pour donner encore plus l'impression de temps réel.

Mini notice d'utilisation:
Il faut se diriger dans le dossier "views", sur la page "dashboardViews.html".
Sur cette page on a une entrée pour chaque message d'item. Cette entrée va être envoyée à la base de données, et la page va régulièrement être mise à jour en appelant cette base.

Le message enregistré actuellement dans la base ne va pas s'afficher dans l'input, afin d'éviter les collisions entre les messages de personnes différentes mais dans
un span juste au-dessus. De plus on peut aussi désactiver l'affichage avec un switch (une checkbox).
On peut ensuite se rendre sur la page d'affichage en cliquant sur la navbar à gauche sur le bouton "visualisation".
Les données seront mis à jour en temps réel sur celle-ci, et si quelqu'un d'autre ouvre une autre page dashboard et met à jour les données, on les verra.
La page visualisation s'adaptera selon la longueur des textes, ce qui permet un affichage flexible.

Pour ce qui est du responsive design, les deux pages s'adaptent selon la taille de l'écran, le site peut donc être proprement lu sur télephone ou sur tablette.
En effet sur la première , la barre de naviguation fait disparaître ses textes pour ne laisser place qu'à des logos. Sur la seconde, le slider d'image se retrouve en bas de page. En plus de cela, la taille des textes et éléments s'adaptent.


CASTRO-PESTANA Raphael
