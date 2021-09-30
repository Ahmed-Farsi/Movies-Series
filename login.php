<?php
$host = '127.0.0.1:3306';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$PDO = new PDO($dsn, $user, $pass);
?>

<!DOCTYPE html>
    <head>
        <title> Login </title>
    </head>
    <body>
        <h1> Netland Admin Panel </h1>
        <br>
            <form method ="POST">
                <label><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <button type="submit" name="update"> Login</button>
                <label>
            </form>
    <?php
        session_start();
    if (isset($_POST["update"])) {
        $uname = $_POST["username"];
            $password = $_POST["password"];
                $stmt = $PDO->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = :uname AND wachtwoord= :password ");
            $stmt->bindParam("uname", $uname);
        $stmt->bindParam("password", $password);
        $stmt->execute();
        $Resultaat = $stmt->fetchAll();
        var_dump($Resultaat);

        if (count($Resultaat) > 0) {
                header("Location: index.php");
                $_SESSION["ingelogd"] = 1;
        } else {
            echo "Gebruikersnaam of wachtwoord ongeldig";
        }
    }
    ?>
    </body>
</html>