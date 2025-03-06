<!DOCTYPE html>
<html>
<head>
    <title>Modifier un produit</title>
</head>
<body>
    <h1>Modifier un produit</h1>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        ?>
        <form id="form-modifier-produit">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Nom :</label>
            <input type="text" name="nom"