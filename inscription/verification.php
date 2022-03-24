<?php
include '../connexion.php';




if (isset($_POST['pseudo']) && isset($_POST['password'])) {
   // connexion à la base de données


   // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
   // pour éliminer toute attaque de type injection SQL et XSS
   $userName = $_POST['pseudo'];
   $password = $_POST['password'];
   // si les chant du formulaire ne sont vide on continue
   if (isset($userName) && isset($password)) {
      // prepare la requete dans une variable pour appeler la donnée (1 seul ligne viendra)
      $sql = $pdo->prepare("SELECT * FROM pseudo where login = :userpseudo ");
      // execution de la requete
      $sql->execute(["userpseudo" => $userName]);
      // transformer le retour en tableau
      $reponse = $sql->fetchAll();
      // vérification du mot de passe en variable
      //$verifPwd = password_verify($password, $reponse[0]->mdp);
      $verifPwd = password_verify($password, $reponse[0]->mdp);
      // si le mot de passe et pseudo alors on continue
      if ($verifPwd == true && ($userName == $reponse[0]->login)) // nom d'utilisateur et mot de passe correctes
      {
         $_SESSION['pseudo'] = $userName;
         header('Location: ../principal/principale.php');
      } else {
         header('Location: ../index.php?erreur=1'); // utilisateur ou mot de passe incorrect
      }
   } else {
      header('Location: ../index.php?erreur=2'); // utilisateur ou mot de passe vide
   }
}
