<section class="clean-block clean-form dark h-100">
    <div class="block-heading" style="padding-top: 0px;">
        <h2 class="text-primary">Edição de Faturas</h2>
        <p></p>
    </div>
    <form action="router.php?r=fatura/update&id=<?= $fatura->id ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="container">
            <div class="form-group mb-3">
                <label class="form-label">Cliente</label>
                <br>
                <select name="cliente_id">
                    <?php if (is_array($users)) {
                        foreach ($users as $user) { ?>
                            <option value="<?= $user->id ?>" <?php if (isset($fatura->cliente_id)) if ($user->id == $fatura->cliente_id) echo "selected"; ?>> <?= $user->username ?></option>';
                    <?php }
                    } else {
                        echo '<option value="' . $users->id . '">' . $users->username . '</option>';
                    } ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Data</label>
                <input class="form-control" type="text" name="data" value="<?= date("d-m-Y") ?>">
            </div>
            <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button></div>
        </div>
    </form>
</section>
<table class="table table-striped">
    <thead>
        <th>
            <h3>Produto</h3>
        </th>
        <th>
            <h3>Quantidade</h3>
        </th>
        <th>
            <h3>Actions</h3>
        </th>
    </thead>
    <tbody>
        <?php foreach ($linhas as $linha) {
            $produto = Produto::find([$linha->produto_id]);
        ?>
            <tr>
                <td><?= $produto->descricao ?></td>
                <td><?= $linha->quantidade ?></td>
                <td>
                    <a href="router.php?r=linha/delete&id=<?= $linha->id ?>" class="btn btn-warning" role="button">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table><a href="router.php?r=linha/create&id=<?= $fatura->id ?>" class="btn btn-warning" role="button">Nova Linha</a>