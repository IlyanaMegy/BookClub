# 	BookClub 
## Projet php en groupe  : IRALOUR Claire, DE FREITAS Flavio, MEGY Ilyana.


BookClub est une bibliothèque virtuelle, vous pouvez trouver des livres que vous pourrez renseigner dans votre propre librairie comme livre lu, à lire ou en cours de lecture.
Vous pouvez laisser un commentaire ou une note sur un livre qu'il vous ait plu ou non, également vous pourrez interagir avec les autres lecteurs sur le forum du site.

Les langages utilisés pour développer ce site sont : HTML5, CSS3, JS et PHP.
Le PHP interagit avec la base de données, elle-même utilisant MySQL. Celle-ci peut être manipulée depuis l'interface de PhpMyAdmin.

Je vais vous donner ici la démarche pas à pas pour avoir accès à BookClub en local.

**0. Prérequis**
Pour pouvoir intéragir sur le site qui n'est pas encore hébergé sur le web, vous devrez le faire fonctionner en local.
Pour ça plusieurs logiciels sont requis:
 - Un logiciel permettant de mettre en place un serveur Web local
 Dans mon cas j'ai utilisé XAMPP, vous pouvez vous le procurer [ici](https://www.apachefriends.org/fr/download.html).
 Une fois ça télécharger vous aurez accès au dossier `C:\xampp` de votre machine.

**1. Ajout de BookClub sur votre PC**

Premièrement il vous faudra clone le repo git ici présent sur votre machine. Le dossier sera localiser dans le dossier `C:\xampp\htdocs` récemment créé.

---

**2. Base de Données**

Lancer XAMPP et activer le serveur Apache et sql
Aller sur la page PhpMyAdminet créer une nouvelle base de données `bookclub`.

Dans une première solution je vous montre comment créer la base de donnée `bookclub` qui sera vide de donnée, 
mais ensuite je vous montrerai comment importer ma propre base de données remplie de données que j'ai exporté en format sql dans le dossier `BookClub`.

 - Base de donnée vide de données
Dans le dossier BookClub, trouvez dans le dossier php le fichier `bdd.php` et executez le.
Celui-ci initialise la connexion avec votre base de données encore vide.
S'il n'y a aucune erreur, executez `bdd_config.php` qui remplira de tables et colonnes votre base de données.
A ce point vous avez une base de données avec des tables et des colonnes mais aucune donnée. 

- Importer Base de données remplie
Dans le dossier BookClub, trouvez le fichier bookclub.sql, retourner sur l'interface PhpMyAdmin et cliquez sur la base de données bookclub récemment créée.
Cliquez sur le bouton importer en au de la page et sélectionnez le fichier bookclub.sql.
Vous aurez donc bookclub avec des tables remplie.

---

**3. Accéder au site**
Dans votre barre de recherche aller sur `http://localhost:8080/BookClub/php/`, cela devrait vous emmener sur la page d'accueil.
Vous pouvez vous inscrire ou passer l'étage en entrant en tant que visiteur de passage, néanmoins vous aurez moins de fonctionnalités.

> Si tu es Claire, Flavio ou un de nous correcteurs, je t'invite à
> t'inscrire en tant qu’administrateur sur notre site. Pour cela va sur
> la page non renseignée
> `http://localhost:8080/BookClub/php/inscription_admin.php`. Cette page
> ne sert que pour vous inscrire.

---

**4.  Rôles et privilèges** 

Sur BookClub il y a 3 types de rôles qui confèrent chacun quelques privilèges.

![enter image description here](https://cdn.discordapp.com/attachments/889061317321838627/920621697378435102/roles.drawio.png)
