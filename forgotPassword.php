<?php
require_once("./application/inc/controllerInit.php");

$tituloPagina = "Recuperar Password";

$username = "";
$password = "";
$sentmail = "";
$data = array();
$data["redirectTo"]="";
$msgErros = array();
$dadosSubmetidos= false;


if (isset($_POST['username'])){
    if($_POST['username']){
        $username = $_POST['username'];
        $password = getPwdUserByUsername($username);
        //echo "your pass is ::".($pass)."";
        $to = getEmailUserByUsername($username);
        //echo "your email is ::".$email;
        //Details for sending E-mail
        $from = "FunnyShirt";
        $url = "";
        $message = "A sua password é 123";

        $from = "shell.r0t3d@gmail.com";
        $subject = "CodingCyber Password recovered";
        $headers1 = "From: $from\n";
        $headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
        $headers1 .= "X-Priority: 1\r\n";
        $headers1 .= "X-MSMail-Priority: High\r\n";
        $headers1 .= "X-Mailer: Just My Server\r\n";
        
//        $sentmail = mail($to,$subject,$message,$headers1);
        $to = getEmailUserByUsername($username);
        $subject = "Recuperar Password";
        $txt = "Hello world!";
        $headers = "From: shell.r0t3d@gmail.com" . "\r\n" .
            "CC: somebodyelse@example.com";

        mail($to,$subject,$txt,$headers);
    } else {
    if ($_POST ['email'] != "") {
    echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
            }
            }
    //If the message is sent successfully, display sucess message otherwise display an error message.
    if($sentmail==1)
    {
            echo "<span style='color: #ff0000;'> A sua password foi enviada para o seu mail!</span>";
    }
            else
            {
            if($_POST['email']!="")
            echo "<span style='color: #ff0000;'>Problema a enviar o email..</span>";
    }
}
 

require("./application/views/top.template.php");
require("./application/views/forgotPassword.view.php");
require("./application/views/bottom.template.php");