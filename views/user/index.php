<h2 class="text-left top-space">Users</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th>
                    <h3>Id</h3>
                </th>
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
                        <td><?= $user->id ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user-> email?></td>
                        <td><?= $user-> telefone?></td>
                        <td><?= $user-> nif?></td>
                        <td><?= $user-> morada?></td>
                        <td><?= $user-> cod_postal?></td>
                        <td><?= $user-> localidade?></td>
                        <td><?= $user-> role?></td>
                        <td>
                            <a href="router.php?r=user/edit&id=<?= $user->id ?>" class="btn btn-info" role="button">Edit</a>
                            <a href="router.php?r=user/delete&id=<?= $user->id ?>" class="btn btn-warning" role="button">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div> <!-- /row -->