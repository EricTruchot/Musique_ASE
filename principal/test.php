<?php
include '../connexion.php';
// COMMANDE SQL, query:  prépare et exécute une requête SQL en un seul appel de fonction,
$u = $_SESSION['id'];
$stmt = $pdo->query("SELECT * FROM commande WHERE idUser_p3 = $u");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
    <link rel="stylesheet" href="../livreur/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="wrapper">
        <div class="header">Simply only very</div>
        <div class="menu">
            <!--#demo.hoge(v-bind:class="{active:isActive}", v-on:click="isActive=!isActive") click here!
    -->
            <nav class="nav flex-column">
                <a class="nav-link" href="javascript:void(0);" v-bind:class="{active:isActive}" v-on:click="isActive=!isActive"></a>

                <a class="nav-link" href="./commande/clientCommande.php">Commande</a>
                <a class="nav-link disabled" href="#">Client</a>


                <form>
                    <a class="nav-link" href='../index.php'><span>Déconnexion</span></a>

                    <?php
                    if (isset($_GET['submit'])) {
                        if ($_GET['submit'] == true) {
                            session_unset();
                            header("location:../adminPage.php");
                        }
                    } else if (isset($_SESSION['pseudo'])) {
                        $user = $_SESSION['pseudo'];
                        // afficher un message
                        echo "<br>Bonjour $user";
                    }
                    ?>

                </form>

            </nav>


        </div>
        <div class="content">
            <p class="toggle" href="#"></a>
            <div class="og_table table-responsive">
                <table class="table table-striped table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Numero Commande</th>
                            <th scope="col">Commande</th>
                            <th scope="col">Lieu</th>
                            <th scope="col">Date - Heure</th>
                            <th scope="col">Statut</th>
                        </tr>
                    </thead>

                    <?php while ($row = $stmt->fetch()) {
                        $i = $row->idUser_p3 ?>
                        <tr>
                            <!-- ON UTILISE LE TAG PHP ET ECHO DANS LES CASES DU TABLEAU POUR LES REMPLIR AVEC LES DONNÉES -->
                            <form action="edit.php" method="post">
                                <td><?php echo $row->idCommande; ?></td>
                                <td><?php echo $row->comCommande; ?></td>
                                <td><?php echo $row->lieu; ?></td>
                                <td><?php echo $row->dateHeure; ?></td>
                                <td style="color: white;" class="<?php echo $row->statut; ?>"><?php echo $row->statut; ?></td>
                            </form>
                        </tr>

                    <?php } ?>
                </table>
            </div>
        </div>

    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js'>

    </script>

    <script src="../livreur/script.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-musique').keyup(function() {
                $('#result-search').html("")

                var musique = $(this).val();
                console.log("test", musique)

                if (musique != "") {
                    $.ajax({
                        type: 'GET',
                        url: 'recherche.php',
                        data: 'song=' + encodeURIComponent(musique),
                        success: function(data) {
                            if (data != "") {
                                document.getElementById('resultat-search').innerHTML = ""
                                $('#resultat-search').append(data)
                                console.log('musique')
                            } else {
                                document.getElementById('resultat-search').innerHTML = ""
                                document.getElementById('resultat-search').innerHTML = "<div>aucune musique</div>"
                            }
                        }

                    });
                }
            })
        })
    </script>

</body>

</html>