<?php session_start();

    require 'vendor/autoload.php';


    if (isset($_SESSION['usuario'])) {
        if($_SESSION['auth'] == 1) {
            header('Location: confetiPrincipal.php');
            die();
        } else if($_SESSION['auth'] == 0) {
            header('Location: verificacion.php');
            die();
        }
    }

    $errores = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
        $password = $_POST['password'];

        $password = hash('sha512', $password);

    $infoLogin = "{\"usuario\": \" " . $usuario . " \", \"clave\": \" " . $password . " \" }";


        $api = new RestClient;
        $result = $api->post("http://localhost/server/public/api/usuario/login", $infoLogin, 
        ['Content-Type' => 'application/json']);
        $response = $result->decode_response();
        $code = $result->info->http_code;
        echo $code;

        switch ($code) {
            case 200:
                if($response){
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['auth'] = 1;
                    header('Location: confetiPrincipal.php');
                } else {
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['auth'] = 0;
                    header('Location: verificacion.php');
                }
                break;
            case 404:
                $errores .= '<li>'. $response .'</li>';
                break;
        }

    }

 require 'views/iniciarSesion.view.php';
?>