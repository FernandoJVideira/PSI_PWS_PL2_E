<section class="clean-block clean-form dark h-100">
    <div class="content-wrapper">
        <div class="block-heading" style="padding-top: 0px;">
            <h2 class="text-primary">Gestão da Empresa</h2>
            <p></p>
        </div>
        <div class="content-wrapper">
            <table class="table table-striped">
                <thead>
                    <th>
                        <h3>Nome</h3>
                    </th>
                    <th>
                        <h3>Email</h3>
                    </th>
                    <th>
                        <h3>Telefone</h3>
                    </th>
                    <th>
                        <h3>NIF</h3>
                    </th>
                    <th>
                        <h3>Morada</h3>
                    </th>
                    <th>
                        <h3>Código Postal</h3>
                    </th>
                    <th>
                        <h3>Localidade</h3>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($empresas as $empresa) {
                    ?>
                        <tr>
                            <td><?= $empresa->nome ?></td>
                            <td><?= $empresa->email ?></td>
                            <td><?= $empresa->telefone ?></td>
                            <td><?= $empresa->nif ?></td>
                            <td><?= $empresa->morada ?></td>
                            <td><?= $empresa->cod_postal ?></td>
                            <td><?= $empresa->localidade ?></td>
                            <td>
                                <a href="router.php?r=empresa/edit&id=<?= $empresa->id ?>" class="btn btn-info" role="button">Edit</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</section>