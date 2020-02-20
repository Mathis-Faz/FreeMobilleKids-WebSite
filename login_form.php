<?php 

$bdd = new PDO('mysql:host=localhost:8889;dbname=login_system', 'root', 'root');

if(isset($_POST['form_connexion'])){
  $identifiant = htmlspecialchars($_POST['identifiant']);
  $passwordconnect = password_hash($_POST['passwordconnect']);
  if(!empty($identifiant) AND !empty($passwordconnect)){
    $requser = $bdd->prepare("SELECT * FROM user WHERE identifiant = ? AND passwordconnect = ? ");
    $requser->execute(array($identifiant,$passwordconnect));
    $userexist = $requser->rowCount();
    if($userexist == 1){
      header('Location: index.php');
    } else {
      echo "mauvais mail ou mdp";
    } 
  } else {
    echo "Veuillez remplir les informations";
  }
}
?>

<!DOCTYPE html>

<html>

  <head>
  <meta charset="UTF-8"/>
        <link href="https://fonts.googleapis.com/css?family=Bangers&display=swap" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title> Connexion - Free Mobile Kid </title>
  </head>

  <div align="center">
    <h1>Connexion au site freemobilekid.fr</h1>
    <br/>
    <br/>
    <form action="" method="POST"> 
      <table>
        <tr>
          <td align="right">
            <label for="idenfitiant">Identifiant : </label>
          </td>
          <td>
            <input type="text" placeholder="Votre identifiant" name="identifiant">
          </td>
        </tr>
        <tr>
          <td align="right">
            <label for="passwordconnect">Mot de passe : </label>
          </td>
          <td>
            <input type="password" placeholder="Votre mot de passe" name="passwordconnect">
          </td>
        </tr>
        <tr>
          <td></td>
          <td align="center">
            <br>
            <input type="submit" name="form_connexion" id="connexion" value="Connexion">
          </td>
        </tr>
      </table>
    </form>
  </div>
  <body>  </body>
</html>