<?php session_start();

    require 'vendor/autoload.php';
    if (isset($_SESSION['usuario'])) {
        if($_SESSION['auth'] == 1){
            header('Location: confetiPrincipal.php');
            die();
        } else if($_SESSION['auth'] == 0) {
            $unauth = $_SESSION['usuario'];
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $pin = filter_var($_POST['pin'], FILTER_SANITIZE_STRING);
                $errores = "";

                if(empty($pin) or strlen($pin) < 3 ){
                    $errores .= "Ingresa correctamente los 3 digitos del codigo";
                } else {
                    $infoVerificacion = "{\"pin\": \" " . $pin . " \",
                        \"usuario\": \" " . $unauth . " \"}";
                    $api = new RestClient;
                    $result = $api->post("http://localhost/server/public/api/usuario/auth", $infoVerificacion, 
                    array('Content-Type' => 'application/json'));
                    $code = $result->info->http_code;
                    echo $code;
                    echo $unauth;
                    echo $pin;

                    switch($code) {
                        case 200:
                            session_destroy();
                            $_SESSION = array();
                            $_SESSION['usuario'] = $unauth;
                            header('Location: confetiPrincipal.php');
                            break;
                        case 500:
                            $errores .= '<li>'. $result->decode_response() .'</li>';
                            break;
                        case 404:
                            $errores .= '<li>PIN incorrecto</li>';
                            break;
                    }
                    
                }
            }
        
        }
    } else {
        session_destroy();
        $_SESSION = array();
        header('Location: inicioSesion.php');
        die();
    }

    

    require 'views/verificacion.view.php';
?>