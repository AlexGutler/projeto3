<?php
try {
    $connection = new \PDO("mysql:host=localhost;dbname=projeto3","root","00fb00");
} catch (\PDOException $e){
    echo "Ocorreu um erro ao tentar a conexão com o banco de dados."."<br>Código: ".$e->getCode()."<br> Erro:".$e->getMessage();
}
