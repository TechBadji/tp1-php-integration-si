# Gestion des Produits avec API REST

Cette application PHP fournit une interface web et une API REST pour gérer une liste de produits stockés dans une base de données MySQL.

## Prérequis

* Serveur web (Apache, Nginx, etc.) avec PHP installé.
* MySQL ou MariaDB installé.
* Accès à phpMyAdmin ou un client MySQL pour créer la base de données.

## Installation

1.  Clonez ce dépôt ou téléchargez les fichiers.
2.  Créez une base de données MySQL nommée `gestion_produits`.
3.  Importez le fichier `schema.sql` (fourni dans le dépôt) pour créer la table `produits`.
4.  Modifiez le fichier `connexion.php` pour renseigner vos informations de connexion à la base de données.
5.  Placez les fichiers dans un dossier accessible par votre serveur web.
6.  Ouvrez `index.php` dans votre navigateur.

## Structure du projet
gestion_produits/
├── api/
│   ├── produits.php    # API pour la gestion des produits (liste, création)
│   ├── produit.php     # API pour la gestion d'un produit spécifique (détails, modification, suppression)
├── connexion.php       # Connexion à la base de données
├── index.php           # Page d'accueil (liste des produits)
├── ajouter_produit.php  # Formulaire pour ajouter un produit
├── modifier_produit.php # Formulaire pour modifier un produit
├── supprimer_produit.php # Script pour supprimer un produit

## Utilisation

### Interface web

* Ouvrez `index.php` dans votre navigateur pour voir la liste des produits.
* Cliquez sur "Ajouter un produit" pour ajouter un nouveau produit.
* Cliquez sur "Modifier" ou "Supprimer" pour modifier ou supprimer un produit existant.

### API REST

* **GET /api/produits** : Renvoie la liste de tous les produits au format JSON.
* **GET /api/produit/{id}** : Renvoie les détails d'un produit spécifique au format JSON.
* **POST /api/produit** : Crée un nouveau produit à partir des données JSON reçues.
* **PUT /api/produit/{id}** : Met à jour un produit existant à partir des données JSON reçues.
* **DELETE /api/produit/{id}** : Supprime un produit spécifique.

## Exemple de requêtes API

* **Obtenir la liste des produits :**
    ```
    GET /api/produits
    ```

* **Obtenir les détails du produit avec l'ID 1 :**
    ```
    GET /api/produit/1
    ```

* **Créer un nouveau produit :**
    ```
    POST /api/produit
    Content-Type: application/json

    {
      "nom": "Nouveau produit",
      "description": "Description du nouveau produit",
      "prix": 99.99,
      "quantite": 100
    }
    ```

* **Mettre à jour le produit avec l'ID 1 :**
    ```
    PUT /api/produit/1
    Content-Type: application/json

    {
      "nom": "Produit mis à jour",
      "description": "Description mise à jour",
      "prix": 129.99,
      "quantite": 50
    }
    ```

* **Supprimer le produit avec l'ID 1 :**
    ```
    DELETE /api/produit/1
    ```

## Sécurité

* Utilisez des requêtes préparées pour vous protéger contre les injections SQL.
* Validez les données saisies par l'utilisateur.
* Mettez en œuvre une authentification pour votre API.


## Auteur

Elias BADJI

## Licence

Ce projet est sous licence MIT.
