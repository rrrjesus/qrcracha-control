<?php
    $conexao = conexao::getInstance();

    $id_color = isset($usuarionav) ? $usuarionav : 1;

    $sql = 'SELECT id, navcolor, navtext, footercolor, footertext, stylenavbar FROM navfootercolor WHERE id = :id';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':id', $id_color);
    $stm->execute();
    $navfoofetch = $stm->fetch(PDO::FETCH_OBJ);

?>

<div class="d-flex flex-column flex-md-row align-items-center pb-3 border-bottom">
    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <img class="img-fluid rounded-circle me-2" height="70" width="70" src="imagens/inf_menu.png">
        <span class="fs-4">JAÇANA CONTROLE</span>
    </a>

    <nav class="d-inline-flex ms-md-auto">
        <a class="me-3 py-2 text-decoration-none fw-bold fs-6" href="<?=$pag_system?>" id="getting-started" style="color: #45ee0d; <?php if (session_status() !== PHP_SESSION_ACTIVE) {
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
        <a class="me-3 py-2 text-dark text-decoration-none fw-bold fs-6" href="<?=$pag_system.'?pag=cadastro_usuarios&session='.$hashprimary?>">Cadastro</a>
        <a class="me-3 py-2 text-dark text-decoration-none fw-bold fs-6" href="<?=$pag_system.'?pag=lista_usuarios&session='.$hashprimary?>">Lista</a>
        <?php if (isset($_SESSION['usuarioId'])): ?>
        <img class="img-profile rounded-circle" height="38" width="38" src="<?php if (file_exists($usuariofoto))
        {echo $usuariofoto;}
        else{ echo 'sistema/imagens/padrao.jpg';}?>">
        <a class="me-3 py-2 text-dark text-decoration-none fw-bold fs-6" href="<?=$pag_system.'?pag=edicao_perfil&id='.$usuarioid.'&session='.$hashprimary?>">Perfil</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger btn-sm fw-bold" data-toggle="modal" data-target="#sairModal"><i class="far fa-reply-all me-1" data-toggle="tooltip" title="SAIR DO SISTEMA"></i> SAIR</button>
        <?php
        else:
            echo '';
        endif;
        ?>
    </nav>
</div>

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


