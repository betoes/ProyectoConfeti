<?php session_start();
    if (isset($_SESSION['usuario'])) {
        header('Location: confetiPrincipal.php');
        die();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = filter_var(strtolower($_POST['nombre']), FILTER_SANITIZE_STRING);
        $apellido = filter_var(strtolower($_POST['apellido']), FILTER_SANITIZE_STRING);
        $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
        $errores = '';

        $dsn = 'mysql:dbname=test,host=localhost';
        $username = 'root';
        $pass = '';
        

        if(empty($nombre) or empty($apellido) or empty($correo) or empty($telefono) or empty($password) or empty($password2)){
            $errores .= '<li>Por favor rellena todos los datos correctamente</li>';
        } else {
            try{
                $conn = new PDO('mysql:host=localhost;dbname=test', $username, $pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "ERROR: " . $e->getMessage();
            }
                
            $statement = $conn->prepare('SELECT * FROM usuario WHERE nombre = :nombre LIMIT 1');
            $statement -> execute(array(':nombre' => $nombre));

            $resultado = $statement->fetch();

            if($resultado != false){
                $errores .= '<li>El nombre de usuario ya existe</li>';
            }

            //CODIFICAR CONTRASEÑAS

            if($password != $password2) {
                $errores .= '<li>Las contraseñas no coinciden</li>';
            }
        }

        if($errores == ''){
            $statement = $conn->prepare(
                'INSERT INTO usuario (nombre, apellido, correo, password, password2, telefono)
                 VALUES (:nombre, :apellido, :correo, :password, :password2, :telefono)'
                );
            $statement->execute(array(
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':correo' => $correo,
                ':password' => $password,
                ':password2' => $password2,
                ':telefono' => $telefono
            ));

        }
    }
    require_once 'views/registro.view.php';
?>