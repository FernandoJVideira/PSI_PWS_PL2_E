<script>
    $(document).ready(function() {
        if (<?= isset($_GET['erro']) ? $_GET['erro'] : 'false' ?>)
            $("#staticBackdrop").modal('show');
    });
</script>
<section class="clean-block clean-form dark h-100">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Erro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem de remover as linhas da fatura selecionada antes de a apagar!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="block-heading" style="padding-top: 0px;">
            <h2 class="text-primary">Gestão de Faturas</h2>
            <p></p>
        </div>
        <div class="content-wrapper">
            <?php if ($faturas != null) { ?>
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
            <?php } else {  ?>
                <div class="block-heading" style="padding-top: 0px;">
                    <h2 class="text-secundary">Nenhuma fatura inserida</h2>
                    <p></p>
                </div>
            <?php }
            ?>
        </div>
</section>