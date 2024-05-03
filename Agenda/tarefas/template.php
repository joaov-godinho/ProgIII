<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas com PHP</title>
    <link rel="stylesheet" type="text/css" href="css/tarefas.css">
</head>
<body>
    <h1>Gerenciador de Tarefas com PHP</h1>
    <form>
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome">
            </label>
            <label>
                Descrição (opcional):
                <input type="text" name="descricao">
            </label>
            <label>
                Prazo (opcional):
                <input  type="text" name="prazo">
            </label>
            <fieldset>
                <legend>Prioridade:</legend>
                <label>
                    <input type="radio" name="prioridade"
                    value="1" checked >Baixa

                    <input type="radio" name="prioridade"
                    value="2" checked >Média

                    <input type="radio" name="prioridade"
                    value="3" checked >Alta
                </label>
            </fieldset>
            <label>
                Tarefa Concluída:
                <input type="checkbox" name="concluida"
                value="1" >
            </label>

            <input type="submit" value="Gravar">
        </fieldset>
    </form>
    <table>
        <tr>
            <th>Tarefas</th>
            <th>Descrição</th>
            <th>Prazo</th>
            <th>Prioridades</th>
            <th>Concluída</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa) : ?>
        <tr>
            <td><?php echo $tarefa['nome']; ?></td>
            <td><?php echo $tarefa['descricao']; ?></td>
            <td><?php echo converte_data_para_tela($tarefa['prazo']); ?></td>
            <td><?php echo converte_prioridade($tarefa['prioridade']); ?></td>
            <td><?php echo converte_concluida($tarefa['concluida']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>