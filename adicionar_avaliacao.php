<?php
    if(isset($_POST['email']) && !empty($_POST['email'])) {
        
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $mensagem = addslashes($_POST['mensagem']);

        $to = "seuemail@seudominio.com";
        $subject = "Contato - Email enviado pelo site";
        $body = "Nome: ".$nome. "\r\n".
                "Email: ".$email. "\r\n".
                "Mensagem: ".$mensagem;
        $header = "From:seuemail@seudominio.com"."\r\n"
                ."Reply-To:".$email."\r\n"
                ."X-Mailer:PHP/".phpversion();
        
        if(mail($to, $subject, $body, $header)) {
            echo("Email enviado com sucesso!");
        } else {
            echo("O email não pode ser enviado.");
        }
    }
?>

<form method="POST" action="">
    Nome:<br/>
    <input type="text" name="nome"/><br/><br/>
    Email:<br/>
    <input type="text" name="email"/><br/><br/>
    Mensagem:<br/>
    <textarea name="mensagem"></textarea><br/><br/>
    <input type="submit" value="Enviar"/>
</form>
