<!DOCTYPE html>
<html>
<?php
$host = '127.0.0.1:3306';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$PDO = new PDO($dsn, $user, $pass);
?>
    <head>
        <title>edit</title>
    </head>
        <body>
            <form method ="POST">
                <a href="index.php">terug</a>
                <p>Titel</p><input type="text" name="titel" value="">
                <p>omschrijving</p><input type="text" name="omschrijving" value="">
                <p>tijdsduur</p><input type="text" name="tijdsduur" value="">
                <p>datum_van_uitkomst</p><input type="text" name="datum_van_uitkomst" value="">
                <p>land_van_herkomst</p><input type="text" name="land_van_herkomst" value="">
                <p>trailerlink</p><input type="text" name="trailerlink" value="">
                <p>Has_won_awards</p><input type="number" name="has_won_awards" value="">
                <p>Seasons</p><input type="number" name="seasons" value="">
                <p>country</p><input type="text" name="country" value="">
                <p>language</p><input type="text" name="language" value="">
                <input type="submit" name="update">
            </form>
            <?php
            if (isset($_POST["update"])) {
                $id = $_POST["titel"];
                $query = "UPDATE media 
                SET titel='$_POST[titel]', omschrijving='$_POST[omschrijving]', 
                tijdsduur='$_POST[tijdsduur]', datum_van_uitkomst='$_POST[datum_van_uitkomst]', land_van_herkomst='$_POST[land_van_herkomst]', trailerlink='$_POST[trailerlink]',
                has_won_awards='$_POST[has_won_awards]', seasons='$_POST[seasons]', country='$_POST[country]', language='$_POST[language]' 
                WHERE id='$_GET[id]'";
                $PDO->query($query);
            }
            ?>
        </body>
</html>