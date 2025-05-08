<?php

public class Estoque {
    public $CDESTUSUARIO;
    public $CDESTPROD;
    public $CDESTQTD;
}

interface EstoqueDAOInterface {
    public function inserir($produto, $qtd = 0)
    public function atualizar($produto, $produtoVelho)
    public function deletar($produto)
    public function procurarPorNome($nome)
    public function filtrarPorEstoque($qtd)
}