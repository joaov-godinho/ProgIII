<?php

$bdServidor = '127.0.0.1'; //equivale ao localhost
$bdUsuario =  'root'; //utilizar o User conforme criado 
$bdSenha = 'root';
$bdBanco = 'afazeres'; //nome da base de dados

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

function buscar_tarefas($conexao){
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $tarefas = array();

    while ($tarefa =  mysqli_fetch_assoc($resultado)){
        $tarefas[] = $tarefa;
    }

    return $tarefas;
}

function gravar_tarefa($conexao, $tarefa){
    if ($tarefa['prazo'] == ''){
        $prazo = 'NULL';
    } else {
        $prazo = "'{$tarefa['prazo']}'";
    }

    $sqlGravar = "
        INSERT INTO tarefas(nome, descricao, prioridade, prazo, concluida)
        VALUES(
            '{$tarefa['nome']}',
            '{$tarefa['descricao']}',
             {$tarefa['prioridade']},
             {$prazo},
             {$tarefa['concluida']}
        )
    ";

    mysqli_query($conexao, $sqlGravar);
}

?>