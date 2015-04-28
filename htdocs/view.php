<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Operaciones de matrices</title>
</head>
<body>
<script>
    function createMatrix(){
        matrixname = document.getElementById("matrixname").value;
        div=document.getElementById("variables");
        table = "<h3>"+matrixname+"<table>\n";
        for (i=0; i<document.getElementById("rows").value; i++){
            table += "\t<tr>";
            for (j=0; j<document.getElementById("columns").value; j++){
                table += "<td><input type='number' id='matrixname-"+i+"-"+j+"'></td>";
            }
            table += "</tr>\n";
        }
        table += "</table>";
        div.innerHTML += table;
    }
</script>
<h1>Operaciones de matrices</h1>
<div id="creatediv">
    <input id="rows" type="number" placeholder="rows" size="20" min="1"/>
    <input id="columns" type="number" placeholder="columns">
    <input id="matrixname" type="text" placeholder="variable">
    <button id="crear" onclick="createMatrix()">Crear matriz</button>
</div>

<div id="variables"></div>

<div id="operaciones">

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