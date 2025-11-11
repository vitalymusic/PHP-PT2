<?php
require_once("./functions.php");


$result = get_posts();

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
    <?php include_once("./modal.php")?>
<!-- Modal -->

<script>
    $(document).ready(function() {
         $('#postContentInput').summernote();
        var noteBar = $('.note-toolbar');
        noteBar.find('[data-toggle]').each(function () {
            $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
        });



    
});

</script>
<script>
    // Saglabāt modāla dialoga datus un nosūtīt ar Fetch;

    
    let addPostModal = new bootstrap.Modal('#addPostModal');
    let addPostForm = document.querySelector('#addPostModal form');
    let savePostBtn = document.querySelector('#savePostBtn');


    savePostBtn.onclick = ()=>{
          fetch('functions.php?action=savePost',{
            method:"POST",
            body: new FormData(addPostForm)
          }).then(()=>{
                addPostForm.reset();
                addPostModal.hide();

          }).then(()=>{
            location.reload();
          })  
    }


</script>