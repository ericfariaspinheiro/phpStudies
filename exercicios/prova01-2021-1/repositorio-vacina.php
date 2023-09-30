<?php
    namespace vac;

    interface RepositorioVacina {
        public function vacinas(): array;
        public function vacinaComId($id): ?Vacina;
        public function atualizarVacina(Vacina $vacina): void;
    }
?>