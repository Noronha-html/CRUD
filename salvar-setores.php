<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$id = $_REQUEST['id'] ?? '';
$acao = $_REQUEST['acao'] ?? '';
?>
  
  <main>

    <div id="setores" class="tela">
        <form class="crud-form" method="post" action="./action/setores.php">
          <h2>Cadastro de Setores</h2>

          <input type='hidden' name='id' value='<?php echo $id; ?>'>
          <input type='hidden' name='acao' value='salvar'>

          <?php
          switch ($acao) {
            case 'salvar':
              if (!empty($id)) {
                $sql = 'SELECT Nome, Andar, Cor FROM setor WHERE SetorID =' . $id;
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<input type='text' name='Nome' placeholder='" . $row['Nome'] . "'>
                        <input type='text' name='Andar' placeholder='" . $row['Andar'] . "'>
                        <input type='text' name='Cor' placeholder='" . $row['Cor'] . "'>";
                }
              } else {
                echo "<input type='text' name='Nome' placeholder='Nome do Setor'>
                      <input type='text' name='Andar' placeholder='Andar'>
                      <input type='text' name='Cor' placeholder='Cor'>";
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