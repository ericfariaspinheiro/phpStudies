<?php

    class Produto {
        private $descricao = '';
        private $estoque = 0;
        private $markup = 0.00;
        private $precoCompra = 0.00;
        private static $qtdInstancias = 0;
        
        public function __construct ($descricao = '', $estoque = 0, $markup = 0, $precoCompra = 0){
            $this->setDescricao($descricao);
            $this->setEstoque($estoque);
            $this->setMarkup($markup); 
            $this->setPrecoCompra($precoCompra);
            
            self::$qtdInstancias++;
        }

        function getDescricao(){
            return $this->descricao;
        }
        function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        function getEstoque(){
            return $this->descricao;
        }
        function setEstoque($estoque){
            $this->estoque = $estoque;
        }

        function getMarkup(){
            return $this->markup;
        }
        function setMarkup($markup){
            $this->markup = $markup;
        }

        function getPrecoCompra(){
            return $this->markup;
        }
        function setPrecoCompra($precoCompra){
            $this->precoCompra = $precoCompra;
        }

        function precoVenda(){
            return $this->getPrecoCompra() + ($this->getPrecoCompra() * ($this->markup / 100));
        }

        static function instancias(){            
            return self::$qtdInstancias;
        }
    }

    $p1 = new Produto();
?>