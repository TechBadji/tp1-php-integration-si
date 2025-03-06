<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <form id="form-ajouter-produit">
        <label>Nom :</label>
        <input type="text" name="nom" required><br>
        <label>Description :</label>
        <textarea name="description"></textarea><br>
        <label>Prix :</label>
        <input type="number" name="prix" step="0.01" required><br>
        <label>Quantité :</label>
        <input type="number" name="quantite" required><br>
        <button type="submit">Ajouter</button>
    </form>

    <script>
        document.getElementById('form-ajouter-produit').addEventListener('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            fetch('/api/produit', {
                method: 'POST',
                body: JSON.stringify(Object.fromEntries(formData)),
                headers: { 'Content-Type': 'application/json' }
            }).then(response => response.json())
                .then(data => {
                    alert(data.message);
                    window.location.href = "index.php";
                });
        });
    </script>
</body>
</html>