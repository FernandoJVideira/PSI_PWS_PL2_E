<section class="clean-block clean-form dark h-100">
    <div class="content-wrapper">
        <div class="block-heading" style="padding-top: 0px;">
            <h2 class="text-primary">Registar Fatura</h2>
            <h4 class="text-secundary">Escolha o cliente</h4>
            <p></p>
        </div>
        <form action="router.php?r=fatura/create" method="post">
            <label class="form-label"><b>Pesquisar cliente</b></label>
            <input class="form-control" type="text" name="nome_cliente">
            <br>
            <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-search"></i>&nbsp;Pesquisa</button></div>
        </form>
        <?php if ($users != null) { ?>
            <table class="table table-striped">
                <thead>
                    <th>
                        <h3>Username</h3>
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
                        <h3>Cod. Postal</h3>
                    </th>
                    <th>
                        <h3>Localidade</h3>
                    </th>
                    <th>
                        <h3>Role</h3>
                    </th>
                    <th>
                        <h3>Actions</h3>
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?= $user->username ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= $user->telefone ?></td>
                            <td><?= $user->nif ?></td>
                            <td><?= $user->morada ?></td>
                            <td><?= $user->cod_postal ?></td>
                            <td><?= $user->localidade ?></td>
                            <td><?= $user->role ?></td>
                            <td>
                                <a href="router.php?r=fatura/store&id=<?= $user->id ?>" class="btn btn-info" role="button">Selecionar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else {  ?>
            <div class="block-heading" style="padding-top: 20px;">
                <h2 class="text-secundary">Não foi encontrado nenhum utilizador!</h2>
                <p></p>
            </div>
        <?php }
        ?>
    </div>
</section>