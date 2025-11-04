<?php
session_start();
if ($_SESSION["loggedIn"] == false) {
    header("location: login.php");
    exit();
}

include_once("./functions.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/css/bootstrap.min.css"
        integrity="sha512-2bBQCjcnw658Lho4nlXJcc6WkV/UxpE/sAokbXPxQNGqmNdQrWqtw26Ns9kFF/yG792pKR1Sx8/Y1Lf1XN4GKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Administrēšanas panelis</title>
</head>

<body>
    <h1>Administrēšanas panelis</h1>
    <h2>Labdien, <?= $_SESSION["username"] ?></h2>

    <a href="save.php?logout=true">Izlogoties</a>


    <div class="container">
        <h2>Raksti</h2>


        <table class="table table-borderes">
            <tr>
                <th>Numurs</th>
                <th>Nosaukums</th>
                <th>Izdzēst</th>
            </tr>
            <?php
            $result = get_posts();
            $data = [];
            $numurs = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()): ?>
                    <?php $data[] = $row; ?>
                    <tr class="post_div">
                        <?php $numurs++?>
                        <td><?=$numurs ?></td>
                        <td><?= $row["virsraksts"] ?></td>
                        <td><button class="btn btn-danger postDeleteBtn" data-postId="<?=$row["id"]?>">Izdzēst</button></td>
                    </tr> 
                <?php endwhile;
            }


            ?>

        </table>


    </div>


</body>

</html>