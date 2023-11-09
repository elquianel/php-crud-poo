<main>
    <h2 class="mt-3">Excluir vaga</h2>

    <form action="" method="post">
        <div class="form-group mb-2">
            <p>Você deseja realmente excluir a vaga <strong><?= $vaga->titulo;?></strong></p>
        </div>

        <div class="form-group">
            <a href="index.php" style="text-decoration: none;">
                <button type="button" class="btn btn-light">Cancelar</button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</main>