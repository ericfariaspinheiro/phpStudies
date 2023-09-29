<?php
    require_once "./Produto.php";

    final class ProdutoTributado extends Produto {
        private $imposto = 0.00;

        public function __construct ($descricao = '', $estoque = 0, $markup = 0, $precoCompra = 0, $imposto){
            parent::__construct($descricao, $estoque, $markup, $precoCompra);
            $this->setImposto($imposto);
        }

        public function getImposto(){
            return $this->imposto;
        }
        public function setImposto($imposto){
            $this->imposto = $imposto;
        }

        function precoVenda(){
            $precoVenda = parent::precoVenda();
            return $precoVenda + ($precoVenda * ($this->getImposto() / 100));
        }        
    }
?>