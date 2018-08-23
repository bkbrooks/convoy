<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Convoy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,700,700i" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/6.0.0/normalize.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>

  <link rel="stylesheet" href="styles/css/loader.css">
  <link rel="stylesheet" href="styles/css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

  <link rel="icon" type="image/png" href="../../dist/images/favicon.png">
</head>
<body>
  <p>This is a test</p>

  <?php echo '<p>'.__DIR__.'</p>' ?>

  <?php
  $dirs = array_filter(glob('images/backgrounds' . '/*' , GLOB_ONLYDIR));
  $images = [];
  echo 'filenames';
  foreach ($dirs as $folderpath) {
    $category = end(explode('/',$folderpath));
    foreach (glob($folderpath.'/*.jpg') as $image) {
      $slide = new stdClass();
      $slide->category = $category;
      $slide->imagepath = $image;
      echo basename($image).'<br/>';
    }
  }
  ?>

  <script src="scripts/script.js"></script>
</body>
</html>
