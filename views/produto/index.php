<script>
    $(document).ready(function() {
        if (<?= $_GET['erro'] ?>)
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
                    O produto selecionado está a ser utilizado por uma ou mais faturas!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="block-heading" style="padding-top: 0px;">
            <h2 class="text-primary">Gestão de Produtos</h2>
            <p></p>
        </div>
        <div class="content-wrapper">
            <table class="table table-striped">
                <thead>
                    <th>
                        <h3>Referência</h3>
                    </th>
                    <th>
                        <h3>Nome</h3>
                    </th>
                    <th>
                        <h3>Preço Unitário</h3>
                    </th>
                    <th>
                        <h3>Taxa de Iva</h3>
                    </th>
                    <th>
                        <h3>Quantidade em Stock</h3>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto) {
                    ?>

                        <tr>
                            <td><?= $produto->referencia ?></td>
                            <td><?= $produto->descricao ?></td>
                            <td><?= $produto->preco_unid ?></td>
                            <td><?= $ivas[array_search($produto->iva_id, array_column($ivas, 'id'))]->percentagem ?></td>
                            <td><?= $produto->quant_stock ?></td>
                            <td>
                                <a href="router.php?r=produto/edit&id=<?= $produto->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?r=produto/delete&id=<?= $produto->id ?>" class="btn btn-warning" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</section>