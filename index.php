<?php
    $url  = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

    $rota = explode('/',$url['path'],2);

    function rotas($param) {
        $minhasRotas = array("contato","empresa","home","servicos","contato-mensagem");
        if(in_array($param[1], $minhasRotas)){
            require_once($param[1].'.php');
        } elseif ($param[1] == ""){
            require_once('home.php');
        } else {
            require_once('404.php');
        }
    }

?>


<?php require_once('header.ini.php');?>

    <div>
        <?php rotas($rota); ?>
    </div>

<?php require_once('footer.php');?>