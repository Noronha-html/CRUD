<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql = 'SELECT * FROM categorias';
$result = mysqli_query($conn, $sql);
?>
  <main>

    <div class="container">
        <h1>Lista de Categorias</h1>
        <a href="./salvar-categorias.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>" . $row['CategoriaID'] . "</td>
                      <td>" . $row['Nome'] . "</td>
                      <td>
                          <a href='salvar-cargos.php?id=" . $row['CategoriaID'] . "' class='btn btn-edit'>Editar</a>
                          <a href='excluir-cargos.php?id=" . $row['CategoriaID'] . "' class='btn btn-delete'>Excluir</a>
                      </td>
                    </tr>";
            }
            ?>
            
          </tbody>
        </table>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>