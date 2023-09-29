<?php

    require_once 'ItemVenda.php';
    //require_once 'VendaException.php';

    use \excecoes\VendaException;

    class Venda {
        private $itens = [];

        public function adicionarItens(ItemVenda $item){
            if(!$item){
                throw new VendaException('O item não deve ser nulo.');
            }
            array_push($this->intens, $item);
        }

        public function removerItemNaPosicao($pos){
            if($pos < 0){
                throw new VendaException('A posição não deve ser negativa');
            }
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

    $p = new Produto('Guarana', 10, 10.00, 10.00);
    $iv = new ItemVenda( $p, 5);
    echo $iv->subtotal(), PHP_EOL;
    
    $p2 = new Produto('Guarana', 5, 20.00, 10.00);
    $iv2 = new ItemVenda( $p, 1);
    echo $iv2->subtotal(), PHP_EOL;

    $venda = new Venda();
    $venda->adicionarItens($iv);
    $venda->adicionarItens($iv2);
    echo 'Total: ', $venda->total();
?>