<?php
    require_once("./functions.php");
    $result = get_pictures();
    $bildes = [];
?>

<h2>Bilžu galerija</h2>
<div class="gallery  d-flex">
    <?php 
        if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()){
        $bildes[] = $row;
    }
}
    ?>
    

        <div class="container my-4">
        <div class="row g-3">
            <?php foreach($bildes as $row): ?>
            <div class="col-6 col-md-4 col-lg-3 text-center">
                <div class="bilde card border-0">
                <img src="<?= $row["url"] ?>" class="img-thumbnail" style="height:200px; object-fit:cover; width:100%;" />
                <h6 class="mt-2"><?= htmlspecialchars($row["name"]) ?></h6>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        </div>

</div>