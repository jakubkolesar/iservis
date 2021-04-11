<?php
    require './backend/database.php';

    $sql = 'SELECT * FROM sluzby';

    $arr = array();

    $retval = mysqli_query( $database, $sql );
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
            form {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
            }
            input, select {
                margin: 1em 0;
            }
        </style>
    </head>
<body onload="navblack()">
    <nav class="navbar" id="myTopnav">
        <div class="logo">iServis</div>
        <ul class="menu-list">
            <li><a href="index.html">Domov</a></li>
            <li><a href="index.html">Služby</a></li>
            <li><a href="index.html">Cenník</a></li>
            <li><a href="index.html">Kontakt</a></li>
            
        </ul>
        <div class="burger" onclick="background()">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <div id="app">
    <div class="objednat">
        <form action="/backend/odoslanie.php" method="post">
            <input type="text" name="meno" placeholder="meno">
            <input type="text" name="priezvisko" placeholder="priezvisko">
            <input type="email" name="email" placeholder="email">
            <input type="text" name="telefon" placeholder="telefon">
            <input type="text" name="adresa" placeholder="adresa">
            <select v-model="data" name="sluzba">
                <?php
                    while($data = mysqli_fetch_array($retval)) {
                        $arr[$data["nazov"]] = $data["cena"];
                ?>
                <option value="<?php echo $data["id_sluzby"]; ?>"><?php echo $data["nazov"]; ?></option>
                <?php
                    }
                ?>
            </select>
            <textarea name="poznamka" id="" cols="30" rows="10" placeholder="poznamka"></textarea>
            <button type="submit">Odoslať</button>
        </form>
    </div>
    </div>

<script>

            document.getElementById('cars').onclick = function()
            {
                var input_val = document.getElementById('input').value;
                document.getElementById('carr').value = input_val;
            }
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