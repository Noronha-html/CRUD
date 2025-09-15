<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

// validacao
switch ($acao) {
    case 'excluir':
        $sql = 'DELETE FROM categorias WHERE CategoriaID ='.$id;
        mysqli_query($conn,$sql);
        header("Location: ../lista-categorias.php");
        break;

    case 'salvar':
        if(!empty($id)) {
            $sql = "UPDATE categorias SET
            Nome = '".$_POST['Nome']."',
            Descricao = '".$_POST['Descricao']."'
            WHERE CategoriaID = ".$id;
        } else {
            $sql = "INSERT INTO categorias (Nome, Descricao) VALUES (
                '".$_POST['Nome']."',
                '".$_POST['Descricao']."'
            )";
        }
        mysqli_query($conn,$sql);
        header("Location: ../lista-categorias.php");
        exit;

        break;
    
    default:
        # code...
        break;
}
?>