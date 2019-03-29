<?php
    $saludo = saludoUsuario("Jose");
    var_dump($saludo);
    $random_number = mt_rand(1, 9);
        for ($i = 0; $i < 3; $i++) {
            $random_number .= mt_rand(0, 9);
        }
    print($random_number);
  
    function saludoUsuario($name){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/hello/" . $name);
        curl_setopt($ch, CURLOPT_HEADER, 0);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Fetch and return content, save it.
        $raw_data = curl_exec($ch);
        curl_close($ch);

        // If the API is JSON, use json_decode.
        $data = json_decode($raw_data);
        return $data;

    }
    

?>