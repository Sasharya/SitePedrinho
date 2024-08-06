<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta e limpa os dados do formulário
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $company = htmlspecialchars($_POST['company']);
    $service = htmlspecialchars($_POST['service']);
    $details = htmlspecialchars($_POST['details']);

    // Validação básica (adapte conforme necessário)
    if (empty($name) || empty($email) || empty($service) || empty($details)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
        exit;
    }

    // Configurações do e-mail
    $to = "contact@company.com"; // Endereço de e-mail para onde enviar as solicitações
    $subject = "Solicitação de Orçamento de $name";
    $message = "
        Nome: $name\n
        Email: $email\n
        Telefone: $phone\n
        Nome da Empresa: $company\n
        Serviço de Interesse: $service\n
        Detalhes do Projeto:\n
        $details
    ";
    $headers = "From: $email";

    // Envia o e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "Sua solicitação de orçamento foi enviada com sucesso!";
    } else {
        echo "Ocorreu um erro ao enviar sua solicitação. Tente novamente mais tarde.";
    }
} else {
    echo "Método de requisição não suportado.";
}
?>
