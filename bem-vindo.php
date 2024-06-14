<?php

$imagemjumbo = '/imagens/sistemsisdam.jpg';

?>

<style>
    #jumbo {
        background-image: url("imagens/index/img_login_menu.jpg");
        background-size: cover;
        text-shadow: 0.1em 0.1em 0.1em #8e0615;
    }
    .bd-placeholder-img {
        font-size: 1rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .display-4 {
        font-size: 2.5rem;
    }
    @media (min-width: 768px) {
        .display-4 {
            font-size: 3rem;
        }
    }

    .card-img-right {
        height: 100%;
        border-radius: 0 3px 3px 0;
    }

    .flex-auto {
        flex: 0 0 auto;
    }

    .h-250 { height: 250px; }
    @media (min-width: 768px) {
        .h-md-250 { height: 250px; }
    }

    /* Pagination */
    .blog-pagination {
        margin-bottom: 4rem;
    }
    .blog-pagination > .btn {
        border-radius: 2rem;
    }

    /*
     * Blog posts
     */
    .blog-post {
        margin-bottom: 4rem;
    }
    .blog-post-title {
        margin-bottom: .25rem;
        font-size: 2.5rem;
    }
    .blog-post-meta {
        margin-bottom: 1.25rem;
        color: #727272;
    }
</style>

    <div class="p-4 p-md-5 mb-4 mt-5 text-white rounded bg-success" id="jumbo">
        <div class="col-md-12 px-0">
            <h1 class="display-4 fst-italic justify-content-center fw-bold">Bem Vindo !!!</h1>
            <p class="lead my-3 fw-bold">Somos gratos a Deus por tudo, o sistema de controle tem por finalidade controlar o acesso interno dos
                colaboradores da <strong>RGE 2021</strong> na <strong>Congregração Cristã no Brasil - Administração Jaçanã</strong>.</p>
        </div>
    </div>

    <div class="row g-5">
        <div class="col-md-8">

            <article class="blog-post">
                <h2 class="blog-post-title fs-3">Funcionalidades</h2>
                <p class="blog-post-meta">10 de Julho de 2021 por <a target="_blank" href="https://github.com/rodsengcomp">Rodolfo R. R. de Jesus</a></p>

                <p class="fs-6">As funcionalidades iniciais do sistema buscam manter a organização entre os colaboradores internos durante o evento,
                    para isso o sistema dispõe de páginas de cadastro, edição, lista, lixeira, impressão e validação.</p>
                <h2 class="blog-post-title fs-3">Lista de Telas</h2>
                <p class="fs-6">Para facilitar o acesso seguem os links das principais telas do sistema:</p>
                <ul>
                    <li><a class="btn btn-outline-success btn-sm mb-2 pe-3 fs-6" type="button" href="<?php echo 'menu-principal?pag=cadastro_usuarios&year='.$year;?>"><i class="fa fa-user me-2 ms-2"></i>Cadastro de usuários</a></li>
                    <li><a class="btn btn-outline-primary btn-sm mb-2 pe-3 fs-6" type="button" href="<?php echo 'menu-principal?pag=lista_usuarios&year='.$year;?>"><i class="fa fa-list me-2 ms-2"></i> Lista de usuários </a></li>
                    <li><a class="btn btn-outline-secondary btn-sm mb-2 pe-3 fs-6" type="button" href="<?php echo 'menu-principal?pag=lista_usuarios&year='.$year.'&lixeira=1';?>"><i class="fa fa-trash me-2 ms-2"></i> Lixeira de usuários </a></li>
                </ul>
                <p class="fs-6">Lembre-se do passo a passo para cadastro:</p>
                <ol>
                    <li class="fs-6">Cadastrar o colaborador</li>
                    <li class="fs-6">Imprimir o crachá do colaborador</li>
                    <li class="fs-6">Verificar se o QRCODE está validado no sistema.</li>
                </ol>
            </article>

        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="fst-italic">Sobre o Sistema</h4>
                    <p class="mb-0 fs-6">Este é um Sistema criado e mantido por desenvolvedores independentes que professam a mesma fé e doutrina apregoada na Congregação Cristã no Brasil.
                        Ele em nada se vincula ao nome e/ou Ministério/Fiéis da Congregação Cristã do Brasil, o desenvolvimento inclui muitas horas de
                        esforço e dedidação buscando um aperfeiçoamento no serviço. Use-o como um ponto de partida para a criação de sistemas cada vez melhores
                        para pessoas que trabalham diariamente com o compromiso de agilizar e melhorar o serviço com qualidade e dedicação.</p>
                    <p class="fst-italic mt-2 fs-6 fw-bold">Rodolfo R. R. de Jesus</p>
                </div>

                <div class="p-4">
                    <h5 class="fst-italic">Código Fonte</h5>
                    <ol class="list-unstyled">
                        <li><a class="btn btn-outline-dark btn-sm fs-6" type="button" target="_blank" href="https://github.com/rodsengcomp/jacana-control"><i class="fa fa-github me-1 ms-1"></i> Jaçanã Controle - GitHub</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>