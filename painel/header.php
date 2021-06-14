<?php
require(__DIR__ . './modal/modaluser.php');
?>

<header class="py-3 mb-3 border-bottom">
    <div class="container-fluid d-grid gap-3 align-items-center">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="<?='../'.$pag_system?>" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 text-decoration-none text-dark">
                <img src="imagens/foto_exists.png" alt="mdo"  width="40" height="32" class="bi ms-2 me-2"><strong>SISDAMWEB-2</strong>
            </a>
            <ul class="nav nav-pills col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item"><a href="index.php" class="nav-link px-2 active"><i class="fa fa-home me-2" width="16" height="16"></i>Início</a></li>
                <li class="nav-item"><a href="index.php?pag=cad-user" class="nav-link px-2"><i class="fa fa-user-circle me-2" width="16" height="16"></i>Usuários</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2"><i class="fa fa-globe-americas me-2" width="16" height="16"></i>Páginas</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2"><i class="fa fa-navicon me-2" width="16" height="16"></i>Menus</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2"><i class="fa fa-sign-out-alt me-2" width="16" height="16"></i>Sair</a></li>
            </ul>

            <div class="text-end ms-3">
                <div class="flex-shrink-0 dropdown">
                    <a href="<?php if (file_exists('imagens/'.$usuariologin.'/fotologin/'.$usuariofoto))
                    {echo 'imagens/'.$usuariologin.'/fotologin/'.$usuariofoto;}
                    else{ echo 'imagens/foto_exists.png';}?>" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php if (file_exists('imagens/'.$usuariologin.'/fotologin/'.$usuariofoto))
                        {echo 'imagens/'.$usuariologin.'/fotologin/'.$usuariofoto;}
                        else{ echo 'imagens/foto_exists.png';}?>" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="<?='../'.$pag_system.'?pag=edit-user'?>"><i class="fa fa-cogs me-2"></i> Informações</a></li>
                        <li><a class="dropdown-item" href="<?='../'.$pag_system.'?pag=alt-senha'?>"><i class="fa fa-lock me-2"></i> Alterar Senha</a></li>
                        <li><a class="dropdown-item" href="<?='../'.$pag_system.'?pag=edit-person'?>"><i class="fa fa-pencil-square me-2"></i> Personalizar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#sairModal"><i class="fa fa-sign-out"></i> Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>