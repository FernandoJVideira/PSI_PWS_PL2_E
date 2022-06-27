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
                    O utilizador selecionado tem faturas associadas!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="block-heading" style="padding-top: 0px;">
            <h2 class="text-primary">Gestão de Utilizadores</h2>
            <p></p>
        </div>
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
                <?php if (isset($user)) { ?>
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
                            <a href="router.php?r=user/edit&id=<?= $user->id ?>" class="btn btn-info" role="button">Edit</a>
                        </td>
                    </tr>
                <?php } ?>
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
                            <a href="router.php?r=user/edit&id=<?= $user->id ?>" class="btn btn-info" role="button">Edit</a>
                            <?php if ($_SESSION['login'][1] != $user->id) { ?><a href="router.php?r=user/delete&id=<?= $user->id ?>" class="btn btn-warning" role="button">Delete</a><?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>