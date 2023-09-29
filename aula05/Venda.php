<?php

    require_once 'ItemVenda.php';

    class Venda {
        private $itens = [];

        public function adicionarItens(ItemVenda $item){
            array_push($this->intens, $item);
        }

        public function removerItemNaPosicao($pos){
            unset($this->itens[$pos]);
        }

        public function getItens(){
            return $this->itens;
        }

        public function total(){
            $resultado = 0;

            foreach($this->itens as $item){
                $resultado += $item->subtotal();
            }

            return $resultado;
        }
    }
?>