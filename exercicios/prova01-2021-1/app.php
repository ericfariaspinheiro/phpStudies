<?php
    require_once "repositorio-vacina-em-bd.php";

    const OPCAO_LISTAR = 1;
    const OPCAO_EFICACIA = 2;

    $vacinaDb = new \vac\RepositorioVacinaEmBD();

    do {
        echo "0) Sair", PHP_EOL;
        echo "1) Listar vacinas", PHP_EOL;
        echo "2) Calcular eficacia", PHP_EOL;

        $opcao = readline("Digite uma opção: ");

        switch ($opcao){
            case OPCAO_LISTAR:
                try {
                    $vacinas = $vacinaDb->vacinas();
                    foreach($vacinas as $vacina) {
                        echo "Vacina: " . $vacina->getNome(), " ", "Eficacia: " . ($vacina->getEficacia() * 100) . "%", PHP_EOL;
                    }
                } catch (\vac\RepositorioException $e){
                    echo "Erro: " . $e->getMessage();
                }

                break;
            case OPCAO_EFICACIA:
                $idVacina = readline("Digite o id da vacina: ");

                try {
                    $vacina = $vacinaDb->vacinaComId($idVacina);                    
                    if($vacina) {
                        $tempo = readline("Digite o número de meses: ");
                        $delta = readline("Considerar variante Delta? (S/N)");
                        $delta = $delta === "S" ? true : false;
    
                        echo "Eficacia após ", $tempo, " meses: ", ($vacina->eficaciaAposMeses($tempo, $delta) * 100) . "%", PHP_EOL;
                    } else {
                        echo "Nenhuma vacina encontrada com o id " . $vacina, PHP_EOL;
                    }
                } catch (\vac\RepositorioException $e) {
                    echo "Erro: " . $e->getMessage();
                }   

                break;
            default:
                echo "Opção Inválida.", PHP_EOL;
        }
    } while ($opcao != 0)
?>