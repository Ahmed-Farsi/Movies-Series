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
        <title>insert</title>
    </head>
        <body>
            <h1> Nieuwe serie/film </h1>
            <form method ="POST">
                <a href="index.php">terug</a>
                
                <p>Titel</p><input type="text" name="titel" value="">
                <select name="type" value="Type">
                <option value="serie">serie</option>
                <option value="film">film</option>
                </select>
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
            if (isset($_POST["omschrijving"])) {
                $id = $_POST["titel"];
                $query = "INSERT INTO media (`titel`, `omschrijving`, `tijdsduur`, `datum_van_uitkomst`, `land_van_herkomst`, `trailerlink`, `has_won_awards`, `seasons`, `country`, `language`)
                VALUES ('$_POST[titel]','$_POST[omschrijving]', '$_POST[tijdsduur]', '$_POST[datum_van_uitkomst]', '$_POST[land_van_herkomst]', '$_POST[trailerlink]', '$_POST[has_won_awards]', 
                '$_POST[seasons]', '$_POST[country]', '$_POST[language]')";
                $PDO->query($query);
            }
            ?>
        </body>
</html>