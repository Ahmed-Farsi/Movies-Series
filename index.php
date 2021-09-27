<?php

   $host = '127.0.0.1:3306';
   $db   = 'netland';
   $user = 'root';
   $pass = '';
   $charset = 'utf8mb4';
   $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
   $PDO = new PDO($dsn, $user, $pass);
   session_start();
?>
<!DOCTYPE html>

<head>
<title> Movies/Series </title>
</head>

<body>

<h1> Welkom op het netland beheerderspaneel </h1>
<br>
<?php
if ($_SESSION["ingelogd"]) {
    ?>
Click here to <a href="logout.php" tite="Logout">Logout.
    <?php
} else {
    echo "<h1>Please login first .</h1>";
}
?>
</body>
</html>



    <?php

    if (!isset($_SESSION["ingelogd"])) {
        header("Location: login.php");
    }

    if (isset($_GET["series_order"])) {
        $orderBy = $_GET["series_order"];
    } else {
        $orderBy = "title";
    }

    $queryserieseen = $PDO->query("
    SELECT 
    title, rating, id
    FROM 
    media
    ORDER BY 
    " . $orderBy . " DESC");


    if (isset($_GET["films_order"])) {
        $orderBytitel = $_GET["films_order"];
    } else {
        $orderBytitel = "titel";
    }

    $queryfilmseen = $PDO->query("
    SELECT
    titel, tijdsduur, id
    FROM
    media
    ORDER BY
    " . $orderBytitel . " DESC");
    

    $queryserieseenresultaat = $queryserieseen->fetchAll(PDO::FETCH_ASSOC);
    $queryfilmseenresultaat = $queryfilmseen->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <h1>Series</h1>
        <table>
            <thead>
                <tr>
                    <th>
                    <a href="<?php 
                    $filmsOrder = "";
                    if (!empty($_GET["films_order"])) {
                        $filmsOrder = "&films_order=" . $_GET["films_order"];
                    }
                    $linkseriestitle = "index.php?series_order=title" . $filmsOrder ;
                    echo $linkseriestitle;
                    ?>">title</a>
                </th>
            <th>
                <a href="<?php
                $filmsOrder = "";
                if (!empty($_GET["films_order"])) {
                    $filmsOrder = "&films_order=" . $_GET["films_order"];
                }
                $linkseriesrating = "index.php?series_order=rating" . $filmsOrder;
                echo $linkseriesrating;
                ?>">rating</a>
                    </th>

                     
                </tr>
            </thead>
            <tbody>   
                    
        <?php
        foreach ($queryserieseenresultaat as $second) {
            ?>
            <tr>
                <td>
                    <?php
                    echo $second["title"] . PHP_EOL;
                    ?>
                </td>
                <td>
                    <?php
                    echo $second["rating"] . PHP_EOL;
                    ?>
                </td>
                <td>
                <a href="media.php?id=<?php 
                echo $second["id"];
                ?>">Bekijk details</a>
                </td>
                <td>
                <a href="edit.php?id=<?php 
                echo $second["id"];
                ?>">wijzig</a>
                </td>
                <td>
                <a href="insert.php?id=<?php 
                echo $second["id"];
                ?>">toevoegen</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
        
        <h1>Films</h1>
        <table>
            <thead>
                <tr>
                    <th>
                    <a href=<?php 
                    $seriesOrder = "";
                    if (!empty($_GET["series_order"])) {
                        $seriesOrder = "&series_order=" . $_GET["series_order"];
                    }
                    $linkfilmtitel = "index.php?films_order=titel" . $seriesOrder;
                    echo $linkfilmtitel
                    ?>>titel</a>      
                    </th>
                    <th>
                    <a href=<?php 
                    $seriesOrder = "";
                    if (!empty($_GET["series_order"])) {
                        $seriesOrder = "&series_order=" . $_GET["series_order"];
                    }
                    $linkfilmtijdsduur = "index.php?films_order=tijdsduur" . $seriesOrder;
                    echo $linkfilmtijdsduur
                    ?>>lenght</a>
                    
                    </th>
                </tr>
            </thead>
            <tbody>            
        <?php
        foreach ($queryfilmseenresultaat as $first) {
            ?>
            <tr>
                <td>
                    <?php
                    echo $first["titel"] . PHP_EOL;
                    ?>
                </td>
                <td>
                    <?php
                    echo $first["tijdsduur"] . PHP_EOL;
                    ?>
                </td>
                <td>
                <a href="media.php?id=<?php 
                echo $first["id"];
                ?>">Bekijk details</a>
                </td>
                <td>
                <a href="edit.php?id=<?php 
                echo $second["id"];
                ?>">wijzig</a>
                </td>
                <td>
                <a href="insert.php?id=<?php 
                echo $second["id"];
                ?>">toevoegen</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
    </body>
</html>