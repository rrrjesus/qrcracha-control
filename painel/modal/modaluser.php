<?php
?>

<!-- Inicio Modal Detalhes-->

<div class="modal fade" id="myModal<?=$users->id?>" tabindex="-1"
     role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="myModalLabel">SisdamWeb 2.0</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body badge-danger">
                <div class="text-center">
                    <h5>Deseja apagar o login: </h5>
                    <h5>
                        <?=$users->nome?>
                            ???
                    </h5>
                </div>
            </div>

            <div class="modal-footer">
                <div class="text-center">
                    <a class="btn btn-outline-success" href='<?php echo $admin; ?>?pag=del-user&id=<?=$users->id?>&nome=<?=$users->nome?>&email=<?=$users->email?>&nivel_acesso_id=<?=$users->nivel_acesso_id?>&login=<?=$users->login?>'>SIM</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-outline-danger" type="button" data-dismiss="modal">NAO</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fim Modal Detalhes -->

<!-- Inicio Modal Reset de Senha-->

<div class="modal fade" id="myModalReset<?=$users->id?>" tabindex="-1"
     role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="myModalLabel">SisdamWeb 2.0</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body badge-info">
                <div class="text-center">
                    <h5>Deseja resetar senha do usuário </h5>
                    <h5><?=$users->nome?> ???</h5>
                </div>
            </div>

            <div class="modal-footer">
                <a class="btn btn-outline-success" href="<?php echo $admin?>?pag=proc-action-modal-user&id=<?=$users->id?>&resetsenha=SIM&nome=<?=$users->nome?>&action=reset">SIM</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-outline-danger" type="button" data-dismiss="modal">NAO</button>
            </div>
        </div>
    </div>
</div>
<!-- Fim Modal Reset de Senha -->

<!-- Inicio Modal Ativa Login-->

<div class="modal fade" id="myModalAtiva<?=$users->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="myModalLabel">SisdamWeb 2.0</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <?php if($users->status==1){
                echo '<div class="modal-body badge-danger"><h5>DESEJA DESATIVAR O USUÁRIO '.$users->nome.' ?</h5></div>
                      <div class="modal-footer text-center">
                          <a class="btn btn-outline-success" href="'.$admin.'?pag=ativa-user&id='.$users->id.'&nome='.$users->nome.'&email='.$users->email.'&status=1&nivel_acesso_id='.$users->nivel_acesso_id.'&login='.$users->login.'">SIM</a>
                          <button class="btn btn-outline-danger" type="button" data-dismiss="modal">NÃO</button></div>';
            }else{
                echo '<div class="modal-body badge-success"><h5>DESEJA ATIVAR O USUÁRIO '.$users->nome.' ?</h5></div>
                      <div class="modal-footer text-center">
                          <a class="btn btn-outline-success" href="'.$admin.'?pag=ativa-user&id='.$users->id.'&nome='.$users->nome.'&email='.$users->email.'&status=0&nivel_acesso_id='.$users->nivel_acesso_id.'&login='.$users->login.'">SIM</a>
                          <button class="btn btn-outline-danger" type="button" data-dismiss="modal">NÃO</button></div>';
            };?>



        </div>
    </div>
</div>
<!-- Fim Modal Ativo Login -->

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
                    <a href='../sair.php' role="button" class="btn btn-success">SIM</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-danger" data-dismiss="modal">NÃO</button>
                </div>
            </div>
        </div>
    </div>
</div>
