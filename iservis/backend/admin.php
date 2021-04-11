<?php
    require 'database.php';

    $link = 'SELECT id_objednavky, meno, priezvisko, adresa, email, telefon, poznamka, nazov, cena FROM objednavky INNER JOIN sluzby ON sluzby.id_sluzby = objednavky.id_sluzby';

    $retval = mysqli_query( $database, $link);

    if(! $retval ) {
        die('Could not get data: ' . mysql_error());
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
        <title>iServis Prešov</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <style>
        * {
        box-sizing: border-box;
        }

        body {
        padding: 0.2em 2em;
        }

        table {
        width: 100%;
        }
        table th {
        text-align: left;
        border-bottom: 1px solid #ccc;
        }
        table th,
        table td {
        padding: 0.4em;
        }
        .disable {
            display: none;
        }
        </style>
    </head>
        <body onload="navblack()">

        <div id="login">
            <input type="text" id="name" placeholder="Meno">
            <input type="password" id="pass" placeholder="Heslo">
            <button id="button">Prihlásiť sa</button>
        </div>
        <?php
                if(mysqli_num_rows($retval) > 0){
                    echo "<table id='tbl' class = 'disable'>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Meno</th>";
                            echo "<th>Priezvisko</th>";
                            echo "<th>Adresa</th>";
                            echo "<th>Email</th>";
                            echo "<th>Telefónne číslo</th>";
                            echo "<th>Poznámka</th>";
                            echo "<th>Objednávka</th>";
                            echo "<th>Cena</th>";
                        echo "</tr>";
                    while($row = mysqli_fetch_array($retval)){
                        echo "<tr>";
                            echo "<td>" . $row['id_objednavky'] . "</td>";
                            echo "<td>" . $row['meno'] . "</td>";
                            echo "<td>" . $row['priezvisko'] . "</td>";
                            echo "<td>" . $row['adresa'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['telefon'] . "</td>";
                            echo "<td>" . $row['poznamka'] . "</td>";
                            echo "<td>" . $row['nazov'] . "</td>";
                            echo "<td>" . $row['cena'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_free_result($retval);
                } else{
                    echo "No records matching your query were found.";
                }
        ?>


<script>

    const btn = document.getElementById('button');
    const table = document.getElementById('tbl');
    const login = document.getElementById('login');

    btn.addEventListener("click", function() {
        let name = document.getElementById('name').value;
        let pass = document.getElementById('pass').value;
        if (name === "cisco" && pass === "cisco") {
            table.classList.remove('disable');
            login.classList.add('disable');
        } else {
            alert("ZLE HESLO");
        }
}, false);
</script>    
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>