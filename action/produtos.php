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
        $sql = 'DELETE FROM produtos WHERE ProdutoID ='.$id;
        mysqli_query($conn,$sql);
        header("Location: ../lista-produtos.php");
        break;

    case 'salvar':
        if(!empty($id)) {
            $sql = "UPDATE produtos SET
            Nome = '".$_POST['Nome']."',
            Descricao = '".$_POST['Descricao']."',
            Preco = '".$_POST['Preco']."',
            CategoriaID = (SELECT CategoriaID FROM categorias WHERE Nome = '".$_POST['Categoria']."')
            WHERE ProdutoID = ".$id;
        } else {
            $sql = "INSERT INTO produtos (Nome, Descricao, Preco, CategoriaID) VALUES (
                '".$_POST['Nome']."',
                '".$_POST['Descricao']."',
                '".$_POST['Preco']."',
                (SELECT CategoriaID FROM categorias WHERE Nome = '".$_POST['Categoria']."')
            )";
        }
        mysqli_query($conn,$sql);
        header("Location: ../lista-produtos.php");

        break;
    
    default:
        # code...
        break;
}
?>