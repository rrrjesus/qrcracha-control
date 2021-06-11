<?php

$imagemjumbo = '/imagens/sistemsisdam.jpg';

?>

<style type="text/css">
    .bemv {
        background: #000 url(.<?php echo $imagemjumbo ?>) no-repeat center center;
        color: white;
        text-shadow: black 0 3px 3px;
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
            <h4>Este é um Sistema desenvolvido por colaboradores da Suvis Jaçanã-Tremembé. Ele inclui muitas horas de
                esforço e dedidação buscando um aperfeiçoamento no serviço. Use-o como um ponto de partida para a
                criação de sistemas cada vez melhores para pessoas que trabalham diariamente com o compromiso de
                agilizar e melhorar o serviço publico com qualidade e dedicação.</h4>
    </div>
</div>

<div class="container marketing">

   <!-- START THE FEATURETTES -->
    <!-- Three columns of text below the carousel -->
    <div class="row mt-5">
        <div class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" src="<?php if (file_exists('painel/imagens/'.$usuariologin.'/fotologin/'.$usuariofoto))
            {echo 'painel/imagens/'.$usuariologin.'/fotologin/'.$usuariofoto;}
            else{ echo 'painel/imagens/foto_exists.png';}?>">

            <h2>Área de Perfil</h2>
            <p>Acesse sua <a class="fw-bold" href="menu-principal.php?pag=edit-perfil-user">Área de Perfil</a>  para acessar configurações como: dados cadastrais, alteração de senha, informações e personalização.</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" src="imagens/site.jpg">

            <h2>Site SisdamWebNew</h2>
            <p>Acesse nosso site <a class="fw-bold" href="/../sisdamwebsite/">SisdamWebNew</a> e acompanhe as novidades !!!, lá você encontra diversos tutoriais sobre funções e funcionamento de todo o sistema <strong>SisdamWebNew</strong> .</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="bd-placeholder-img rounded-circle" width="140" height="140" role="img" src="imagens/site.jpg">

            <h2>Heading</h2>
            <p>And lastly this, the third column of representative placeholder content.</p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <!-- Example row of columns -->
        <div class="row mt-5">
            <div class="col-lg-4">
            <h2>Inovação</h2>
            <p>A cada dia nos aprimoramos na criação de um sistema rápido e integrado para facilitar nosso
                trabalho.Sempre inovando com ferramentas gratuitas de qualidade e facil acesso, em busca do melhor
                "Suvis Jaçanã-Tremembé".</p>
            </div>
            <div class="col-lg-4">
                <h2>Compromisso</h2>
                <p>É importante o empenho na busca por ferramentas que cada vez venham a atender melhor a demanda de
                    serviço.Buscamos tecnologias capazes de superar até mesmo nossas expectaivas.</p>
            </div>
            <div class="col-lg-4">
                <h2>Qualidade</h2>
                <p>Sempre pensando em qualidade no serviço prestado e excelência nos sistemas criados.Uma equipe de trabalho
                    que não se cansa de buscar a melhoria no processamento e armazenamento de dados.</p></br>
            </div>
        </div>
    </div>