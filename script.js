// Usuário e senha de acesso para avaliação do projeto
const validUsername = "usuario";
const validPassword = "senha";

const loginForm = document.getElementById("loginForm");
loginForm.addEventListener("submit", function(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");

    const username = usernameInput.value;
    const password = passwordInput.value;

    if (username === validUsername && password === validPassword) {
        alert("Login realizado com sucesso!");
        // Redirecionar para outra página ou executar ações adicionais
    } else {
        alert("Usuário ou senha inválidos!");
        // Lógica para verificar e lidar com a trava de endereço de IP
    }
});
