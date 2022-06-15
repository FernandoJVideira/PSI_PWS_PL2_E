<h2 class="text-left top-space">Ivas</h2>
<h2 class="top-space"></h2>
<div class="row">
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
            </thead>
            <tbody>
                <?php foreach ($ivas as $iva) { ?>
                    <tr>
                        <td><?= $iva->percentagem ?></td>
                        <td><?= $iva->descricao ?></td>
                        <td><?= $iva->em_vigor ?></td>
                        <td>
                            <a href="router.php?r=iva/edit&id=<?= $iva->id ?>" class="btn btn-info" role="button">Edit</a>
                            <a href="router.php?r=iva/delete&id=<?= $iva->id ?>" class="btn btn-warning" role="button">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>