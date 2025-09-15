<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$acao = $_REQUEST['acao'] ?? '';
$id = $_REQUEST['id'] ?? '';
?>
  <main>

    <div id="categorias" class="tela">
        <form class="crud-form" method="post" action="./action/categorias.php">
          <h2>Cadastro de Categorias</h2>

          <input type='hidden' name='id' value='<?php echo $id; ?>'>
          <input type='hidden' name='acao' value='salvar'>

          <?php
          switch ($acao) {
            case 'salvar':
              if(!empty($id)) {
                $sql = 'SELECT Nome, Descricao FROM categorias WHERE CategoriaID ='.$id;
                $result = mysqli_query($conn, $sql);
                if ($row = mysqli_fetch_assoc($result)) {
                  echo "<input type='text' name='Nome' value='".htmlspecialchars($row['Nome'])."' placeholder='Nome'>
                        <textarea name='Descricao' placeholder='Descrição'>".htmlspecialchars($row['Descricao'])."</textarea>";
                }
              } else {
                echo "<input type='text' name='Nome' placeholder='Nome'>
                      <textarea name='Descricao' placeholder='Descrição'></textarea>";
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
