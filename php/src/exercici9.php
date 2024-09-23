<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Alta Llibre</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>

<?php
$modulos = array("A", "B", "C", "D");
$estados = array("1", "2", "3");

$status = isset($_POST['status']) ? $_POST['status'] : '';
$module = isset($_POST['module']) ? $_POST['module'] : '';
$publisher = isset($_POST['publisher']) ? $_POST['publisher'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$pages = isset($_POST['pages']) ? $_POST['pages'] : '';
$comments = isset($_POST['comments']) ? $_POST['comments'] : '';

$nombreImagen = '';

if (isset($_POST['btnSubir']) && $_POST['btnSubir'] == 'Subir') {
    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $nombreImagen = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/{$nombreImagen}");


        echo "<p>Archivo $nombreImagen subido con éxito</p>";
    }
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="module">Mòdul:</label>
        <select id="module" name="module">
        <?php
        foreach ($modulos as $mod) {
            echo "<option value=\"$mod\"". ($module == $mod ? " selected" : "") .">$mod</option>";
        }
        ?>
        </select>
        <span class="error"><!-- Missatge d'error per al mòdul aquí --></span>
    </div>
    <div>
        <label for="publisher">Editorial:</label>
        <input type="text" id="publisher" name="publisher" value="">
        <span class="error"><!-- Missatge d'error per a l'editorial aquí --></span>
    </div>
    <div>
        <label for="price">Preu:</label>
        <input type="text" id="price" name="price" value="">
        <span class="error"><!-- Missatge d'error per al preu aquí --></span>
    </div>
    <div>
        <label for="pages">Pàgines:</label>
        <input type="text" id="pages" name="pages" value="">
        <span class="error"><!-- Missatge d'error per a les pàgines aquí --></span>
    </div>
    <div>
        <label for="status">Estat:</label>
        <?php
        foreach ($estados as $stat) {
            echo "<input type=\"radio\" name=\"status\" value=\"$stat\"". ($status == $stat ? " checked" : "") ."> $stat<br />";
        }
        ?>
         <span class="error"><!-- Missatge d'error per a l'estat aquí --></span>
    </div>
    <div>
        <label for="photo">Foto:</label>
        <input type="file" id="photo" name="photo">
    </div>
    <div>
        <label for="comments">Comentaris:</label>
        <textarea id="comments" name="comments"></textarea>
    </div>
    <div>
        <button type="submit" name="btnSubir" value="Subir">Subir</button>
    </div>
</form>

<?php

    echo "<h2>Imagen:</h2>";
    echo "<img src='/uploads/$nombreImagen' alt='Imagen' style='max-width: 200px;'>";
?>

</body>
</html>
