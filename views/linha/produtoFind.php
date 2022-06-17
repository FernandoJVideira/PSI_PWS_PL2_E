<section class="clean-block clean-form dark h-100">
    <div class="content-wrapper">
        <div class="block-heading" style="padding-top: 0px;">
            <h2 class="text-primary">Registar linha de fatura</h2>
            <h4 class="text-secundary">Escolha o produto</h4>
            <p></p>
        </div>
        <form action="router.php?r=linha/pesquisa&id=<?= $id ?>" method="post">
            <label class="form-label"><b>Pesquisar produto(referencia)</b></label>
            <input class="form-control" type="text" name="referencia">
            <br>
            <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-search"></i>&nbsp;Pesquisa</button></div>
        </form>
        <?php if ($produtos != null) { ?>
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
                                <a href="router.php?r=linha/create&id=<?= $id ?>&idp=<?= $produto->id ?>" class="btn btn-info" role="button">Selecionar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else {  ?>
            <div class="block-heading" style="padding-top: 20px;">
                <h2 class="text-secundary">Não foi encontrado nenhum produto!</h2>
                <p></p>
            </div>
        <?php }
        ?>
    </div>
</section>