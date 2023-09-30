<?php
    namespace vac;

    class Vacina {
        private $id;
        private $nome;
        private $fabricante;
        private $doses;
        private $eficacia;
        private $eficaciaDelta;
        private $perdaMensal;
    
        public function __construct(
            $id = 0,
            $nome = '',
            $fabricante = '',
            $doses = 0,
            $eficacia = 0,
            $eficaciaDelta = 0,
            $perdaMensal = 0
        ) {
            $this->setId( $id );
            $this->setNome( $nome );
            $this->setFabricante( $fabricante );
            $this->setDoses( $doses );
            $this->setEficacia( $eficacia );
            $this->setEficaciaDelta( $eficaciaDelta );
            $this->setPerdaMensal( $perdaMensal );
        }
    
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getFabricante(){
            return $this->fabricante;
        }

        public function setFabricante($fabricante){
            $this->fabricante = $fabricante;
        }

        public function getDoses(){
            return $this->doses;
        }

        public function setDoses($doses){
            $this->doses = $doses;
        }

        public function getEficacia(){
            return $this->eficacia;
        }

        public function setEficacia($eficacia){
            $this->eficacia = $eficacia;
        }

        public function getEficaciaDelta(){
            return $this->eficaciaDelta;
        }

        public function setEficaciaDelta($eficaciaDelta){
            $this->eficaciaDelta = $eficaciaDelta;
        }

        public function getPerdaMensal(){
            return $this->perdaMensal;
        }

        public function setPerdaMensal($perdaMensal){
            $this->perdaMensal = $perdaMensal;
        }

        public function eficaciaAposMeses($tempo, $calcDelta = false){
            if($tempo < 0) {
                return "Tempo invalido";
            }

            if(!$calcDelta){
                $eficaciaTempo = $this->eficacia - ($this->perdaMensal * $tempo);
                if($eficaciaTempo < 0) {
                    return "Sem eficacia";
                } else {
                    return $eficaciaTempo;
                }
            } else {
                $eficaciaTempoDelta = $this->eficaciaDelta - ($this->perdaMensal * $tempo);

                if($eficaciaTempoDelta < 0) {
                    return "Sem eficacia";
                } else {
                    return $eficaciaTempoDelta;
                }
            }
        }
    }

    // $coviKiller = new Vacina(1, 'CoviKiller', 'Acme S/A', 2, 0.95, 0.65, 0.05);

    // echo $coviKiller->eficaciaAposMeses(100, false);
?>

