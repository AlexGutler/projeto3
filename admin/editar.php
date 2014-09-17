<?php
session_start();

if (!(isset($_SESSION['logado']) and $_SESSION['logado'] == 1)){
    header('location: login');
} else {
    $id = $_GET['id'];
    setcookie("id",$id);
    $conteudo = buscaConteudo($id);
?>

    <form class="form-horizontal" role="form" method="post" action="editar">
        <textarea name="editor1" id="editor1" rows="10" cols="80">
           <?=$conteudo?>
        </textarea>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace( 'editor1' );
        </script>
        <input type="hidden" name="id" value="<?=$id?>"/>
        <button type="submit" name="salvar" class="btn btn-success">Salvar</button>
        <button type="submit" name="cancelar" class="btn btn-danger">Cancelar</button>
    </form>

<?php

    if (isset($_POST['salvar'])){
        $conteudonovo = $_POST['editor1'];
        $idc = $_COOKIE["id"];
        $salvou = salvarAlteracao($idc, $conteudonovo);

        if ($salvou){
            echo '<p>Alterações salvas com sucesso!</p>';
            header('location: home');
        } else {
            echo '<p>Erro ao salvar as alterações</p>';
        }
    }

    if (isset($_POST['cancelar'])){
        header('location: home');
    }

} ?>




