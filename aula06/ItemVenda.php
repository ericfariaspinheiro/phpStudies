<?php
    require_once "Produto.php";

    class ItemVenda {
        private $produto = null;
        private $quantidade = 0;

        public function __construct(Produto $produto, $quantidade){
            $this->produto = $produto;
            $this->quantidade = $quantidade;
        }

        function getQuantidade(){
            return $this->quantidade;
        }
        function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }

        function getProduto(){
            return $this->produto;
        }
        function setProduto(Produto $produto){
            $this->produto = $produto;
        }

        function subtotal(){
            return $this->getQuantidade() * $this->getProduto()->precoVenda();
        }
    }

    $produto = new Produto("Agua", 10, 10.00 , 10.00);
    $itemVenda = new ItemVenda($produto, 5);

    echo $itemVenda->subtotal();

?>