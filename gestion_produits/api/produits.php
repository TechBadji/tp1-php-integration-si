<?php
header("Content-Type: application/json; charset=UTF-8");

include '../connexion.php';

$methode = $_SERVER['REQUEST_METHOD'];

switch ($methode) {
    case 'GET':
        $requete = "SELECT * FROM produits";
        $resultat = $connexion->query($requete);
        $produits = [];
        while ($ligne = $resultat->fetch_assoc()) {
            $produits[] = $ligne;
        }
        echo json_encode($produits);
        break;
    case 'POST':
        $donnees = json_decode(file_get_contents("php://input"));
        $nom = $donnees->nom;
        $description = $donnees->description;
        $prix = $donnees->prix;
        $quantite = $donnees->quantite;
        $requete = "INSERT INTO produits (nom, description, prix, quantite) VALUES ('$nom', '$description', $prix, $quantite)";
        if ($connexion->query($requete) === TRUE) {
            http_response_code(201);
            echo json_encode(["message" => "Produit créé avec succès."]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Erreur : " . $connexion->error]);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(["message" => "Méthode non autorisée."]);
        break;
}

$connexion->close();
?>