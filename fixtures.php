<?php
require_once("functions.php");

$sql = "CREATE DATABASE  IF NOT EXISTS `projeto3`";
$query($sql);

$sql = "USE `projeto3`";
$query($sql);

$sql = "DROP TABLE IF EXISTS `paginas`";
$query($sql);

$sql = "create table `paginas` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`rota` varchar(50) not null,
	`titulo` varchar(120) not null,
	`conteudo` text,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;";
$query($sql);

$sql = "insert into `paginas` (`id`,`rota`,`titulo`,`conteudo`) VALUES
        (1,'home','Bem vindo ao Nosso Site!','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium consequatur dolor ducimus impedit, in ipsa ipsam itaque magni, molestias nemo numquam quaerat quam ullam ut voluptates. Harum laborum omnis quisquam.</p>'),
        (2,'empresa','Sobre a Empresa','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aliquid, assumenda beatae blanditiis, distinctio dolore earum expedita impedit inventore nesciunt odio rerum tempora veniam! Amet debitis dicta porro reprehenderit voluptate!</p>'),
        (3,'servicos','Nossos Serviços','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci atque culpa dignissimos distinctio eos et facere harum, molestiae mollitia nihil, non perspiciatis quia quos saepe sint, temporibus ullam? Dolore?</p>')";
$query($sql);