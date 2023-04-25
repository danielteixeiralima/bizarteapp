<?php
// Conectar ao banco de dados
$conn = mysqli_connect("localhost", "root", "", "bizarte");

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Coletar os dados do formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

// Executar a instrução SQL
$sql = "INSERT INTO usuarios (nome, sobrenome, email, telefone) VALUES ('$nome', '$sobrenome', '$email', '$telefone')";
if (mysqli_query($conn, $sql)) {
    // Verificar se a inserção foi bem-sucedida
    if (mysqli_affected_rows($conn) > 0) {
        echo "Usuário inserido com sucesso!";
    } else {
        echo "Falha ao inserir usuário";
    }
} else {
    echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
?>