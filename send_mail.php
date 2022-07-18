<?php
if (isset($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $comment = $_POST['comment'];
    $domain = $_SERVER['HTTP_HOST'];
    $to = "cristianvianey@gmail.com";
    $subject = "Contacto desde el formulario del sitiuo $domain: $subject";
    $message = "
    <p> Datos enviados desde el formulario del sitio <b>$domain</b></p>
    <ul>
        <li>Nombre: <b>$name</b></li>
        <li>Email: <b>$email</b></li>
        <li>Asunto: $subject</li>
        <li>Comentarios: $subject</li>
    </ul>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n" . "Content-Type: text/html; charset=utf-8" . "\r\n" . "From: Envío Automático No responder <no-reply@$domain>";

    $send_mail = mail($to, $subject, $message, $headers);

    if($send_mail){
        $res = [
            "err" => false,
            "message" => "Tus datos han sido enviados",
        ];
    }else{
        $res = [
            "err" => true,
            "message" => "Error al enviar tus datos. Intenta nuevamente",
        ];
    }
    header("Access-Control-Allow-Origin: *");
    // header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($res);
    exit;
}