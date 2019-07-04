<?php
$html = <<<HTML
<html>
<head>
<title> Projeto</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
.somar{
  position: relative; float: left;
}
.subtrair{
  position: relative;
}
.quantidadeIngredientes{
  width:20%; float: left; text-align: center;
}
</style>
</head>
<body>
<div class="menos">
<form method="post" action="#" name="form1">
     <table>
    <tr>
        <td >
            <h3><label>Arroz</label></h3>
            <button type="button" class="btn btn-outline-dark btn-sm somar"
                onclick="mais( 'quantidade1' )">+</button>
            <input class="form-control form-control-sm quantidadeIngredientes quantidade"  type="number"
                id="quantidade1" value=0 name="quantidade1">
            <button type="button" class="btn btn-outline-dark btn-sm subtrair"
                onclick="menos( 'quantidade1' )">-</button>
        </td>
    </tr>
    <br><br>
    <tr>
        <td>
            <h3><label>Alface</label></h3>
            <button type="button" class="btn btn-outline-dark btn-sm somar"
                onclick="mais( 'quantidade2' )">+</button>

            <input class="form-control form-control-sm quantidadeIngredientes quantidade" type="number"
                id="quantidade2" value=0 name="quantidade2">

            <button type="button" class="btn btn-outline-dark btn-sm subtrair"
                onclick="menos( 'quantidade2' )">-</button>
        </td>
    </tr>
    <br><br>
    <tr>
        <td>
            <h3><label>Feijao</label></h3>
            <button type="button" class="btn btn-outline-dark btn-sm somar"
                onclick="mais( 'quantidade3' )">+</button>

            <input class="form-control form-control-sm quantidadeIngredientes quantidade" type="number"
                id="quantidade3" value=22 name="quantidade3">

            <button type="button" class="btn btn-outline-dark btn-sm subtrair"
                onclick="menos( 'quantidade3' )">-</button>
        </td>
    </tr>
    <tr>
        <td>
            <h3><label>Macarrao</label></h3>
            <button type="button" class="btn btn-outline-dark btn-sm somar"
                onclick="mais( 'quantidade2' )">+</button>

            <input class="form-control form-control-sm quantidadeIngredientes quantidade" type="number"
                id="quantidade4" value=0 name="quantidade4">

            <button type="button" class="btn btn-outline-dark btn-sm subtrair"
                onclick="menos( 'quantidade2' )">-</button>
        </td>
    </tr>
</table>
<input type="submit" value="Enviar" name="enviar" class='btn btn-outline-dark'>    
</form>
</div>
</body>
<script type="text/javascript">
                    function id(el) {
                        return document.getElementById(el);
                    }

                    function menos(id_qnt) {
                        var qnt = parseInt(id(id_qnt).value);
                        if (qnt > 0)
                            id(id_qnt).value = qnt - 1;
                    }

                    function mais(id_qnt) {
                        id(id_qnt).value = parseInt(id(id_qnt).value) + 1;
                    }
                </script>
</html>
HTML;
$doc = new DOMDocument();
$doc->preserveWhiteSpace = false;
$doc->loadHTML($html);
if (!empty($_POST['enviar'])) {
    $a;
    $i = 0;
    while (is_object($finance = $doc->getElementsByTagName("label")->item($i))) {
        foreach ($finance->childNodes as $nodename) {
            $a[$i] = $nodename->nodeValue;
        }
        $i++;
    }
    for ($j = 0; $j < $i; $j++) {
        echo $a[$j];
    }
    $nomeVariavel;
    for ($j = 0; $j < $i; $j++) {
        $nomeVariavel[$j] = 'quantidade' . ($j + 1);
        echo '<br>' . $_POST[$nomeVariavel[$j]];
    }
}
echo $doc->saveHTML(), PHP_EOL;
