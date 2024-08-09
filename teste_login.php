<?php
// Configurações do banco de dados
$host = 'localhost'; //nome do pc ou ip que tá o banco de dados
$database = 'db_lobo'; //nome do banco de dados
$username = 'root'; //usuario de acesso
$password = '1234'; //senha do usuario

// Conexão com o banco de dados
$conn = new mysqli($host, $username, $password, $database);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Pega os valores do formulário
$login = $_POST['login'];
$senha = $_POST['senha'];

// Consulta a tabela "users" para verificar se existe um registro com o login e senha informados
$query = "SELECT * FROM users WHERE login = '$login' AND senha = '$senha'";
$result = $conn->query($query);

// Verifica se o registro foi encontrado
if ($result->num_rows > 0) {
    // Redireciona para a página de sucesso
    header('Location: pagina_de_sucesso.html');
    exit;
} else {
    // Redireciona para a página de erro
    header('Location: pagina_de_erro.html');
    exit;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>