<?php

//Inicia o armazenamento dos dados em uma sessão
session_start();

if (array_key_exists('nome', $_GET) && $_GET['nome'] != ''){
    $tarefa = [
        'nome' => $_GET['nome'],
        'descricao' => '',
        'prazo' => '',
        'prioridade' => $_GET['prioridade'],
        'concluida' => ''];

    //$tarefa['nome'] = $_GET['nome'];

    if (array_key_exists('descricao', $_GET)){
        $tarefa['descricao'] = $_GET['descricao'];
    }

    if (array_key_exists('prazo', $_GET)){
        $tarefa['prazo'] = $_GET['prazo'];
    }

    //$tarefa['prioridade'] = $_GET['prioridade'];

    if (array_key_exists('concluida', $_GET)){
        $tarefa['concluida'] = $_GET['concluida'];
    }

    $_SESSION['lista_tarefa'][] = $tarefa;
}

if (array_key_exists('lista_tarefa', $_SESSION)){
    $lista_tarefas = $_SESSION['lista_tarefa'];
} else {
    $lista_tarefas = [];
}

include "template.php";

?>