<aside class="bd-sidebar">
    <nav class="collapse bd-links" id="bd-docs-nav" aria-label="Docs navigation"><ul class="list-unstyled mb-0 py-3 pt-md-1">
            <li>
                <a href="index.php" class="d-inline-flex align-items-center rounded text-dark">
                    <i class="fa fa-home ms-2 me-2" width="16" height="16"></i>Início</a>
            </li>
            <li class="my-3 mx-4 border-top"></li>
            <li class="mb-1">
                <button class="btn d-inline-flex align-items-center rounded text-dark" data-bs-toggle="collapse" data-bs-target="#collapse-users" aria-expanded="false" aria-current="true">
                    <i class="fa fa-user-circle ms-2 me-2" width="16" height="16"></i>Usuários
                </button>

                <div class="collapse" id="collapse-users">
                    <ul class="list-unstyled fw-normal pb-1 small">
                        <li><a href="index.php?pag=cad-user" class="d-inline-flex align-items-center rounded text-dark"><i class="fa fa-user-circle ms-3 me-2" width="16" height="16"></i>Cadastro de Usuários</a></li>
                        <li><a href="index.php?pag=list-user" class="d-inline-flex align-items-center rounded text-dark"><i class="fa fa-user-circle ms-3 me-2" width="16" height="16"></i>Lista de Usuários</a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn d-inline-flex align-items-center rounded text-dark" data-bs-toggle="collapse" data-bs-target="#collapse-pags" aria-expanded="false" aria-current="true">
                    <i class="fa fa-globe-americas ms-2 me-2" width="16" height="16"></i>Páginas
                </button>

                <div class="collapse" id="collapse-pags">
                    <ul class="list-unstyled fw-normal pb-1 small">
                        <li><a href="index.php?pag=list-pag-admin" class="d-inline-flex align-items-center rounded text-dark"><i class="fa fa-list ms-3 me-2" width="16" height="16"></i>Lista do Painel</a></li>
                        <li><a href="index.php?pag=list-pag-system" class="d-inline-flex align-items-center rounded text-dark"><i class="fa fa-list ms-3 me-2" width="16" height="16"></i>Lista do Sistema</a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn d-inline-flex align-items-center rounded text-dark" data-bs-toggle="collapse" data-bs-target="#collapse-menu" aria-expanded="false" aria-current="true">
                    <i class="fa fa-navicon ms-2 me-2" width="16" height="16"></i>Menus
                </button>

                <div class="collapse" id="collapse-menu">
                    <ul class="list-unstyled fw-normal pb-1 small">
                        <li><a href="<?=$pag_painel.'?pag=list-menu&menu=principal&year='.$year?>" class="d-inline-flex align-items-center rounded text-dark"><i class="fa fa-navicon ms-3 me-2" width="16" height="16"></i>Principal</a></li>
                        <li><a href="<?=$pag_painel.'?pag=list-menu&menu=submenu&year='.$year?>" class="d-inline-flex align-items-center rounded text-dark"><i class="fa fa-navicon ms-3 me-2" width="16" height="16"></i>Sub Menu</a></li>
                        <li><a href="<?=$pag_painel.'?pag=list-menu&menu=subsubmenu&year='.$year?>" class="d-inline-flex align-items-center rounded text-dark"><i class="fa fa-navicon ms-3 me-2" width="16" height="16"></i>Sub Sub Menu</a></li>
                    </ul>
                </div>
            </li>

            <li class="mb-1">
                <button class="btn d-inline-flex align-items-center rounded collapsed text-dark" data-bs-toggle="collapse" data-bs-target="#collapse-config" aria-expanded="false" aria-current="true">
                    <i class="fa fa-cogs ms-2 me-2" width="16" height="16"></i>Configurações
                </button>

                <div class="collapse" id="collapse-config">
                    <ul class="list-unstyled fw-normal pb-1 small">
                        <li><a href="index.php" class="d-inline-flex align-items-center rounded text-dark"><i class="fa fa-cogs ms-3 me-2" width="16" height="16"></i>Painel</a></li>
                        <li><a href="index.php" class="d-inline-flex align-items-center rounded text-dark"><i class="fa fa-cogs ms-3 me-2" width="16" height="16"></i>Sistema</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

</aside>