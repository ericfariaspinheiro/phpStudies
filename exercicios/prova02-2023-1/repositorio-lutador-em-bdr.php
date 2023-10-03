<?php
    namespace mma;
    require_once 'repositorio-lutador.php';

    use Lutador;
    use PDO;
    use PDOException;

    class RepositorioLutadorEmBDR implements RepositorioLutador {
        public function adicionarLutador(\Lutador $lutador){
            $pdo = null;

            try {
                $pdo = new PDO('mysql:dbname=mma;host=127.0.0.1;charset=utf8', 'root', '', [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $ps = $pdo->prepare('INSERT INTO lutador(id, nome, peso_em_quilos, altura_em_metros) VALUES (?,?,?,?)');
                $ps->execute([$lutador->id, $lutador->nome, $lutador->pesoEmQuilos, $lutador->alturaEmMetros]);
            } catch (PDOException $e){
                throw new PDOException('Erro: ' . $e->getMessage());
            }
        }

        public function removerLutador($id) {
            try {
                $pdo = new PDO('mysql:dbname=mma;host=127.0.0.1;charset=utf8', 'root', '',  [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $ps = $pdo->prepare('DELETE FROM lutador WHERE id=(?)');
                $ps->execute([$id]);
            } catch (PDOException $e) {
                throw new PDOException("Erro: " . $e->getMessage());
            }
        }
    }

    $lutador = new Lutador(3, "Arthur", 75.5, 1.78);

    $test = new RepositorioLutadorEmBDR();
    $test->removerLutador(3);
?>