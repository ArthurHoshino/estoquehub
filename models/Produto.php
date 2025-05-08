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
    public function deletar(Produto $produto);
    public function procurarPorNome(Produto $nome)
    public function procurarPorId(Produto $id)
}