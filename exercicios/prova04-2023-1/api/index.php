<?php
    require_once("src/conexao.php");
    use acme\Fornecedor;
    require_once("src/fornecedor.php");
    require_once("src/FornecedorRepositorio.php");


    $url = $_SERVER['REQUEST_URI'];
    $metodo = $_SERVER['REQUEST_METHOD'];

    if($metodo === 'GET' && preg_match('/^\/fornecedores\/?/i', $url)){
        $cabecalhos = getallheaders();
        $filtro = isset( $cabecalhos[ 'filtro' ] ) ? $cabecalhos[ 'filtro' ] : '';

        $repositorio = new FornecedorRepositorio(conectar());
        $todos = $repositorio->todos($filtro);
        header('Content-Type: application/json');
        echo json_encode($todos);
    } else if($metodo === 'POST' && preg_match('/^\/fornecedores\/?/i', $url)) {
        $conteudo = file_get_contents( 'php://input' );
        $dados = [];
        mb_parse_str( $conteudo, $dados );

        $fornecedor = new Fornecedor(
            0,
            isset($dados['codigo']) ? $dados['codigo'] : '',
            isset($dados['nome']) ? $dados['nome'] : '',
            isset($dados['email']) ? $dados['email'] : '',
            isset($dados['cnpj']) ? $dados['cnpj'] : '',
            isset($dados['telefone']) ? $dados['telefone'] : '',
         );

        $repositorio = new FornecedorRepositorio(conectar());
        $repositorio->cadastrar($fornecedor);
        http_response_code(201); //Created
        echo 'Cadastrado';
    } else if($metodo === 'PUT' && preg_match('/^\/fornecedores\/([0-9]+)\/?/i', $url, $casamentos)){
        [ , $id ] = $casamentos;
        $conteudo = file_get_contents( 'php://input' );
        $dados = [];
        mb_parse_str( $conteudo, $dados );
        
        $fornecedor = new Fornecedor(
            $id,
            isset($dados['codigo']) ? $dados['codigo'] : '',
            isset($dados['nome']) ? $dados['nome'] : '',
            isset($dados['email']) ? $dados['email'] : '',
            isset($dados['cnpj']) ? $dados['cnpj'] : '',
            isset($dados['telefone']) ? $dados['telefone'] : '',
        );

        $repositorio = new FornecedorRepositorio(conectar());
        $ok = $repositorio->atualizar($fornecedor);

        if($ok) {
            http_response_code(200);
            die('Atualizado');
        } else {
            http_response_code(500);
            die('Erro durante a atualização');
        }
    } else {
        http_response_code(405); //Método náo permitido
        echo json_encode(['erro' => 'Método não permitido']);
    }
?>