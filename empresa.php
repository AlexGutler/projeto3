<?php
require_once("functions.php");
echo "Empresa";
$uri = uri_atual();
$rota = $uri[1];

$sql = "select rota, titulo, conteudo from paginas where rota = '$rota'";
$pagina = $query($sql, true);
$titulo = $pagina['titulo'];
$conteudo = $pagina['conteudo'];

echo $conteudo;
?>