<?php


class Modal {
    var $name;

    public function ModalLixeira ($usuarioniveldeacesso) {

        if($usuarioniveldeacesso > 0 && $usuarioniveldeacesso < 3) :
            return '<div class="modal fade" id="myModalLixo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content fs-5 fw-bold">
                                <div class="modal-header text-white bg-secondary pt-2 pb-0">
                                    <div class="text-center">
                                        <p><i class="fa fa-trash me-3"></i> Lixeira da Lista</p>
                                    </div>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="textdel fw-bold fs-5"></div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <div class="buttondel fw-bold fs-5"></div>
                            </div>
                        </div>
                    </div>
                </div>';
        else:
             return '<div class="modal fade" id="myModalLixo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content fw-bold fs-5">
                                <div class="modal-header text-white bg-secondary">
                                    <p><i class="fa fa-trash me-3"></i> Lixeira da Lista</p>
                                    <button type="button" class="btn-close text-white" data-dismiss="modal" aria-label="Close"></button>
                               </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <p> Antes de descartar o registro <br> Favor se logar !!!</p>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-outline-success btn-sm fw-bold fs-5" data-dismiss="modal">Entendido</button>
                                </div>
                            </div>
                        </div>
                    </div>';
        endif;
    }
}

$modal = new Modal();