<?php
include('conexao.php');

// Inserir produto
if (isset($_POST["inserir"])) {
  $nome = $_POST["nome"];
  $tipo = $_POST["tipo"];
  $descricao = $_POST["descricao"];
  $valor_unitario = $_POST["valor_unitario"];
  $quantidade_estoque = $_POST["quantidade_estoque"];
  $cor = $_POST["cor"];
  $disponivel = $_POST["disponivel"];
  $link_imagem = $_POST["link_imagem"];

  // Upload da imagem
  $foto = $_FILES['foto'];
  $nome_foto = $foto['name'];
  $tmp_name = $foto['tmp_name'];
  $destination = 'imagens/produtos/' . $nome_foto;

  // Mover o arquivo para a pasta imagens/produtos
  if (move_uploaded_file($tmp_name, $destination)) {
    echo "Arquivo enviado com sucesso!";
  } else {
    echo "Erro ao enviar arquivo!";
  }

  // Inserir dados no banco de dados
  $sql = "INSERT INTO produtos (nome, tipo, descricao, valor_unitario, quantidade_estoque, cor, disponivel, link_imagem, foto) VALUES ('$nome', '$tipo', '$descricao', '$valor_unitario', '$quantidade_estoque', '$cor', '$disponivel', '$link_imagem', '$nome_foto')";
  if ($conn->query($sql) === TRUE) {
    echo "Produto inserido com sucesso!";
  } else {
    echo "Erro ao inserir produto: " . $conn->error;
  }
}

// Deletar produto
if (isset($_POST["deletar"])) {
  $id = $_POST["id"];

  $sql = "DELETE FROM produtos WHERE id = '$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Produto deletado com sucesso!";
  } else {
    echo "Erro ao deletar produto: " . $conn->error;
  }
}

// Formulário para inserir produto
echo "<h2>Inserir Produto</h2>";
echo "<form action='' method='post' enctype='multipart/form-data'>";
echo "  <label for='nome'>Nome:</label>";
echo "  <input type='text' id='nome' name='nome'><br><br>";
echo "  <label for='tipo'>Tipo:</label>";
echo "  <input type='text' id='tipo' name='tipo'><br><br>";
echo "  <label for='descricao'>Descrição:</label>";
echo "  <textarea id='descricao' name='descricao'></textarea><br><br>";
echo "  <label for='valor_unitario'>Valor Unitário:</label>";
echo "  <input type='number' id='valor_unitario' name='valor_unitario'><br><br>";
echo "  <label for='quantidade_estoque'>Quantidade em Estoque:</label>";
echo "  <input type='number' id='quantidade_estoque' name='quantidade_estoque'><br><br>";
echo "  <label for='cor'>Cor:</label>";
echo "  <input type='text' id='cor' name='cor'><br><br>";
echo "  <label for='disponivel'>Disponível:</label>";
echo "  <input type='checkbox' id='disponivel' name='disponivel'><br><br>";
echo "  <label for='link_imagem'>Link para Imagem:</label>";
echo "  <input type='text' id='link_imagem' name='link_imagem'><br><br>";
echo "  <label for='foto'>Imagem:</label>";
echo "  <input type='file' id='foto' name='foto'><br><br>";
echo "  <input type='submit' name='inserir' value='Inserir'>";
echo "</form>";

// Formulário para deletar produto
echo "<h2>Deletar Produto</h2>";
echo "<form action='' method='post'>";
echo "  <label for='id'>ID do Produto:</label>";
echo "  <input type='number' id='id' name='id'><br><br>";
echo "  <input type='submit' name='deletar' value='Deletar'>";
echo "</form>";

$conn->close();
?>