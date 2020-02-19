<?php 

session_start();

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $db = new PDO('mysql:host=localhost;dbname=login_system','root','');
        
        $sql = "SELECT * FROM user where email = '$email'";
        $result = $db->prepare($sql);
        $result -> execute();

        if($result->rowCount()>0){
            $data = $result->fetchAll();
            if(password_verify($pass, $data[0]["password"])){
                echo "Connexion done.";
            }
        }else{
            echo "Identifiant ou mot de pass erroné.";
        }
    }

?>