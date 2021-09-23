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
                    <button type="submit">Login</button>
                <label>
            </form>
            <?php
            session_start();
            if (isset($_POST["update"])) {
                $uname = $_POST["username"];
                $password = $_POST["password"];
                $query = "SELECT * FROM gebruikers";
                $query = $PDO->query($query);
                $query = $query->fetchAll(PDO::FETCH_ASSOC);
                if ($uname == $query[0]["gebruikersnaam"]) {
                    if ($password == $query[0]["wachtwoord"]) {
                        header("Location: index.php");
                        $_SESSION["ingelogd"] = 1;
                    } 
                } 
                if ($uname !== $query[0]["gebruikersnaam"]) {
                    echo "Invalide username" . PHP_EOL;
                }
                if ($password !== $query[0]["wachtwoord"]) {
                    echo "Invalide password";
                }
            }
            
            ?>
    </body>
</html>