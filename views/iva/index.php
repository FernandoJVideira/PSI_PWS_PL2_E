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
                    A taxa de iva selecionada está a ser utilizada por um ou mais produtos!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="block-heading" style="padding-top: 0px;">
            <h2 class="text-primary">Gestão de Ivas</h2>
            <p></p>
        </div>
        <div class="content-wrapper">
            <table class="table table-striped">
                <thead>
                    <th>
                        <h3>Percentagem</h3>
                    </th>
                    <th>
                        <h3>Descrição</h3>
                    </th>
                    <th>
                        <h3>Em Vigor</h3>
                    </th>
                    <th>
                        <h3>Ações</h3>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($ivas as $iva) { ?>
                        <?php if (isset($_GET['erro']) && $_GET['erro'] == $iva->id) {
                            echo '<script type="text/javascript"></script>';
                        } ?>
                        <tr>
                            <td><?= $iva->percentagem ?></td>
                            <td><?= $iva->descricao ?></td>
                            <td><?= $iva->em_vigor == 1 ? 'Sim' : 'Não' ?></td>
                            <td>
                                <a href="router.php?r=iva/edit&id=<?= $iva->id ?>" class="btn btn-info" role="button">Edit</a>
                                <a href="router.php?r=iva/delete&id=<?= $iva->id ?>" class="btn btn-warning" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</section>