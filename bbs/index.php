<?php 

session_start();

ini_set('display_erros', 1);
define('MAX_FILE_SIZE', 1 + 1024 * 1024); // 1MB
define('THUMBNAIL_WIDTH', 400);
define('IMAGES_DIR', __DIR__ . '/images');
define('THUMBNAIL_DIR', __DIR__ . '/thumbs');

if (!function_exists('imagecreatetruecolor')) {
    echo 'GD not installed!';
    exit;
}

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

require 'ImageUploader.php';

$Uploader = new \MyApp\ImageUploader();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Uploader->upload();
}

list($success, $error) = $Uploader->getResults();

$images = $Uploader->getImages();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Image Uploader</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="btn">
Upload!
<form action="" method="post" enctype="multipart/form-data" id="my_form">
    <input type="hidden" name="MAX_FILE_SIZE" value="">
    <input type="file" name="image" id="my_file">
</form>
</div>

<?php if (isset($success)) : ?>
    <div class="msg success"><?php echo h($success); ?></div>
<?php endif; ?>
<?php if (isset($error)): ?>
    <div class="msg error"><?php echo h($error); ?></div>
<?php endif; ?>

<ul>
<?php foreach ($images as $image) : ?>
    <li>
        <a href="<?php echo h(basename(IMAGES_DIR)) . '/' . basename($image); ?>">
            <img src="<?php echo h($image); ?>">
        </a>
    </li>
<?php endforeach; ?>
</ul>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script src="js/main.js"></script>
</body>
</html>
