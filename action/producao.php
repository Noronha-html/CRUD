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
        $sql = 'DELETE FROM producao WHERE ProducaoID ='.$id;
        mysqli_query($conn,$sql);
        header("Location: ../lista-producao.php");
        break;

    case 'salvar':
        if(!empty($id)) {
            $sql = "UPDATE producao SET
            ProdutoID = (SELECT ProdutoID FROM produtos WHERE Nome = '".$_POST['Produto']."'),
            FuncionarioID = (SELECT FuncionarioID FROM funcionarios WHERE Nome = '".$_POST['Funcionario']."'),
            DataProducao = '".$_POST['DataProducao']."',
            QuantidadeProduzida = '".$_POST['QuantidadeProduzida']."'
            WHERE ProducaoID = ".$id;
        } else {
            $sql = "INSERT INTO producao (ProdutoID, FuncionarioID, DataProducao, QuantidadeProduzida) VALUES (
                (SELECT ProdutoID FROM produtos WHERE Nome = '".$_POST['Produto']."'),
                (SELECT FuncionarioID FROM funcionarios WHERE Nome = '".$_POST['Funcionario']."'),
                '".$_POST['DataProducao']."',
                '".$_POST['QuantidadeProduzida']."'
            )";
        }
        mysqli_query($conn,$sql);
        header("Location: ../lista-producao.php");

        break;
    
    default:
        # code...
        break;
}
?>