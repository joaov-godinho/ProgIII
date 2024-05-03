<?php

//Inicia o armazenamento dos dados em uma sessão
session_start();

include "banco.php"; // busca o conector com o banco
include "helpers.php";

if (array_key_exists('nome', $_POST) && $_POST['nome'] != ''){
    $tarefa = [];

    $tarefa['nome'] = $_POST['nome'];

    if (array_key_exists('descricao', $_POST)){
        $tarefa['descricao'] = $_POST['descricao'];
    } else {
        $tarefa['descricao'] = '';
    }

    if (array_key_exists('prazo', $_POST)){
        $tarefa['prazo'] = converte_data_para_banco($_POST['prazo']);
    } else {
        $tarefa['prazo'] = '';
    }

    $tarefa['prioridade'] = $_POST['prioridade'];

    if (array_key_exists('concluida', $_POST)){
        $tarefa['concluida'] = 1;
    } else {
        $tarefa['concluida'] = 0;
    }
    gravar_tarefa($conexao, $tarefa);

    $_SESSION['lista_tarefas'][] = $tarefa;
}

$lista_tarefas = buscar_tarefas($conexao);


include "template.php";

?>