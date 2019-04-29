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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    $errores = '';

    if (empty($nombre) or empty($usuario) or empty($apellido) or empty($correo) or empty($telefono) or empty($password) or empty($password2)) {
        $errores .= '<li>Por favor rellena todos los datos correctamente</li>';
    } else {
        
        //Se encriptan las contraseñas (SHA512)
        $password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);

        if ($password != $password2) {
            $errores .= '<li>Las contraseñas no coinciden</li>';
        }
        
        $infoRegistro = "{\"nombre\": \" " . $nombre . " \",
             \"usuario\": \" " . $usuario . " \",
             \"apellido\": \" " . $apellido . " \",
             \"correo\": \" " . $correo . " \",
             \"clave\": \" " . $password . " \",
             \"telefono\": \" " . $telefono . " \"}";
        $api = new RestClient;
        $result = $api->post("http://localhost/server/public/api/usuario/nuevo", $infoRegistro, 
            ['Content-Type' => 'application/json']);
        
        $code = $result->info->http_code;
        $respuesta = $result->decode_response();
        echo $code;
        switch ($code) {
            case 404:
                $errores .= '<li>' . $respuesta . '</li>';
                break;

            case 500:
                $errores .= '<li>' . $respuesta . '</li>';
                break;

            case 201:
                $_POST['unauth'] = $usuario;
                header('Location: verificacion.php');
                break;
        }
    }
}
require 'views/registro.view.php';

?>
