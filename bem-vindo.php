<?php

$imagemjumbo = '/imagens/sistemsisdam.jpg';

?>

<style type="text/css">
    .bemv {
        background: #000 url(.<?php echo $imagemjumbo ?>) no-repeat center center;
        color: white;
        text-shadow: #00cc00 0 3px 3px;
        background-size: cover;
        padding-left: 0;
        padding-right: 0;
    }
</style>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container-fluid">

    <div class="bemv p-5 mb-4 mt-4 rounded-3">
            <div class="fw-bold fs-3 text-center">Olá, <?php if(isset($_SESSION['usuarioId'])){echo $usuarionome;}else{echo 'Visitante';} ?> !!!</div>
            <h4>Este é um Sistema criado e mantido por desenvolvedores independentes que professam a mesma fé e doutrina apregoada na Congregação Cristã no Brasil.
                Ele em nada se vincula ao nome e/ou Ministério/Fiéis da Congregação Cristã do Brasil, o desenvolvimento inclui muitas horas de
                esforço e dedidação buscando um aperfeiçoamento no serviço. Use-o como um ponto de partida para a criação de sistemas cada vez melhores
                para pessoas que trabalham diariamente com o compromiso de agilizar e melhorar o serviço com qualidade e dedicação.</h4>
    </div>
</div>

<div class="container marketing">

   <!-- START THE FEATURETTES -->
    <!-- Three columns of text below the carousel -->
    <div class="row mt-5">
        <div class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" src="<?php if (file_exists('sistema/imagens/'.$usuariologin.'/fotologin/'.$usuariofoto))
            {echo 'sistema/imagens/'.$usuariologin.'/fotologin/'.$usuariofoto;}
            else{ echo 'sistema/imagens/foto_exists.png';}?>">

            <h2>Área de Perfil</h2>
            <p>Acesse sua <a class="fw-bold" href="menu-principal.php?pag=edit-perfil-user">Área de Perfil</a>  para acessar configurações como: dados cadastrais, alteração de senha, informações e personalização.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" src="sistema/imagens/foto_exists.png">

            <h2>Site Jaçanã Controle</h2>
            <p>Acesse em breve nosso site <a class="fw-bold" href="/../jacana-control/">Jaçanã Controle</a> e acompanhe as novidades !!!, lá você encontra diversos tutoriais sobre funções e funcionamento de todo o sistema <strong>Jaçanã Controle</strong> .</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" src="sistema/imagens/foto_exists.png">

            <h2>Muito Mais !!!</h2>
            <p>Esperem por mais novidades no sistema. É apenas o começo, ainda muito há por vir, e que a <strong>A Paz de Deus
                </strong> e a <strong>Graça do Senhor Jesus Cristo</strong> possam encontrar lugar em vossos corações !!!</p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
    </div>