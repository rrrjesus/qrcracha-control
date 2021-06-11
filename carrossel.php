
<?php

$sqlcar = 'SELECT id_carrossel, ativo, img_carrossel_1, campanha, title_carrossel_1, color_title_1, paragrafo_carrossel_1,
color_paragrafo_1, href_button_1, color_button_1, img_carrossel_2, title_carrossel_2, color_title_2, 
paragrafo_carrossel_2, color_paragrafo_2, href_button_2, color_button_2, img_carrossel_3, title_carrossel_3, 
color_title_3, paragrafo_carrossel_3, color_paragrafo_3, href_button_3, color_button_3, data_criado  FROM carrossel
WHERE ativo = 1 ORDER BY data_criado ASC LIMIT 1';
$stmcar = $conexao->prepare($sqlcar);
$stmcar->execute();
$carfetch = $stmcar->fetch(PDO::FETCH_OBJ);

?>

<div id="myCarousel" style="text-shadow: black 0 3px 3px;"  class="carousel slide text-uppercase" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="<?=$carfetch->img_carrossel_1?>" alt="First slide">
            <div class="container">
              <div class="carousel-caption">
                <h1 class="<?=$carfetch->color_title_1.'">'.$carfetch->title_carrossel_1?></h1>
                <p class="<?=$carfetch->color_paragrafo_1.'">'.$carfetch->paragrafo_carrossel_1?></p>
                <p><a class="btn btn-lg <?=$carfetch->color_button_1?>" href="<?$carfetch->href_button_1?>" title="Saiba Mais" data-toggle="tooltip" role="button">Saiba Mais</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="<?=$carfetch->img_carrossel_2?>" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1 class="<?=$carfetch->color_title_2.'">'.$carfetch->title_carrossel_2?></h1>
                <p class="<?=$carfetch->color_paragrafo_2.'">'.$carfetch->paragrafo_carrossel_2?></p>
                    <p><a class="btn btn-lg <?=$carfetch->color_button_2.'" href="'.$carfetch->href_button_2?>" title="Saiba Mais" data-toggle="tooltip" role="button">Saiba Mais</a></p>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="<?=$carfetch->img_carrossel_3?>" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1 class="<?=$carfetch->color_title_3.'">'.$carfetch->title_carrossel_3?></h1>
                <p class="<?=$carfetch->color_paragrafo_3.'">'.$carfetch->paragrafo_carrossel_3?></p>
                    <p><a class="btn btn-lg <?=$carfetch->color_button_3.'" href="'.$carfetch->href_button_3?>" title="Saiba Mais" data-toggle="tooltip" role="button">Saiba Mais</a></p>
                </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>