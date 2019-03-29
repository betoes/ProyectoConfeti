<?php session_start();

    if (isset($_SESSION['usuario'])) {
        header('Location: confetiPrincipal.php');
        die();
    }

    $errores = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
        $password = $_POST['password'];

        $dsn = 'mysql:dbname=login_practica,host=localhost';
        $username = 'root';
        $pass = 're2347';

            try{
                $conn = new PDO('mysql:host=localhost;dbname=login_practica', $username, $pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        
        

        $statement = $conn->prepare('SELECT * FROM usuario where usuario = :usuario AND password = :password');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':password' => $password
        ));

        $resultado = $statement->fetch();

        if($resultado !== false) {
            $_SESSION['usuario'] = $usuario;
            header('Location: confetiPrincipal.php');
        } else {
            $errores = 'Datos incorrectos';
        }
    }

 require_once 'views/iniciarSesion.view.php';
?>