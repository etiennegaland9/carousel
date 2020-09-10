<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>carousel</title>
    <link rel="stylesheet" type="text/css" href="./Css/Im_Ui.css?refresh=<?php echo rand(2, 200) ?>" >
    <link rel="stylesheet" href="./carousel_fondu.css" />
  </head>
  <body>
    
      <div class="carousel" data-interval="5000">
        <div class="slides">
          <div class="active">
            <img src="./img01.jpg" alt="01" />
          </div>
          <div>
            <img src="./img02.jpg" alt="02" />
          </div>
          <div>
            <img src="./img03.jpg" alt="03" />
          </div>
          <div>
            <img src="./img04.jpg" alt="04" />
          </div>
          <div>
            <img src="./img05.jpg" alt="05" />
          </div>
        </div>
        <div class="arrow left">◀</div>
        <div class="arrow right">▶</div>
        <div class="indicators"></div>
      </div>
      
    <script type="text/javascript" src="./main.js"></script>
  </body>
</html>

