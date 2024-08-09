<?php
// Conectar ao banco de dados
include('conexao.php');

// Query para selecionar todos os produtos
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

// Criar um formulário com um select
echo "<h2>Selecionar Produto</h2>";
echo "<form action='' method='post'>";
echo "  <label for='produto'>Produto:</label>";
echo "  <select id='produto' name='produto'>";
echo "    <option value=''>Selecione um produto</option>";

// Loop para criar as opções do select
while ($row = $result->fetch_assoc()) {
  echo "    <option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
}

echo "  </select><br><br>";
echo "  <input type='submit' name='selecionar' value='Selecionar'>";
echo "</form>";

// Verificar se o formulário foi submetido
if (isset($_POST["selecionar"])) {
  $id = $_POST["produto"];

  // Query para selecionar o produto escolhido
  $sql = "SELECT * FROM produtos WHERE id = '$id'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  // Exibir as informações do produto selecionado
  echo "<h2>Informações do Produto</h2>";
  echo "  <p>Nome: " . $row['nome'] . "</p>";
  echo "  <p>Tipo: " . $row['tipo'] . "</p>";
  echo "  <p>Descrição: " . $row['descricao'] . "</p>";
  echo "  <p>Valor Unitário: " . $row['valor_unitario'] . "</p>";
  echo "  <p>Quantidade em Estoque: " . $row['quantidade_estoque'] . "</p>";
  echo "  <p>Cor: " . $row['cor'] . "</p>";
  echo "  <p>Disponível: " . $row['disponivel'] . "</p>";
  echo "  <p>Link para Imagem: " . $row['link_imagem'] . "</p>";
  echo "  <p>Imagem: <img width='100px' height='100px' src='imagens/produtos/" . $row['foto'] . "'></p>";
}

$conn->close();
?>
