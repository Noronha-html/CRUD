<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$acao = $_GET['acao'];
$id = $_GET['id'];
?>
  <main>

       <!-- Telas CRUD -->
   <div id="cargos" class="tela">
    <form class="crud-form" action="./action/cargos.php" method="post">
      <h2>Cadastro de Cargos</h2>
      <?php
      switch ($acao) {
        case 'salvar':
          $sql = 'SELECT Nome, TetoSalarial FROM cargos WHERE CargoID ='.$id;
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<input type='text' placeholder=".$row['Nome'].">
                  <input type='number' placeholder=".$row['TetoSalarial'].">";
          }
          break;
        
        default:
          # code...
          break;
      }
      ?>
      <button type="submit">Salvar</button>
    </form>
  </div>



   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
