<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Operaciones de matrices</title>
    <script>

        function createMatrix(){
            var revisar;
            var revisarNombres;
            var matrixname = document.getElementById("matrixname").value;
            revisarNombres=addValue(matrixname);
            if(revisarNombres){
            revisar = validaCreacion();
                if (revisar === true) {
                    var div = document.getElementById("creando");
                    var table = "<h3>" + matrixname + "</h3><table id=\"table_menu\" name='" + matrixname + "'><button id='guardar' onclick='saveMatrix()'>Guardar Matriz</button>\n";
                    var i;
                    for (i = 0; i < document.getElementById("rows").value; i++) {
                        table += "\t<tr>";
                        var j;
                        for (j = 0; j < document.getElementById("columns").value; j++) {
                            table += "<td><input type='number' id='matrixname-" + i + "-" + j + "'></td>";
                        }
                        table += "</tr>\n";
                    }
                    table += "</table>";
                    div.innerHTML += table;
                } else {
                    return false;
                }
            }else{
                return false;
            }
        }

        matrixNames = [];
        function addValue(value){
            var i;
            for(i=0;i<matrixNames.length;i++){
                if(matrixNames[i] == value){
                    return false;
                }
            }
            matrixNames.push(value);
            return true;
        }

        function saveMatrix(){
            var rows = document.getElementById("creando").getElementsByTagName("table")[0].getElementsByTagName("tr");
            var i;
            var cells;
            for (i=0; i<rows.length; i++){
                cells = rows[i].getElementsByTagName("td");
                alert(cells.innerHTML);
            }
        }

        function validaCreacion(){
            var row = document.getElementById("rows").value;
            if(isNaN(row) || row <= 0){
                return false;
            }else{
                var column = document.getElementById("columns").value;
                if(isNaN(column) || column <= 0){
                    return false;
                }else{
                    var matrixname =document.getElementById("matrixname").value;
                    if(matrixname === null || matrixname === ""){
                        return false;
                    }else{
                        return true;
                    }
                }
            }
        }

    </script>
     <link href="matrixcss.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="whole">
    <h1 id="titulo">Operaciones de matrices</h1>
    <div id="creatediv">
        <input id="rows" type="number" placeholder="rows" size="20" min="1"/>
        <input id="columns" type="number" placeholder="columns">
        <input id="matrixname" type="text" placeholder="variable">
        <button id="crear"  onclick="createMatrix()">Crear matriz</button>
    </div>
        <div id="creando"></div>
        <div id="variables"></div>

    <div id="operaciones">
        <form action="matrix.php" method="post">
            <select  name="operacion">
                <option value="Add">+</option>
                <option value="Subtract">-</option>
                <option value="Scale">K</option>
                <option value="Multiply">*</option>
                <option value="Power">^x</option>
                <option value="Inverse">-1</option>
            </select>
            <br>
            <div id="break">
            <input id="button"type="submit" value="Enter">
            </div>
        </form>
    </div>
</div>
</body>
</html>