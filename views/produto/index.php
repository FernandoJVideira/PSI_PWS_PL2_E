<h2 class="text-left top-space">Produtos</h2>
<h2 class="top-space"></h2>
<div class="row">
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
</div> <!-- /row -->