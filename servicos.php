<?php
require_once("functions.php");

$uri = uri_atual();
$sql = "select rota, titulo, conteudo from paginas where rota = '$uri'";
$pagina = $query($sql, true);
$titulo = $pagina['titulo'];
$conteudo = $pagina['conteudo'];

echo $conteudo;