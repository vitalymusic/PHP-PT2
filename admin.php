<?php
session_start();
// if ($_SESSION["loggedIn"] == false) {
//     header("location: login.php");
//     exit();
// }

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

    <!-- SummerNote editor -->
    <!-- include summernote css/js -->
    <link href="./summernote/summernote.min.css" rel="stylesheet">
    <script src="./summernote/summernote.min.js"></script>


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
                <th>Rediģēt</th>
                <th>Izdzēst</th>
            </tr>
            <?php
            $result = get_posts();
            // $data = [];
            $numurs = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()): ?>
                    <?php //$data[] = $row; ?>
                    <tr class="post_div">
                        <?php $numurs++ ?>
                        <td><?= $numurs ?></td>
                        <td><?= $row["virsraksts"] ?></td>
                        <td><button class="btn btn-secondary postEditBtn" data-postId="<?= $row["id"] ?>">Rediģēt</button></td>
                        <td><button class="btn btn-danger postDeleteBtn" data-postId="<?= $row["id"] ?>">Izdzēst</button></td>
                    </tr>
                <?php endwhile;
            }
            ?>

        </table>


    </div>

    <div class="container">
        <h2>Bilžu galerija</h2>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Pievienot jaunas
                    bildes</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Bilžu
                    noņemšana</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <h3 class="text-center my-3">Bilžu pievienošana</h3>
                <div class="col-4 mx-auto">
                    <form action="" class="p-3 border rounded shadow-sm bg-light" id="addImageForm">
                        <div class="mb-3">
                            <label for="imageName" class="form-label">Attēla nosaukums</label>
                            <input type="text" class="form-control" name="imageName" id="imageName"
                                placeholder="Ievadi attēla nosaukumu">
                        </div>

                        <div class="mb-3">
                            <label for="imageSrc" class="form-label">Attēla URL</label>
                            <input type="text" class="form-control" name="imageSrc" id="imageSrc"
                                placeholder="Ievadi attēla adresi (URL)">
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Attēla fails</label>
                            <input type="file" class="form-control " name="file" id="file" placeholder="file">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Pievienot bildi galerijai</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <h3 class="text-center my-3">Dzēst bildes</h3>
                <div class="image_gallery d-flex justify-content-center flex-wrap gap-5">

                </div>

            </div>
        </div>
    </div>


    <!-- modal -->
    <?php include_once("./modal.php") ?>
    <!-- modal -->

    <script>
        $(".postDeleteBtn").on('click', (e) => {
            if (confirm("Tiešām izdzēst?")) {
                let postId = e.target.dataset.postid;
                $.get('./functions.php?action=delete&id=' + postId, (resp) => {

                })
                    .then(() => {
                        window.location.reload();
                    })
            }
        })
        // CRUD -> Create, Read,Update,Delete

        $(document).ready(() => {


            $('#addPostModal').attr('id', 'editPostModal');
            $('.modal-title').text('Rediģēt');
            $('#savePostBtn').attr('id', 'updatePostBtn');


            $('#postContentInput').summernote();
            var noteBar = $('.note-toolbar');
            noteBar.find('[data-toggle]').each(function () {
                $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
            });




            let editPostModal = new bootstrap.Modal('#editPostModal');
            let editPostForm = document.querySelector('#editPostModal form');
            let updatePostBtn = document.querySelector('#updatePostBtn');



            $(".postEditBtn").on('click', (e) => {

                let postId = e.target.dataset.postid;
                $.get('./functions.php?action=load&id=' + postId, (resp) => {
                    // Servera atbilde ar formas datiem
                    return resp
                })
                    .then((resp) => {
                        data = JSON.parse(resp);
                        $('#postNameInput').val(data.virsraksts);
                        $('#postContentInput').val(data.saturs);
                        $('#postNameInput').attr('data-postID', data.id);

                        $('#postContentInput').summernote('reset');
                        $('#postContentInput').summernote('pasteHTML', data.saturs);

                    })
                    .then(() => {
                        editPostModal.show();
                    })
            })
            updatePostBtn.onclick = () => {
                data = new FormData(editPostForm);
                id = $('#postNameInput').attr('data-postID');
                data.append('id', id);
                fetch('functions.php?action=updatePost', {
                    method: "POST",
                    body: data
                }).then(() => {
                    editPostForm.reset();
                    editPostModal.hide();

                }).then(() => {
                    location.reload();
                })
            }


            $('#addImageForm').submit((e) => {
                e.preventDefault();
                formData = new FormData(document.querySelector('#addImageForm'));
                fetch('functions.php?action=addpicture', {
                    method: "POST",
                    body: formData
                }).then((resp) => {
                    return data = resp.json();
                }).then((data) => {
                    if (data.status == 'success') {
                        $('body').prepend(
                            `<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Bilde pievienota!!!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                        );
                    }
                    $('#addImageForm')[0].reset();
                }).then(() => {
                    setTimeout(() => {
                        $('.alert-warning').fadeOut();
                    }, 2000)
                })
            })




            // Izvadam bildes no db
            // .image_gallery
            // functions.php?action="showimages"


            $.getJSON('functions.php?action=showImages',(data)=>{
                data.forEach((item)=>{
                    $('.image_gallery').append(`
                        <div class="image d-flex justify-content-center flex-column gap-1">
                            <img class="img-thumbnail d-block" style="width:150px;height:150px;" src="${item.url}">     
                            <button class="btn btn-danger delPictureBtn" data-id="${item.id}">Dzēst</button>
                        </div>
                    
                    `);
                })

            }).then(()=>{
                $('.delPictureBtn').on("click",(e)=>{
                    if(confirm("Tiešām izdzēst?")){
                        id = e.target.dataset.id;
                        $.getJSON('functions.php?action=delImageByID&id='+id,(data)=>{
                            if(data.success==true){

                                localStorage.setItem("page_reload",true);
                                window.location.reload(true);

                                if(localStorage.getItem("page_reload")==true){
                                        $('#profile-tab').trigger("click");
                                        localStorage.removeItemItem("page_reload");
                                }
                                
                            }
                        })
                  }

                })
        
            })

        });






    </script>
</body>

</html>