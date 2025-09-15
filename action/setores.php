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
        $sql = 'DELETE FROM setor WHERE SetorID ='.$id;
        mysqli_query($conn,$sql);
        header("Location: ../lista-setores.php");
        break;

    case 'salvar':
        if(!empty($id)) {
            $sql = "UPDATE setor SET
            Nome = '".$_POST['Nome']."',
            Andar = '".$_POST['Andar']."',
            Cor = '".$_POST['Cor']."'
            WHERE SetorID = ".$id;
        } else {
            $sql = "INSERT INTO setor (Nome, Andar, Cor) VALUES (
                '".$_POST['Nome']."',
                '".$_POST['Andar']."',
                '".$_POST['Cor']."'
            )";
        }
        mysqli_query($conn,$sql);
        header("Location: ../lista-setores.php");

        break;
    
    default:
        # code...
        break;
}
?>