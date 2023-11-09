<?php

$mensagem = '';

if(isset($_GET['status'])){
    switch($_GET['status']){
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-error">Ocorreu um erro na execução</div>';
            break;
    }
}

?>

<main>
    <section class="mb-5">
        <?= $mensagem; ?>
        <a href="cadastrar.php" style="text-decoration: none;">
            <button class="btn btn-success">
                Nova vaga
            </button>
        </a>
    </section>

    <section>
    <?php if(count($vagas) > 0): ?>
        <table class="table bg-light">
            <thead>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Data</th>
                <th>Ações</th>
            </thead>
                <?php foreach($vagas as $vaga): ?>
                <tbody>
                    <td><?= $vaga->id; ?></td>
                    <td><?= $vaga->titulo; ?></td>
                    <td><?= $vaga->descricao; ?></td>
                    <?php if($vaga->ativo == 'S'): ?>
                        <td><span class="badge text-bg-success">Ativo</span></td>
                    <?php else: ?>
                        <td><span class="badge text-bg-danger">Inativo</span></td>
                    <?php endif; ?>
                    <td><?= $vaga->data; ?></td>
                    <td  style="text-decoration: none;">
                        <a href="editar.php?id=<?= $vaga->id; ?>">
                            <button class="btn btn-warning">Editar</button>
                        </a>
                        <a href="excluir.php?id=<?= $vaga->id; ?>">
                            <button class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tbody>
            <?php endforeach; ?>
        </table>
      <?php else:?>
        <h4 class="text-center">Não há vagas cadastradas ainda</h4>
    <?php endif;?>
    </section>
</main>