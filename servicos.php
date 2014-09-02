<?php
require_once("functions.php");

echo "Serviços";
$uri = uri_atual();
$rota = $uri[1];

$uri = uri_atual();
$sql = "select rota, titulo, conteudo from paginas where rota = '$rota'";

$pagina = $query($sql, true);
$titulo = $pagina['titulo'];
$conteudo = $pagina['conteudo'];

echo $conteudo;
?>