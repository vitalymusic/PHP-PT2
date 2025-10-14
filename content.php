  <h1><?=$title ?></h1>
    <div>
        <?php
        if ($user == "Admin") {
            echo "Hello admin";
        } else {
            echo "not autorized";
        }
        ?>
    </div>



    <p>Tava parole ir: <?= sha1("Qwerty!12345") === $result?
    "Derīga":"Nederīga"?></p>