<?php
    namespace vac;
    require_once 'vacina.php';
    require_once 'repositorio-vacina.php';
    use \vac\RepositorioException;
    use PDO;

    class RepositorioVacinaEmBD implements RepositorioVacina {
        private function conectar() {
            return new PDO(
                'mysql:dbname=2021-1-p1;host=127.0.0.1;charset=utf8', 
                'root', 
                '',
                [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }

        public function vacinas(): array{
            $pdo = null;

            try {
                $vacinas = [];

                $pdo = $this->conectar();
                
                $ps = $pdo->query('SELECT * FROM vacina');
                
                foreach($ps as $vacina){
                    $vacinaObj = new Vacina(
                        $vacina['id'], 
                        $vacina['nome'], 
                        $vacina['fabricante'], 
                        $vacina['doses'], 
                        $vacina['eficacia'], 
                        $vacina['eficacia_delta'], 
                        $vacina['perda_mensal']
                    );

                    $vacinas[] = $vacinaObj;
                }

                return $vacinas;
            } catch (RepositorioException $e) {
                die("Erro: " . $e->getMessage());
            }
            
        }

        public function vacinaComId($id): Vacina {
            $pdo = null;
            
            try {
                $pdo = $this->conectar();

                $ps = $pdo->prepare("SELECT * FROM vacina WHERE id=?");
                $ps->execute([$id]);
                
                $vacina = $ps->fetch();
                    
                $vacinaObj = new Vacina(
                    $vacina['id'], 
                    $vacina['nome'], 
                    $vacina['fabricante'], 
                    $vacina['doses'], 
                    $vacina['eficacia'], 
                    $vacina['eficacia_delta'], 
                    $vacina['perda_mensal']
                );                

                return $vacinaObj;
            } catch (RepositorioException $e){
                die("Erro: " . $e->getMessage());
            }
        }

        public function atualizarVacina(Vacina $vacina): void {
            $pd = null;

            try {
                $pdo = $this->conectar();
                $ps = $pdo->prepare("UPDATE vacina SET nome = ?, fabricante = ?, eficacia = ?, eficacia_delta = ?, perda_mensal = ? WHERE id= ?");
                $ps->execute([$vacina->getNome(), $vacina->getFabricante(), $vacina->getEficacia(), $vacina->getEficaciaDelta(), $vacina->getPerdaMensal(), $vacina->getId()]);

                echo "Atualizado";
            } catch (RepositorioException $e) {
                die("Erro: " . $e->getMessage());
            }
        }
    }
    $vacina = new Vacina(1, 'CoviTester', 'Eric S/A', 3, 0.99, 0.85, 0.01);
    $vacinaDb = new RepositorioVacinaEmBD();
    $vacinaDb->atualizarVacina($vacina);
?>