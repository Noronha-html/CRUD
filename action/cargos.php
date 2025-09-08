<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao e id VIA URL - Query String-=
$acao = $_GET['acao'];
$id = $_GET['id'];

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
    
    default:
        # code...
        break;
}
?>