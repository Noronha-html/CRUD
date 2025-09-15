<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$acao = $_GET['acao'] ?? '';
$id = $_GET['id'] ?? '';
?>
  <main>

       <!-- Telas CRUD -->
   <div id="cargos" class="tela">
    <form class="crud-form" action="./action/cargos.php" method="post">
      <h2>Cadastro de Cargos</h2>
      <input type='hidden' name='acao' value='salvar'>
      <input type='hidden' name='id' value='<?php echo $id; ?>'>

      <?php
      switch ($acao) {
        case 'salvar':
          if (!empty($id)) {
            $sql = 'SELECT Nome, TetoSalarial FROM cargos WHERE CargoID ='.$id;
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<input type='text' name='Nome' placeholder=".$row['Nome'].">
                    <input type='number' name='TetoSalarial' placeholder=".$row['TetoSalarial'].">";
            }
          } else {
            echo "<input type='text' name='Nome' placeholder='Nome'>
                  <input type='number' name='TetoSalarial' placeholder='Teto Salarial'>";
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
