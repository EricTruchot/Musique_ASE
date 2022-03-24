<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS INSCRIPTION -->
    <link rel="stylesheet" href="./style.css" media="screen" type="text/css" />
    <!-- modification du texte -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SimplonSong</title>
</head>

<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
</head>

<body class="quizz">


    <div id="container" class="container">
        <div class="container__button">
            <button id="conneClick" class="login" data-info="connection">connection</button>
            <button id="insClick" class="login" data-info="inscription">inscription</button>
        </div>
        <!-- zone de connexion -->
        <div class="connection" id="connection">
            <form action="./inscription/verification.php" method="POST">
                <h2>Connexion</h2>

                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Pseudo" name="pseudo" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN'>
            </form>

        </div>


        <div class="inscription" id="inscription">
            <form action="./inscription/inscription.php" method="post">
                <h2>Inscription</h2>

                <!-- <label for=""><b>Nom :</b></label>
                <input type="text" name="nom" id="name" placeholder="Nom"> <br>
                <label for=""><b>Prénom :</b></label>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom"> <br>
                <label for=""><b>Email :</b></label> <br>
                <input type="email" name="mail" id="mail" placeholder="Mail"> <br> -->
                <label for=""><b>Pseudo :</b></label>
                <input type="text" name="userPseudo" id="pseudo" placeholder="Pseudo"> <br>
                <label for=""><b>Mot de Passe :</b></label>
                <input type="password" name="password" id="" placeholder="Password"> <br>

                <!-- <label><b>Type d'utilisateur :</b></label><br>
                <select name="menu" id="menu">
                    <option value="client">client</option>
                    <option value="livreur">livreur</option>
                    <option value="admin">admin</option>
                </select><br> -->
                <input type="submit" value="inscription">
            </form>
        </div>
        <br>
        <br>
        <?php
        if (isset($_GET['erreur'])) {
            $err = $_GET['erreur'];
            if ($err == 1 || $err == 2)
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            if ($err == 3 || $err == 3)
                echo "<p style='color:red'>Il manque une donnée</p>";
            if ($err == 5)
                echo "<p style='color:red'>Pseudo déjà existant</p>";
            if ($err == 6)
                echo "<p style='color:green'>Vous êtes inscrit veuillez vous connecter</p>";
        }
        ?>

    </div>
    <script src="./script.js"></script>
</body>

</html>