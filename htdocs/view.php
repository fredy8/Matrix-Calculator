<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Operaciones de matrices</title>
</head>
<body>
<script>
    function createMatrix(){
        alert("crear");
    }
</script>
<h1>Operaciones de matrices</h1>
<div name="variables">
    <input name="rows" type="number" size="20">
    <input name="columns" type="number">
    <button name="crear" onclick="createMatrix()">Crear matriz</button>
</div>

<div name="operaciones">

    <form action="matrix.php" method="post">
        <select name="operacion">
            <option value="Add">+</option>
            <option value="Subtract">-</option>
            <option value="Scale">K</option>
            <option value="Multiply">*</option>
            <option value="Power">^x</option>
            <option value="Inverse">-1</option>
        </select>
        <br>
        <input type="submit" value="Enter">
    </form>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: juanjocampuzano
 * Date: 4/28/15
 * Time: 11:50 AM
 */


?>
</body>
</html>