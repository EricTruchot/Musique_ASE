<?php

session_start();
$db = new PDO('mysql:host=localhost;dbname=test', 'sebastien', 'sebastien')
    or die('could not connect to database');

if (isset($_GET['song'])) {


    $song = (string) trim($_GET['song']);

    $req = $db->prepare(
        "SELECT * FROM musique WHERE nom LIKE '%$song%'
    LIMIT 10",
        //array("%$song%")
    );
    $req->execute();
    $res = $req->fetchAll();

    foreach ($res as $r) {
?>
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc">
            <p style="color: white;"> <?= $r['nom'] . "" . $r['artiste'] ?> </p>
        </div>
<?php
    }
}
?>