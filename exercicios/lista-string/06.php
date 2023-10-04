<?php
    // A
    $conteudo = file_get_contents('produtos.csv');
    $linhas = explode("\n", $conteudo);
    $cabecalho = array_shift($linhas);
    
    $produtos = [];


    foreach($linhas as $linha){
        $colunas = explode(",", $linha);

        if(!empty($colunas)){
            $produtos []= [
                "produto"=>$colunas[0],
                "estoque"=>$colunas[1],
                "preco"=>$colunas[2]
            ];
        }
    }

    usort($produtos, function($a, $b){
        return strcasecmp($a['produto'], $b['produto']);

    });


    $html = <<<HTML
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Produtos</title>
    </head>
    <body>
    <h1>Tabela de Produtos</h1>
    <table border="1">
        <tr>
            <th>Produto</th>
            <th>Estoque</th>
            <th>Preço</th>
        </tr>
    HTML;


    foreach($produtos as $produto){
        $html .= "<tr>";
        $html .= "<td>{$produto['produto']}</td>";
        $html .= "<td>{$produto['estoque']}</td>";
        $html .= "<td>{$produto['preco']}</td>";
        $html .= "</tr>";
    }


    // B

    $totalEstoque = 0;

    foreach($produtos as $produto){
        $totalEstoque += $produto['estoque'];
    }

    $html .= "<tfoot><tr><td colspan='2'>Total de estoque</td><td>{$totalEstoque}</td></tr><tfoot>";

    $html .= <<<HTML
        </table>
    </body>
    </html>
    HTML;

    file_put_contents("produtos.html", $html);
?>