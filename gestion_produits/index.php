<!DOCTYPE html>
<html>
<head>
    <title>Gestion des produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="liste-produits">
        </tbody>
    </table>
    <br>
    <a href="ajouter_produit.php">Ajouter un produit</a>

    <script>
        fetch('/api/produits')
            .then(response => response.json())
            .then(data => {
                let listeProduits = document.getElementById('liste-produits');
                data.forEach(produit => {
                    let ligne = document.createElement('tr');
                    ligne.innerHTML = `
                        <td>${produit.id}</td>
                        <td>${produit.nom}</td>
                        <td>${produit.description}</td>
                        <td>${produit.prix}</td>
                        <td>${produit.quantite}</td>
                        <td>
                            <a href="modifier_produit.php?id=${produit.id}">Modifier</a> |
                            <a href="supprimer_produit.php?id=${produit.id}">Supprimer</a>
                        </td>
                    `;
                    listeProduits.appendChild(ligne);
                });
            });
    </script>
</body>
</html>