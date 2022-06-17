<section class="clean-block clean-form dark h-100" style="padding-bottom: 50px;">
    <div class="block-heading" style="padding-top: 0px;">
        <h2 class="text-primary">Edição de Faturas</h2>
    </div>
    <form action="router.php?r=fatura/update&id=<?= $fatura->id ?>" method="post" enctype="multipart/form-data" role="form" style="max-width: 800px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card" style="border-style:hidden ;">
                        <div class="card-body">
                            <h5 class="card-title">Cliente</h5>
                            <b>Nome: </b><?= $user->username ?><br><b>NIF: </b><?= $user->nif ?><br>
                            <b>Contactos: </b><?= $user->email ?> <?= $user->telefone ?><br>
                            <b>Morada: </b><?= $user->morada ?> <?= $user->cod_postal ?><br><?= $user->localidade ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card" style="border-style:hidden ;">
                        <div class="card-body">
                            <h5 class="card-title">Empresa</h5>
                            <b>Nome: </b><?= $empresa->nome ?><br><b>NIF: </b><?= $empresa->nif ?><br>
                            <b>Contactos: </b><?= $empresa->email ?> <?= $empresa->telefone ?><br>
                            <b>Morada: </b><?= $empresa->morada ?> <?= $empresa->cod_postal ?><br><?= $empresa->localidade ?><br>
                            <b>Capital Social: </b><?= $empresa->capital_social ?>€
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9">
                    <label class="form-label"><b>Data</b></label>
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
                    <br>
                </div>
            </div>
            <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button></div>
            <b>Funcionário: </b><?= $_SESSION['login'][0] ?>
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
            <h3>Total</h3>
        </th>
        <th>
            <h3>Actions</h3>
        </th>
    </thead>
    <tbody>
        <?php foreach ($linhas as $linha) { ?>
            <tr>
                <td><?= $produtos[array_search($linha->produto_id, array_column($produtos, 'id'))]->descricao ?></td>
                <td><?= $linha->quantidade ?></td>
                <td><?= ($linha->quantidade  * $linha->valor_uni) + $linha->valor_iva ?>€</td>
                <td>
                    <a href="router.php?r=linha/delete&id=<?= $linha->id ?>" class="btn btn-warning" role="button">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table><a href="router.php?r=linha/create&id=<?= $fatura->id ?>" class="btn btn-warning" role="button">Nova Linha</a>