<?php
// Configuração do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contatosdb";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se os dados do formulário foram recebidos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preparando os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Limpando e escapando os dados de entrada para evitar SQL injection
    $nome = mysqli_real_escape_string($conn, $nome);
    $email = mysqli_real_escape_string($conn, $email);
    $mensagem = mysqli_real_escape_string($conn, $mensagem);

    // Preparando a consulta SQL para inserção
    $sql = "INSERT INTO Contatos (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

    // Executando a consulta e verificando se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar mensagem: " . $conn->error;
    }
}

// Fechando a conexão com o banco de dados
$conn->close();
?>



