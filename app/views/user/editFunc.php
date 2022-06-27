<section class="clean-block clean-form dark h-100">
    <div class="container">
        <div class="block-heading" style="padding-top: 0px;">
            <h2 class="text-primary">Editar Utilizador</h2>
            <p></p>
        </div>
        <form action="router.php?r=user/update&id=<?= $user->id ?>" method="post" enctype="multipart/form-data" role="form">
            <div class="form-group mb-3">
                <label class="form-label">Email*</label>
                <?php
                if (isset($user->errors)) {
                    echo "<span class='alerta'>";
                    if (is_array($user->errors->on('email'))) {
                        echo $user->errors->on('email')[0];
                    } else {
                        echo $user->errors->on('email');
                    }
                    echo '</span>';
                }
                ?>
                <input class="form-control" type="text" name="email" value="<?php if (isset($user->email)) echo $user->email ?>">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Password*</label>
                <?php
                if (isset($user->errors)) {
                    echo "<span class='alerta'>";
                    if (is_array($user->errors->on('password'))) {
                        echo $user->errors->on('password')[0];
                    } else {
                        echo $user->errors->on('password');
                    }
                    echo '</span>';
                }
                ?>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button></div>
        </form>
    </div>
</section>