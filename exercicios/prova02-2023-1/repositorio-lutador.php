<?php
    namespace mma;
    require_once 'lutador.php';

    interface RepositorioLutador {
        public function adicionarLutador(\Lutador $lutador);
        public function removerLutador($id);
    }
?>