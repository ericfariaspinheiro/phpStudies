<?php
    use acme\RepositorioFornecedor;
    require_once 'fornecedor.php';
    require_once 'repositorio-fornecedor.php';

    class FornecedorRepositorio implements RepositorioFornecedor {
        private $pdo = null;
        
        public function __construct(PDO $pdo){
            $this->pdo = $pdo;
        }

        public function todos(string $filtro = ''){
            try {
                $ps = $this->pdo->prepare("SELECT * FROM fornecedor WHERE
                                    codigo LIKE '%$filtro%' OR
                                    nome LIKE '%$filtro%' OR
                                    cnpj LIKE '%$filtro%' OR
                                    email LIKE '%$filtro%'
                                ");
    
                $ps->execute();
    
                $todosFornecedores = [];
                $todosFornecedores = $ps->fetchAll();
    
                return json_encode($todosFornecedores);
            } catch (PDOException $e){
                return json_encode(['erro' => 'Erro no banco de dados']);
            }
        }
    
        public function cadastrar(\acme\Fornecedor $fornecedor) {
            $ps = $this->pdo->prepare('INSERT INTO fornecedor(codigo, nome, email, cnpj, telefone) VALUES (:codigo, :nome, :email, :cnpj, :telefone)');
            $ps->execute([
                'codigo'=> $fornecedor->codigo, 
                'nome'=> $fornecedor->nome, 
                'email'=> $fornecedor->email, 
                'cnpj'=> $fornecedor->cnpj, 
                'telefone'=> $fornecedor->telefone
            ]);
        }

        public function atualizar(\acme\Fornecedor $fornecedor) {
            try {
                $this->pdo->beginTransaction();
                echo(print_r($fornecedor));
                $ps = $this->pdo->prepare('UPDATE fornecedor SET codigo = :codigo, nome = :nome, email = :email, cnpj = :cnpj, telefone = :telefone WHERE id=:id');
                $ps->execute(['codigo'=> $fornecedor->codigo, 'nome'=>$fornecedor->nome, 'email'=> $fornecedor->email, 'cnpj'=> $fornecedor->cnpj, 'telefone'=> $fornecedor->telefone, 'id'=>$fornecedor->id]);
            } catch(PDOException $e){
                $this->pdo->rollBack();
                die('Erro: ' . $e->getMessage());
                return false;
            }
        }

        public function remover(string $idOuCodigo) {
            
        }
    }

?>