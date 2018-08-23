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
<body style="background: #000;">
  <div class="spinner"><div class="loader"></div></div>
  <div class="main" style="display: none;">
    <nav class="convoy-logo">
      <img src="images/convoy_logo.png" alt="convoy logo" />
    </nav>

    <nav class="instagram">
      <a href="https://www.instagram.com/rideconvoy/">
        <img src="images/instagram_logo.png" alt="instagram logo"/>
      </a>
    </nav>

    <div class="main-carousel">
      <?php
        $dirs = array_filter(glob('images/backgrounds' . '/*' , GLOB_ONLYDIR));
        $images = [];
        foreach ($dirs as $folderpath) {
          $category = end(explode('/',$folderpath));
          foreach (glob($folderpath.'/*.jpg') as $image) {
            $slide = new stdClass();
            $slide->category = $category;
            $slide->imagepath = $image;
            array_push($images, $slide);
          }
        }

        $photoMap = [];
        if (($handle = fopen("convoy_photo_credits.csv", "r")) !== FALSE) {
          while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $photoMap[$data[0]] = array("source"=>$data[1], "website"=>$data[2]);
          }
          fclose($handle);
        }

        shuffle($images);
        foreach ($images as $i) {
          $filename = basename($i->imagepath);
          $source = $photoMap[$filename];
          $sourcehtml = '';
          if ($source && $source["source"]) {
            if ($source["website"]) {
              $sourcehtml = '<span class="source">Source: <a href="'.$source["website"].'">'.$source["source"].'</a></span>';
            } else {
              $sourcehtml = '<span class="source">Source: '.$source["source"].'</span>';
            }
          }

          echo '<div class="landscape">
            <img data-lazy="'.$i->imagepath.'"/>
            <div class="callout">
              <div class="headline">
                <h1>Embrace</h1>
                <h2>'.$i->category.'</h2>
                <a href="https://www.instagram.com/explore/tags/rideconvoy/" class="hashtag">#rideconvoy</a>
                '.$sourcehtml.'
              </div>
            </div>
          </div>';
        }
      ?>
      <?php
        $dirs = array_filter(glob('images/backgrounds-portrait' . '/*' , GLOB_ONLYDIR));
        $images = [];
        foreach ($dirs as $folderpath) {
          $category = end(explode('/',$folderpath));
          foreach (glob($folderpath.'/*.jpg') as $image) {
            $slide = new stdClass();
            $slide->category = $category;
            $slide->imagepath = $image;
            array_push($images, $slide);
          }
        }
        shuffle($images);
        foreach ($images as $i) {
          echo '<div class="portrait">
            <img data-lazy="'.$i->imagepath.'"/>
            <div class="callout">
              <div class="headline">
                <h1>Embrace</h1>
                <h2>'.$i->category.'</h2>
                <a href="https://www.instagram.com/explore/tags/rideconvoy/" class="hashtag">#rideconvoy</a>
                <span class="source">Source: <a href="http://casteprojects.com/">Caleb Byers</a></span>
              </div>
            </div>
          </div>';
        }
      ?>
    </div>
  </div>

  <script src="scripts/script.js"></script>
</body>
</html>
