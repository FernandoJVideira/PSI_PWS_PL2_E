<section class="clean-block clean-form dark h-100">
    <div class="block-heading" style="padding-top: 0px;">
        <h2 class="text-primary">Criação de Faturas</h2>
        <p></p>
    </div>
    <form action="router.php?r=fatura/store" method="post" enctype="multipart/form-data" role="form">
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
                <?php
                if (isset($fatura->errors)) {
                    echo "<span class='alerta'>";
                    if (is_array($fatura->errors->on('data'))) {
                        echo $fatura->errors->on('data')[0];
                    } else {
                        echo $fatura->errors->on('data');
                    }
                    echo '</span>';
                }
                ?>
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
    </tbody>
</table>