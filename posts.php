<?php
require_once("./db.php");


$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

// var_dump($result);
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()): ?>
        <?php $data[] = $row; ?>
        <div class="post_div">
            <h2><?= $row["virsraksts"] ?></h2>
            <div class="post_content">
                <?= $row["saturs"] ?>
            </div>
            <span class="date"><?= $row["izveidots"] ?></span>
        </div>

    <?php endwhile;
}



// echo json_encode($data,JSON_UNESCAPED_UNICODE);
?>

<div class="btns">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
        Pievienot rakstu
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pievienot jaunu rakstu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="mb-3">
                        <label for="postNameInput" class="form-label">Raksta nosaukums</label>
                        <input type="text" class="form-control" id="postNameInput" name="postNameInput"
                            placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="postContentInput" class="form-label">Saturs:</label>
                        <textarea class="form-control" id="postContentInput" name="postContentInput" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="savePostBtn">Saglabāt</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->