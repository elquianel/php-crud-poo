<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">
                Voltar
            </button>
        </a>
    </section>

    <h2 class="mt-3"><?= TITLE; ?></h2>

    <form action="" method="post">
        <div class="form-group mb-2">
            <label for="">Título</label>
            <input type="text" class="form-control" name="titulo" value="<?= isset($vaga->titulo) ? $vaga->titulo : ''; ?>">
        </div>

        <div class="form-group mb-2">
            <label for="">Descrição</label>
            <textarea name="descricao" class="form-control"><?= isset($vaga->descricao) ? $vaga->descricao : ''; ?></textarea>
        </div>

        <div class="form-group mb-2">
            <label for="">Status</label>
            <div>
                <div class="form-check form-check-inline">
                    <label for="">
                        <input type="radio" name="ativo" value="S" checked> Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label for="">
                        <input type="radio" name="ativo" value="N" <?= isset($vaga->ativo) == 'N' ? 'checked' : ''; ?>> Inativo
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</main>