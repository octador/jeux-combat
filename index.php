<?php

require_once('./Config/autoload.php');
require_once('./Config/db.php');
// nom tampon chemin nom final
$newHeros = new HeroesManager($db);

if (isset($_POST) && !empty($_POST)) {

    $uploads_dir = './img';
    $tmp_name = $_FILES["image"]["tmp_name"];
    $nameImage = basename($_FILES["image"]["name"]);
    move_uploaded_file($tmp_name, "$uploads_dir/$nameImage");
    //    var_dump($newImage );
    $newPerso = $_POST['name'];


    $hero = new Hero([
        'image' => $nameImage,
        'heros' => $newPerso
    ]);

    $newHeros->checkHeros($hero);
}
$results = $newHeros->findAllAlive();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeux de combat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./Style/Style.css">
</head>

<body class="backgroundbody">

    <section class="main-section">

        <div class="form-div">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="name"> Nomme ton héro : </label>
                    <input class="name-input" type="text" name="name" required>
                </div>
                <div>
                    <label class="label-file" for="file">Sélectionnez une image :</label>
                    <input class="input-file" accept="image/*" type="file" name="image" id="image" required onchange="previewImage(event)">
                    <div id="imagePreview"></div>
                </div>
                <div>
                    <input class="submit-input" type="submit" name="submit" value="GO">
                </div>
            </form>
        </div>




        <div class="d-flex flex-wrap container justify-content-center gap-3">

            <?php
            foreach ($results as $result) { ?>
                <form action="./fight.php" method="post">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/<?php echo $result->getImage() ?>" class="card-img-top" alt="icon joueur">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $result->getname() ?></h3>
                            <h4><?php echo $result->getlifepoints() . "Points" ?></h4>

                            <input type="hidden" value="<?php echo $result->getId() ?>" name='id'>
                            <button type="submit" class="btn btn-primary">COMBATRE
                            </button>

                        </div>
                    </div>

                </form>
            <?php }
            ?>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Image Preview">`;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.innerHTML = '';
            }
        }
    </script>
</body>

</html>