<?php
// Configurações do banco de dados
$host = 'localhost';
$usuario = 'seu_usuario';
$senha = 'sua_senha';
$banco = 'nome_do_banco';

// Conexão com o banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica erros na conexão
if ($conexao->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $conexao->connect_error);
}

// Função para listar todos os usuários
function listarUsuarios()
{
    global $conexao;
    $sql = "SELECT * FROM usuarios";
    $resultado = $conexao->query($sql);
    $usuarios = array();

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $usuarios[] = $row;
        }
    }

    return $usuarios;
}

// Função para obter um usuário pelo ID
function obterUsuario($id)
{
    global $conexao;
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        return $resultado->fetch_assoc();
    } else {
        return null;
    }
}

// Função para inserir um novo usuário
function inserirUsuario($dados)
{
    global $conexao;
    $nome = $dados['nome'];
    $email = $dados['email'];
    $senha = $dados['senha'];
    // Defina os campos adicionais conforme necessário

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    $resultado = $conexao->query($sql);

    return $resultado;
}

// Função para atualizar um usuário
function atualizarUsuario($id, $dados)
{
    global $conexao;
    $nome = $dados['nome'];
    $email = $dados['email'];
    // Defina os campos adicionais conforme necessário

    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = $id";
    $resultado = $conexao->query($sql);

    return $resultado;
}

// Função para inativar um usuário
function inativarUsuario($id)
{
    global $conexao;
    $sql = "UPDATE usuarios SET ativo = 0 WHERE id = $id";
    $resultado = $conexao->query($sql);

    return $resultado;
}

// Função para reativar um usuário
function reativarUsuario($id)
{
    global $conexao;
    $sql = "UPDATE usuarios SET ativo = 1 WHERE id = $id";
    $resultado = $conexao->query($sql);

    return $resultado;
}

// Exemplo de uso:

// Listar todos os usuários
$usuarios = listarUsuarios();
foreach ($usuarios as $usuario) {
    echo "ID: " . $usuario['id'] . "<br>";
    echo "Nome: " . $usuario['nome'] . "<br>";
    echo "Email: " . $usuario['email'] . "<br>";
    // Exiba os campos adicionais conforme necessário
    echo "<br>";
}

// Obter um usuário pelo ID
$usuario = obterUsuario(1);
if ($usuario) {
    echo "Nome: " . $usuario['nome'] . "<br>";

// Obter um usuário pelo ID
$usuario = obterUsuario(1);
if ($usuario) {
    echo "Nome: " . $usuario['nome'] . "<br>";
    echo "Email: " . $usuario['email'] . "<br>";
    // Exiba os campos adicionais conforme necessário
}

// Inserir um novo usuário
$dadosNovoUsuario = array(
    'nome' => 'Novo Usuário',
    'email' => 'novo.usuario@example.com',
    'senha' => '123456'
    // Defina os campos adicionais conforme necessário
);
$resultadoInsercao = inserirUsuario($dadosNovoUsuario);
if ($resultadoInsercao) {
    echo "Novo usuário inserido com sucesso!";
}

// Atualizar um usuário existente
$idUsuario = 1;
$dadosUsuarioAtualizado = array(
    'nome' => 'Usuário Atualizado',
    'email' => 'usuario.atualizado@example.com'
    // Defina os campos adicionais conforme necessário
);
$resultadoAtualizacao = atualizarUsuario($idUsuario, $dadosUsuarioAtualizado);
if ($resultadoAtualizacao) {
    echo "Usuário atualizado com sucesso!";
}

// Inativar um usuário
$idUsuarioInativar = 1;
$resultadoInativacao = inativarUsuario($idUsuarioInativar);
if ($resultadoInativacao) {
    echo "Usuário inativado com sucesso!";
}

// Reativar um usuário
$idUsuarioReativar = 1;
$resultadoReativacao = reativarUsuario($idUsuarioReativar);
if ($resultadoReativacao) {
    echo "Usuário reativado com sucesso!";
}