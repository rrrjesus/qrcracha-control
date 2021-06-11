<?php

$sqlalb = 'SELECT id_alb, ativo, card_img_top, card_title, card_text, href_button, criado, data_criado, alterado, data_alterado FROM albuns WHERE ativo = 1 ORDER BY data_criado ASC LIMIT 6';
$smtalb = $conexao->prepare($sqlalb);
$smtalb->execute();
$albfetch = $smtalb->fetchAll(PDO::FETCH_OBJ);

if ($smtalb->rowCount() >= 1):
echo '<div class="album py-5 bg-light">';
    echo '<div class="container">';
        echo '<div class="row">';

        foreach($albfetch as $albfetchs):
            $id = $albfetchs->id_alb;

            /* mostrando os cards */
            echo '<div class="col-md-4">';
                echo '<div class="card mb-4 box-shadow">';
                    echo '<img class="card-img-top" src="'.$albfetchs->card_img_top.'" alt="Card image cap">';
                        echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$albfetchs->card_title.'</h5>';
                            echo '<p class="card-text">'.$albfetchs->card_text.'</p>';
                                echo '<div class="d-flex justify-content-between align-items-center">';
                                    echo '<div class="btn-group">';
                                        echo '<a href="'.$albfetchs->href_button.'" class="btn btn-sm btn-outline-secondary">Saiba Mais</a>';
                                    echo '</div>';
                                    $date = new DateTime($albfetchs->data_criado);
                                    echo '<small class="text-muted">Criado por: '.$albfetchs->criado.' em: '.$date->format('d/m/Y').'</small>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
            endforeach;
        echo '</div>';
    echo '</div>';
echo '</div>';
endif;
?>