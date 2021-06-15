<!-- Arquivo para exibir o footer-->

<footer class="text-sm-start section mb-0 py-3 fs-sm-4 <?=$navfoofetch->footercolor.' '.$navfoofetch->footertext?>">

<div class="row">
    <div class="col-12 col-lg-3 mb-lg-0"><p class="mb-0 text-center text-xl-left ms-3">Jaçanã Controle © 2021 - <?=$today = date('Y')?><span
        class="current-year"></span> - versão: <?=$systemfetch->versao;?></p></div>

    <div class="col-12 col-lg-4 mb-lg-0"><p class="mb-0 text-center text-xl-center">Desenvolvido por : <?=$systemfetch->desenvolvedor;?></p></div>

    <div class="col-12 col-lg-4">
        <ul class="list-inline list-group-flush list-group-borderless text-center text-xl-right mb-0">
            <li class="list-inline-item px-0 px-sm-2"><i class="fa fa-question-circle me-2" style="color: #fafafb"></i><a target="_blank" href="index.php" class="link-light">Sobre</a></li>
            <li class="list-inline-item px-0 px-sm-2"><i class="fa fa-globe-americas me-2" style="color: #1da1f2"></i><a target="_blank" href="https://<?=HOST?>/sisdamwebsite/" class="link-light">Site</a></li>
            <li class="list-inline-item px-0 px-sm-2"><i class="fa fa-whatsapp me-1" style="color: forestgreen"></i>
                <!-- Link original -> "https://wa.me/5511991091365?text=Olá,%20meu%20amigo/a!%0AEsse%20é%20o%20suporte%20do%20Sistema%20SisdamWeb%0A.Como%20podemos%20te%20ajudar?"
                        Link encurtado -> "https://bit.ly/3m7H0iQ" no site -> https://app.bitly.com/ -->
                <a target="_blank" href="https://bit.ly/3cCLMkG" class="link-light">Whatsapp</a></li>
            <li class="list-inline-item px-0 px-sm-2"><i class="fa fa-mail-bulk me-1" style="color: #0a53be"></i> <a href="mailto:<?=$systemfetch->email_contato;?>" target="_blank" class="link-light">Contato</a></li>
        </ul>
    </div>
</div>

</footer>