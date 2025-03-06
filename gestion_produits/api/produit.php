<?php
header("Content-Type: application/json; charset=UTF-8");

include '../connexion.php';

$methode = $_SERVER['REQUEST_METHOD'];
$chemin = explode('/', $_SERVER['REQUEST_URI']);
$id = isset($chemin[3]) ? $chemin[3] : null;

if (!isset($id)) {
    http_response_code(400);
    echo json_encode(["message" => "ID manquant."]);
    exit;
}

switch ($methode) {
    case 'GET':
        $requete = "SELECT * FROM produits WHERE id = $id";
        $resultat = $connexion->query($requete);
        if ($resultat->num_rows > 0) {
            echo json_encode($resultat->fetch_assoc());
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Produit non trouvé."]);
        }
        break;
    case 'PUT':
        $donnees = json_decode(file_get_contents("php://input"));
        $nom = $donnees->nom;
        $description = $donnees->description;
        $prix = $donnees->prix;
        $quantite = $donnees->quantite;
        $requete = "UPDATE produits SET nom = '$nom', description = '$description', prix = $prix, quantite = $quantite WHERE id = $id";
        if ($connexion->query($requete) === TRUE) {
            echo json_encode(["message" => "Produit mis à jour."]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Erreur : " . $connexion->error]);
        }
        break;
    case 'DELETE':
        $requete = "DELETE FROM produits WHERE id = $id";
        if ($connexion->query($requete) === TRUE) {
            echo json_encode(["message" => "Produit supprimé."]);
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