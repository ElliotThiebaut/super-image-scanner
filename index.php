 <? session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Image Scanner</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.2/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="asset/css/style.css">

    <script src="https://unpkg.com/ml5@0.4.3/dist/ml5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.2/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.3.2/dist/js/uikit-icons.min.js"></script>
    <script src="asset/js/sketch.js"></script>
</head>

<body class="main uk-container uk-container-large">
    <div>
        <h1 class="title uk-text-center uk-text-bold uk-text-danger uk-margin-medium-top">Super Image Scanner</h1>
    </div>
    <div class="uk-flex uk-flex-column uk-margin-medium-top">
        <div class="image uk-align-center uk-box-shadow-large uk-border-rounded">
            <?php 
                if (isset($_FILES['upload_image'])) {
                    $extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    $path = 'uploads/';

                    $file_name = $_FILES['upload_image']['name'];
                    $file_tmp = $_FILES['upload_image']['tmp_name'];
                    $file_type = $_FILES['upload_image']['type'];
                    $file_ext = pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION);

                    $file = $path . $file_name;

                    if (!in_array($file_ext, $extensions)) {
                        header('Location: index.php?e=ext');
                        exit;
                    }

                    move_uploaded_file($file_tmp, $file);
                    echo '<img src="'.$file.'" id="image" class="uk-padding-small uk-padding-remove-bottom" uk-img>';
                    // echo '<div id="spinner"></div>';
                    echo '<script>runAnalyser();</script>';
                } else {
                   echo '
                    <form class="uk-margin-medium-top" action="index.php" method="post" id="upload_form" enctype="multipart/form-data">
                        <input type="file" name="upload_image">
                        <input type="submit" value="Upload image" name="submit">
                    </form>';
                }
            ?>
            
            
            <h2 id="result" class="uk-text-center uk-text-bold"></h2>
            <p class="uk-text-light uk-text-center" id="probs">Probability <span id="probability"></span></p>
            <a href="index.php" class="uk-button-danger uk-align-center uk-text-center uk-margin-remove-bottom">Go back</a>
            <script>probs.style.display = "none";</script>
        </div>
    </div>
    <div>

    </div>
</body>

</html>