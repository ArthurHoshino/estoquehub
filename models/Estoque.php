<?php

class Estoque {
    public $CDESTUSUARIOID;
    public $CDESTPRODID;
    public $CDESTQTD;
}

interface EstoqueDAOInterface {
    public function inserir(Estoque $estoque);
    public function atualizar(Estoque $estoque);
    public function deletar($usuario, $prod);
}