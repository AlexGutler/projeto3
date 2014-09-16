<?php
session_start();

if (isset($_SESSION['logado']) and $_SESSION['logado'] == 1){
    echo "<h3> Seja bem vindo <strong>".$_COOKIE['usuario']."</strong> </h3>";

    $sql = "SELECT * FROM paginas";
    $paginas = query($sql);

    echo '<div class="col-md-5">';
    echo '<h1>Páginas do Sistema:</h1>';
    if(!empty($paginas)){

        echo '<table class="table table-hover">';
        echo '<thead>
                  <tr>
                    <th>Página</th>
                    <th>Ação</th>
                  </tr>
              </thead>
              <tbody>';


        foreach($paginas as $pag){
            #echo '<p><a href="'.$pag['rota'].'">'.$pag["titulo"].'</a></p>';

            echo '<tr> <td>'.$pag['titulo'].'</td>';

            echo '<td><a class="btn btn-danger" href="altera-paginas.php?id='.$pag['id'].'">Alterar</a></td>';

            echo '</tr>';
        }
    } else {
        echo '<h3> Nenhuma página encontrada. </h3>';
    }

    echo '</tbody>
          </table>';
    echo '</div>';
} else {
    header('location: login');
}

?>




<!--    <tr>-->
<!--        <td>$pag["titulo"]</td>-->
<!--        <td><a href="'.$pag['id'].'"><button type="button" value="Editar"></button> </a> </td>-->
<!--    </tr>-->
<!---->
<!--<td>-->
<!--    <a class="btn btn-primary" href="altera-paginas.php?id=--><?//= $produto['id']?><!--"> Alterar </a>-->
<!--</td>-->

