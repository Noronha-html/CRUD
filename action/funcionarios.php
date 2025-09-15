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
        $sql = 'DELETE FROM funcionarios WHERE FuncionarioID ='.$id;
        mysqli_query($conn,$sql);
        header("Location: ../lista-funcionarios.php");
        break;

    case 'salvar':
        if(!empty($id)) {
            $sql = "UPDATE funcionarios SET
            Nome = '".$_POST['Nome']."',
            DataNascimento = '".$_POST['DataNascimento']."',
            Email = '".$_POST['Email']."',
            Salario = '".$_POST['Salario']."',
            Sexo = '".$_POST['Sexo']."',
            CPF = '".$_POST['CPF']."',
            RG = '".$_POST['RG']."',
            CargoID = (SELECT CargoID FROM cargos WHERE Nome = '".$_POST['Cargo']."'),
            SetorID = (SELECT SetorID FROM setor WHERE Nome = '".$_POST['Setor']."')
            WHERE FuncionarioID = ".$id;
        } else {
            $sql = "INSERT INTO funcionarios (Nome, DataNascimento, Email, Salario, Sexo, CPF, RG, CargoID, SetorID) VALUES (
                '".$_POST['Nome']."',
                '".$_POST['DataNascimento']."',
                '".$_POST['Email']."',
                '".$_POST['Salario']."',
                '".$_POST['Sexo']."',
                '".$_POST['CPF']."',
                '".$_POST['RG']."',
                (SELECT CargoID FROM cargos WHERE Nome = '".$_POST['Cargo']."'),
                (SELECT SetorID FROM setor WHERE Nome = '".$_POST['Setor']."')
            )";
        }
        mysqli_query($conn,$sql);
        header("Location: ../lista-funcionarios.php");

        break;
    default:
        # code...
        break;
}
?>