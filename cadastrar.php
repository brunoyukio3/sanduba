<?php
include('conexao.php');

// Criar tabela
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(30) NOT NULL unique,
    senha VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
$conn->query($sql);

// Register user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha =  $_POST['senha'];//password_hash($_POST['senha'], PASSWORD_DEFAULT); // fazendo senha ser criptografada

    $sql = "INSERT INTO users (login, senha) VALUES ('$login', '$senha')";
    $conn->query($sql);

    echo "Cadastro realizado com sucesso! redirecionamento...Login"; 
    echo "<!-- Redireciona para uma URL específica em html -->
<meta http-equiv='refresh' content='3; url=http://www.proflobo.com.br'>"; //redirecionamento em segundos
/* Redireciona para uma URL específica em php header("Location: https://www.exemplo.com"); exit;*/
} else {
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="login">Login:</label><br>
        <input type="text" name="login"><br>
        <label for="senha">Senha:</label><br>
        <input type="password" name="senha"><br>
        <input type="submit" value="Cadastrar">
    </form>
    <?php
}
$conn->close();
?>