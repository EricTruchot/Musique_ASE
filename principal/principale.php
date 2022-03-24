<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - bootstrap dropdown hover menu</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="body-wrap">
        <div class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">SimplonSong</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href='principale.php?deconnexion=true'><span>Déconnexion</span></a>
                                <!-- <?php
                                        session_start();
                                        if (isset($_GET['deconnexion'])) {
                                            if ($_GET['deconnexion'] == true) {
                                                session_unset();
                                                header("location:../index.php");
                                            }
                                        } else if (isset($_SESSION['pseudo'])) {
                                            $user = $_SESSION['pseudo'];
                                            // afficher un message
                                            echo "<br>Bonjour $user";
                                        }
                                        ?>/li> -->

                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder=" Search" id="search-musique">
                                </div>
                            </li>

                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
            <section>
                <div id="resultat-search">

                </div>
            </section>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>
    <script src="./script.js"></script>
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