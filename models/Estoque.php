<?php

public class Estoque {
    public $CDESTUSUARIO;
    public $CDESTPROD;
    public $CDESTQTD;
}

interface EstoqueDAOInterface {
    public function inserir(Estoque $estoque);
    public function atualizar(Estoque $estoque);
    public function deletar(Estoque $estoque);
}