<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$acao = $_REQUEST['acao'] ?? '';
$id = $_REQUEST['id'] ?? '';
?>
  
  <main>

    <div id="produtos" class="tela">
        <form class="crud-form" action="./action/produtos.php" method="post">
          <h2>Cadastro de Produtos</h2>

          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="acao" value="salvar">

          <?php
          switch ($acao) {
            case 'salvar':
              if(!empty($id)) {
                $sql = 'SELECT Nome, Preco, Peso, Descricao FROM produtos WHERE ProdutoID ='.$id;
                $result = mysqli_query($conn, $sql);
                if ($row = mysqli_fetch_assoc($result)) {
                  echo "<input type='text' name='Nome' value='".htmlspecialchars($row['Nome'])."' placeholder='Nome do Produto'>
                        <input type='number' name='Preco' value='".htmlspecialchars($row['Preco'])."' placeholder='Preço'>
                        <input type='number' name='Peso' value='".htmlspecialchars($row['Peso'])."' placeholder='Peso (g)'>
                        <textarea name='Descricao' placeholder='Descrição'>".htmlspecialchars($row['Descricao'])."</textarea>";
                        $sqlCategoria = "SELECT Nome FROM categorias";
                        $resultCategoria = mysqli_query($conn, $sqlCategoria);
                        echo "<select name='Categoria'>";
                        while ($categoria = mysqli_fetch_assoc($resultCategoria)) {
                          $selected = ($categoria['Nome'] == $row['Categoria']) ? "selected" : "";
                          echo "<option value='".htmlspecialchars($categoria['Nome'])."' $selected>".htmlspecialchars($categoria['Nome'])."</option>";
                        }
                        echo "</select>";
                }
              } else {
                echo "<input type='text' name='Nome' placeholder='Nome do Produto'>
                      <input type='number' name='Preco' placeholder='Preço'>
                      <input type='number' name='Peso' placeholder='Peso (g)'>
                      <textarea name='Descricao' placeholder='Descrição'></textarea>";
                      $sqlCategoria = "SELECT Nome FROM categorias";
                      $resultCategoria = mysqli_query($conn, $sqlCategoria);
                      echo "<select name='Categoria'>";
                      while ($categoria = mysqli_fetch_assoc($resultCategoria)) {
                        echo "<option value='".htmlspecialchars($categoria['Nome'])."'>".htmlspecialchars($categoria['Nome'])."</option>";
                      }
                      echo "</select>";
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