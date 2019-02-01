# Projet WEB - A2

Application web crée en deuxième années à l’EXIA CESI.
Thématique : Site web pour le BDE CESI.

Ce projet contient les fonctionnalités suivantes :
* Système d'inscription et connexion
* Page de présentation d'événement, de suggestions d'événement et d'un magasin
* Gestion des rôles (*Guest, Étudiant, Membre du BDE, Personnel établissement*)

**Etudiant :**
* Poster des suggestions d'événements
* S'inscrire a des événements
* Poster des images/commentaires
* Liker des images
* Acheter des articles dans la boutique
* Panier avec validation de commande

**Membre BDE :**
* Page d'administration pour les membres du BDE avec CRUD sur :
	* les événement
	* les suggestion
	* les articles de la boutique
	* les commentaires
* Notification pour chaque commande du magasin
* Notification pour chaque élément signalé

**Personnel établissement :**
* Possibilité de signaler des :
	* événements
	* suggestions
	* images
	* commentaires

## Prérequis

Ce projet utilise un [API node.js](https://github.com/Poulpynateur/A2-ProjetWeb-API) pour fonctionner.
Le fichier .env doit contenir :
* Paramètres de la BDD :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=
```
* Paramètres pour l'envois de mails :
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=mail@gmail.com
MAIL_PASSWORD=
MAIL_ENCRYPTION=ssl
```

## Créer avec

* [Laravel](https://laravel.com/) - Framework web PHP
* [Composer](https://getcomposer.org/) - Gestion des dépendances
* [Bootstrap](https://getbootstrap.com/) - CSS et responsivité
* [JQuery](https://jquery.com/) - Plugin JavaScript

## Auteurs

* **Théodore DAO** - *Front end* - [Pandahkiin](https://github.com/Pandahkiin)
* **Loïc BOLLENBACH** - *API node.js* - [Tank-White](https://github.com/Tank-White)
* **Nicolas DE GHESELLE** - *Back end* - [Poulpynateur](https://github.com/Poulpynateur)

