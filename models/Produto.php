<?php

class Produto {
    public $CDPRODID;
    public $CDPRODNOME;
    public $CDPRODDESC;
    public $CDPRODPRECO;
}

interface ProdutoDAOInterface {
    public function buildProduto ($data);
    public function inserir(Produto $produto);
    public function atualizar(Produto $produto);
    public function deletar($CDPRODID);
    public function filtrar($CDUSID, $filtroOpt, $filtroValor, $offset);
}