<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Wędkowanie</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedkowanie";

$connection = mysqli_connect(hostname: $servername, username: $username, password: $password = "",database: $dbname);

?>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <div class="lewyprawy">
        <div class="lewy">
            <div class="lewy1">
                <h3>Ryby zamieszkujące rzeki</h3>
                <ol>
                    <li>
                        <?php  
                            $result = mysqli_query(mysql: $connection, query:"SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby JOIN lowisko on ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3;");
                            while ($item = mysqli_fetch_array(result: $result)){
                                echo "<li>", $item[0], " pływa w rzece ", $item[1], "</li>";
                            }
                        
                        ?>
                    </li>
            
                </ol>
            </div>
            <div class="lewy2">
                <h3>Ryby drapieżne naszych wód</h3>
                <table class="table">
                    <tr>
                        <th>L.p.</th>
                        <th>Gatunek</th>
                        <th>Występowanie</th>
                    </tr>
                    <?php 
                    $result1 = mysqli_query(mysql: $connection, query: "SELECT `id`, `nazwa`, `wystepowanie` FROM `ryby` WHERE  `styl_zycia` = 1");
                    while ($item1 = mysqli_fetch_array(result: $result1)){
                        echo "<tr>";
                        echo "<td>", $item1[0]   ,"</td>";
                        echo "<td>", $item1[1]   ,"</td>";
                        echo "<td>", $item1[2 ]   ,"</td>";
                        echo "</tr>";
                    }
                    ?>
                    
                </table>
            </div>
        </div>
        <div class="prawy">
            <img src="ryba1.jpg" alt="Sum">
            <br>
            <a href="kwerendy.txt" download>Pobierz kwerendy</a>
        </div>
    </div>
    <footer>
        <p>Stronę wykonał:00000000000000</p>
    </footer>
</body>
</html>