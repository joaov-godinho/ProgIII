<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>
    <form>
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome">
            </label>
            <input type="submit" value="Gravar">
        </fieldset>

        <?php
            $lista_tarefas = [];

            if(array_key_exists('nome', $_GET)){
                //echo "Nome tarefa informada: " . $_GET['nome'];
                $_SESSION['lista_tarefas'] [] = $_GET['nome'];
            }
            if(array_key_exists('lista_tarefas', $_SESSION)){
                $lista_tarefas = $_SESSION['lista_tarefas'];
            } else{
                $lista_tarefas = [];
            }
        ?>

        <table>
            <tr>
                <th>Tarefas</th>
            </tr>
            <?php foreach ($lista_tarefas as $tarefa) : ?>
            <tr>
                <td><?php echo $tarefa; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </form>
</body>
</html>