<h2 class="text-left top-space">Users</h2>
<h2 class="top-space"></h2>
<div class="content-wrapper">
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