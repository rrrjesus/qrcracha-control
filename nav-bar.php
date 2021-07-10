<?php
    $conexao = conexao::getInstance();

    $id_color = isset($usuarionav) ? $usuarionav : 1;

    $sql = 'SELECT id, navcolor, navtext, footercolor, footertext, stylenavbar FROM navfootercolor WHERE id = :id';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id', $id_color);
    $stm->execute();
    $navfoofetch = $stm->fetch(PDO::FETCH_OBJ);

?>


<nav class="navbar navbar-dark bg-success navbar-expand-sm fixed-top">
    <a class="navbar-brand ms-3" href="<?=PAGSYSTEM?>" data-toggle="tooltip" data-placement="right" title="JAÇANÃ CONTROLE"><img
                src="imagens/icons/favicon_jaca_control.ico" alt="Jaçanã Controle"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarjacontrol" aria-controls="navbarjacontrol" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <li class="collapse navbar-collapse" id="navbarjacontrol">
        <?php

        $sql_mpr = 'SELECT * FROM  menu_principal ORDER BY nome ASC';
        $stm_mpr = $conexao->prepare($sql_mpr);
        $stm_mpr->execute();
        $mprfetch = $stm_mpr->fetchAll(PDO::FETCH_OBJ);

        if ($stm_mpr->rowCount() >= 1):
            echo '<ul class="nav navbar-nav mr-auto">';
            foreach ($mprfetch as $mprfetchs):
                $id = $mprfetchs->id;
                /* Level one dropdown */
                echo '<li class="nav-item dropdown">';
                echo '<a href="'.PAGSYSTEM.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle fs-5"><i class="fal fa-'.$mprfetchs->icon.' me-1"></i>' . $mprfetchs->nome . '</a>';

                $sql_sub = 'SELECT * FROM menu_sub WHERE id_menu=? ORDER BY nome';
                $stm_sub = $conexao->prepare($sql_sub);
                $stm_sub->execute(array($id));
                $subfetch = $stm_sub->fetchAll(PDO::FETCH_OBJ);

                 if ($stm_sub->rowCount() >= 1):
                     echo '<ul class="dropdown-menu">';
                     foreach ($subfetch as $subfetchs):
                         $idsub = $subfetchs->id;

                         /* Level two dropdown */
                         echo '<li>';
                         echo '<a href="'.$subfetchs->pag.'&session='.$hashprimary.'" class="dropdown-item fs-5"><i class="fal fa-'.$subfetchs->icon.' me-2"></i>' . $subfetchs->nome . '</a>';

                     endforeach;
                     echo '</ul>';
                 endif;
                echo '</li>';
                /* End Level one */
            endforeach;
            ?>
        <li class="nav-item">
            <a role="button" href="<?=$pag_system?>" id="getting-started" class="nav-link active me-3 ms-3 disabled fw-bold fs-5" style="color: #68f112; <?php if (session_status() !== PHP_SESSION_ACTIVE) {
                echo 'display: none;';
            } ?>" ></a>
            <script type="text/javascript">
                var fiveSeconds = new Date().getTime() + 2400000;
                $('#getting-started').countdown(fiveSeconds, function (event) {
                    var atualdata = new Date().getTime();
                    if (atualdata < fiveSeconds) {
                        $(this).html(event.strftime('%H:%M:%S'));
                    } else {
                        window.location.href = '././index.php';
                    }
                });
            </script>
        </li>
        <?php
            echo '</ul>';
        endif;
        ?>

        <ul class="nav navbar-nav mr-auto" style="<?php if (!isset($_SESSION['usuarioId'])) {
            echo 'display: none;';
        } ?>">

            <!-- Tema escuro em desenvolvimento -->
            <!-- <li class="nav-item dropdown px-3"><label class="theme-switch" for="checkbox"><input type="checkbox" id="checkbox" /><div class="slider round"></div></label>
            </li> -->

            <li class="nav-item me-2 mb-1">
                    <img class="img-profile rounded-circle" height="38" width="38" src="<?php if (file_exists('sistema/imagens/'.$usuariocpf.'/fotologin/'.$usuariofoto))
                    {echo 'sistema/imagens/'.$usuariocpf.'/fotologin/'.$usuariofoto;}
                    else{ echo 'imagens/padrao.jpg';}?>">
            </li>

            <li class="nav-item dropdown mb-1">
                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary btn-sm fw-bold nav-link dropdown-toggle me-2 ms-2 fs-6" style="color:#fff;"><i class="far fa-lock-open-alt me-1"></i> <?=$usuarionome?></a>
                    <ul class="dropdown-menu border-0 shadow">
                        <li>
                            <a class="dropdown-item fs-5" href="<?=$pag_system.'?pag=edicao_perfil&cpf='.$usuariocpf.'&session='.$hashprimary?>"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                    </ul>
            </li>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm fw-bold pt-2 pb-2 ms-2 me-2 fs-6" data-toggle="modal" data-target="#sairModal"><i class="far fa-reply-all me-1" data-toggle="tooltip" title="SAIR DO SISTEMA"></i> SAIR</button>
        </ul>

</nav>

<!-- Modal Sair-->
<div class="modal fade" id="sairModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deseja Sair do Sistema ? </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="text-center">
                        <a href='sair.php' role="button" class="btn btn-success">SIM</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                    </div>
            </div>
        </div>
    </div>
</div>


