<?php
require_once 'Aluno.class.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $rm     = $_POST['rm'];
    $nome   = $_POST['nome'];
    $cpf    = $_POST['cpf'];
    $email  = $_POST['email'];
    $senha  = $_POST['senha']; 

    $aluno = new Aluno();

    if ($aluno->conectar()) {
        if ($aluno->consultar($email)) {
            $mensagem = "E-mail já cadastrado!";
        } else {
            if ($aluno->cadastrar($rm, $nome, $email, $cpf)) {
                $mensagem = "Cadastro realizado com sucesso!";
            } else {
                $mensagem = "Erro ao cadastrar.";
            }
        }
    } else {
        $mensagem = "Erro ao conectar no banco de dados.";
    }
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="css/cadastrar.css">
</head>
<body>

<?php if (isset($mensagem)): ?>
    <script>
        alert("<?= $mensagem ?>");
    </script>
<?php endif; ?>

<div class="background">
    <div class="ball"></div>
    <div class="ball"></div>
    <div class="ball"></div>
    <div class="ball"></div>
    <div class="ball"></div>
</div>

<div class="container">
    <h2>Cadastro</h2>
    <form action="Cadastrar.php" method="POST">
        <label for="rm">RM:</label>
        <input type="number" id="rm" name="rm" required>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>
