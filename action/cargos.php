<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao e id VIA URL - Query String-=
$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

// validacao
switch ($acao) {
    case 'excluir':
        // montar o SQL
        $sql = 'DELETE FROM cargos WHERE CargoID ='.$id;
        // executar o SQL
        mysqli_query($conn,$sql);
        // redirecionar a pagina
        header("Location: ../lista-cargos.php");
        break;

    case 'salvar':
        if(!empty($id)) {
            // montar o SQL
            $sql = "UPDATE cargos SET
            Nome = '".$_POST['Nome']."',
            TetoSalarial = '".$_POST['TetoSalarial']."'
            WHERE CargoID = ".$id;
        } else {
            // montar o SQL
            $sql = "INSERT INTO cargos (Nome, TetoSalarial) VALUES (
                '".$_POST['Nome']."',
                '".$_POST['TetoSalarial']."'
            )";
        }
        mysqli_query($conn,$sql);
        header("Location: ../lista-cargos.php");

        break;
    
    default:
        # code...
        break;
}
?>