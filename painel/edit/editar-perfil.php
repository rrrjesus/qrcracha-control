<?php

/* Este projeto é desenvolvido na Suvis Jaçanã-Tremembé com iniciativa dos colaboradores da Unidade -->
<!-- Código desenvolvido por Rodolfo Romaioli Ribeiro de Jesus - rodolfo.romaioli@gmail.com -->
<!-- Sisdam Web - 2.0 - 2017 - Todos os direitos reservados */
error_reporting(0);
include_once("../../locked/seguranca-admin.php");
include_once 'proc-edit-admin/proc-edit-perfil.php';

//Executa consulta ...
$consulta_perfil = "SELECT * FROM usuarios WHERE login='$usuariologin'";
$resultado_perfil = $conectar->query($consulta_perfil);
$editar_perfil = mysqli_fetch_assoc($resultado_perfil);

?>

<div class="container-fluid">

    <!-- begin MAIN PAGE CONTENT -->
    <div id="page-wrapper">

        <div class="page-content">

            <!-- begin PAGE TITLE ROW -->
            <div class="row">
                <div class="col-lg-5">
                    <div class="page-title">
                        <h2>
                            Perfil de usuário
                        </h2>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-dashboard"></i> <a href="../<?php echo $admin?>">Painel de Controle</a>
                            </li>
                            <li class="active">Perfil de usuário</li>
                        </ol>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- end PAGE TITLE ROW -->

            <div class="row">
                <div class="col-lg-12">

                    <div class="portlet portlet-default">
                        <div class="portlet-body">
                            <ul id="userTab" class="nav nav-tabs">
                                <li class="active"><a href="#overview" data-toggle="tab">Visão geral</a></li>
                                </li>
                                <li><a href="#profile-settings" data-toggle="tab">Atualizar perfil</a></li>
                                <li><a href="#changePassword" data-toggle="tab">Atualizar senha</a></li>
                            </ul>
                            <div id="userTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="overview">

                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <p>
                                                <?php
                                                if (isset($_SESSION['msgperfilerro'])) {
                                                    echo $_SESSION['msgperfilerro'];
                                                    unset($_SESSION['msgperfilerro']);
                                                }
                                                if (isset($_SESSION['msgperfil'])) {
                                                    echo $_SESSION['msgperfil'];
                                                    unset($_SESSION['msgperfil']);
                                                }
                                                ?>
                                            </p>
                                            <h2>
                                                <i class="fa fa-user fa-muted"></i> <?php echo $editar_perfil['nome']; ?>
                                            </h2>
                                            <h3>Detalhes do Usuário</h3>
                                            <p>
                                                <i class="fa fa-user fa-muted"></i> <?php echo $editar_perfil['nivel_acesso_id']; ?>
                                            </p>
                                            <p><i class="fa fa-calendar fa-muted"></i> Cadastrado em
                                                : <?php echo dateConvert($editar_perfil['criado']); ?></p>
                                            <p><i class="fa fa-globe fa-muted fa-fw"></i> <a href="#">http://www.website.com</a>
                                            </p>
                                            <p>
                                                <i class="fa fa-phone fa-muted fa-fw"></i><?php echo $editar_perfil['telefone']; ?>
                                            </p>
                                            <p>
                                                <i class="fa fa-building-o fa-muted fa-fw"></i><?php echo $editar_perfil['login']; ?>
                                            </p>
                                            <p><i class="fa fa-envelope-o fa-muted fa-fw"></i> <a
                                                        href="#"><?php echo $editar_perfil['email']; ?></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-settings">

                                    <div class="row">
                                        <div class="col-sm-12">

                                            <form class="form-horizontal" id="edicao_perfil" method="POST" action="">
                                                <div class="form-group">
                                                    <div class="col-sm-5">
                                                        <label>Nome</label>
                                                        <input type="text" name="nome" class="form-control"
                                                               value="<?php echo $editar_perfil['nome']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-5">
                                                        <label><i class="fa fa-phone fa-fw"></i>Telefone de
                                                            Contato</label>
                                                        <input type="text" name="telefone" class="form-control"
                                                               value="<?php echo $editar_perfil['telefone']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-5">
                                                        <label><i class="fa fa-envelope-o fa-fw"></i> Endereço de e-mail</label>
                                                        <input type="email" class="form-control" name="email"
                                                               value="<?php echo $editar_perfil['email']; ?>">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id"
                                                       value="<?php echo $editar_perfil['id']; ?>">
                                                <button type="submit" name="btnEditPerfil" value="EditarPerfil"
                                                        class="btn btn-success"><span
                                                            class="glyphicon glyphicon-floppy-disk"></span> Atualizar
                                                    perfil
                                                </button>
                                                <a href='<?php echo $admin?>?link=2'>
                                                    <button type='button' data-toggle="tooltip" title="Cancelar"
                                                            class="btn btn-danger"><span
                                                                class="glyphicon glyphicon-remove"></span> Cancelar
                                                    </button>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="changePassword">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form class="form-horizontal" id="edicao_senha">
                                                <div class="form-group"><br>
                                                    <div class="col-sm-5">
                                                        <label>Senha Antiga</label>
                                                        <input type="password" name="senha" class="form-control"
                                                               value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-5">
                                                        <label>Nova Senha</label>
                                                        <input type="password" name="senhanova" class="form-control"
                                                               value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-5">
                                                        <label>Repetir Nova Senha</label>
                                                        <input type="password" name="senhanova1" class="form-control"
                                                               value="">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success"><span
                                                            class="glyphicon glyphicon-floppy-disk"></span> Atualizar
                                                    senha
                                                </button>
                                                <a href='<?php echo $admin?>?link=2'>
                                                    <button type='button' data-toggle="tooltip" title="Cancelar"
                                                            class="btn btn-danger"><span
                                                                class="glyphicon glyphicon-remove"></span> Cancelar
                                                    </button>
                                                </a>
                                            </form>
                                        </div><!-- /.col-lg-12 -->
                                    </div><!-- /.row -->
                                </div><!--id=changePassWord-->
                            </div><!-- /.portlet -->
                        </div><!-- /.portlet-body -->
                    </div><!--portlet-portlet-defalt -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
            <!-- end MAIN PAGE CONTENT -->
        </div><!-- /.page-content -->
    </div><!-- /#page-wrapper -->
</div><!-- /.container-fluid -->





