<?php
require_once 'db.php';
$adicionarAluno = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $aluno = new Aluno();

    // $stmt = $pdo->prepare("INSERT INTO alunos (nome, email) VALUES (nome, email)");
    // $stmt->execute(['nome' => $nome, 'email' => $email]);

    $aluno -> adicionarAluno($nome, $email);

    $aluno -> fecharConexao();
    
    $adicionarAluno = true;

    header("Location: listar_aluno.php");
}
?>

<h2>Adicionar Novo Aluno</h2>
<form method="POST" action="">
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <input type="submit" value="Salvar">
</form>
