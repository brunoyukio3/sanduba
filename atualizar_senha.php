<?php
// Conectar ao banco de dados
$conn = mysqli_connect("localhost", "seu_usuario", "sua_senha", "seu_banco");

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $confirmar_senha = $_POST["confirmar_senha"];

    // Verificar se as senhas coincidem
    if ($senha != $confirmar_senha) {
        echo "As senhas não coincidem.";
        exit;
    }

    // Atualizar a senha no banco de dados
    $sql = "UPDATE users SET senha = '$senha' WHERE login = '$login'";
    if (mysqli_query($conn, $sql)) {
        echo "Senha atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar senha: " . mysqli_error($conn);
    }
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>