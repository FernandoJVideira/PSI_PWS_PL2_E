<h2 class="text-left top-space">Faturas</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="content-wrapper">
        <table class="table table-striped">
            <thead>
                <th>
                    <h3>Cliente</h3>
                </th>
                <th>
                    <h3>Funcionário</h3>
                </th>
                <th>
                    <h3>Data</h3>
                </th>
                <th>
                    <h3>Valor total(Iva total)</h3>
                </th>
            </thead>
            <tbody>
                <?php foreach ($faturas as $fatura) { ?>

                    <tr>
                        <td><?= $users[array_search($fatura->cliente_id, array_column($users, 'id'))]->username ?></td>
                        <td><?= $users[array_search($fatura->funcionario_id, array_column($users, 'id'))]->username ?></td>
                        <td><?= $fatura->data->format('d-m-Y') ?></td>
                        <td><?= $fatura->valor_preco_total + $fatura->valor_iva_total ?>€ (<?= $fatura->valor_iva_total ?>€)</td>
                        <td>
                            <?php
                            if ($fatura->estado == "0" && $_SESSION['login'][2] != 'cliente') { ?>
                                <a href="router.php?r=fatura/emitir&id=<?= $fatura->id ?>" class="btn btn-success" role="button">Emitir</a>
                                <a href="router.php?r=fatura/edit&id=<?= $fatura->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?r=fatura/delete&id=<?= $fatura->id ?>" class="btn btn-warning" role="button">Delete</a>
                            <?php } else { ?>
                                <a href="router.php?r=fatura/print&id=<?= $fatura->id ?>" class="btn btn-success" role="button">Visualizar</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>