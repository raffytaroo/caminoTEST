J'ai utilisé MySQL, donc j'ai mis l’export de la base de donnée, comme demandé, avec l’hôte localhost, le nom de la base étant mon code lors de l’inscription et l’utilisateur root sans
mot de passe.

J'ai utilisé la météhode AJAX pour envoyer les données, la mise à jour des données est bien fonctionnelle.

Mini notice d'utilisation:
Il faut se diriger dans le dossier "views", sur la page "dashboard.html".
Sur cette page on a une entrée pour chaque message d'item. Cette entrée va être envoyé à la base de données, et la page va régulièrement être mise à jour en appellant cette base.
Le message enregistré actuellement dans la base ne va pas s'afficher dans l'input, afin d'éviter les collisions entre les messages de personnes différentes mais dans
un span juste au dessus. De plus on peut aussi désactiver l'affichage avec un switch (une checkbox).
On peut ensuite se rendre sur la page d'affichage en cliquant sur la navbar à gauche sur le bouton "visualisation".
Les données seront mis à jour en temps réel sur celle-ci, et si quelqu'un d'autre ouvre une autre page dashboard et met à jour les données, on les verra.

CASTRO-PESTANA Raphael
