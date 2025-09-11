<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$acao = $_GET['acao'];
$id = $_GET['id'];
?>
  <main>

    <div id="categorias" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Categorias</h2>
          <?php
          switch ($acao) {
            case 'salvar':
              $sql = 'SELECT Nome, Descricao FROM categorias WHERE CategoriaID ='.$id;
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<input type='text' placeholder=".$row['Nome'].">
                      <textarea placeholder=".$row['Descricao']."></textarea>";
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
