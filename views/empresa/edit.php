<section class="clean-block clean-form dark h-100">
    <div class="container">
        <div class="block-heading" style="padding-top: 0px;">
            <h2 class="text-primary">Editar Empresa</h2>
            <p></p>
        </div>
        <form action="router.php?r=empresa/update&id=<?= $empresa->id ?>" method="post" enctype="multipart/form-data" role="form" style="max-width: 560px;">
            <div class="form-group mb-3">
                <label class="form-label">Nome da Empresa*</label>
                <?php
                if (isset($empresa->errors)) {
                    echo "<span class='alerta'>";
                    if (is_array($empresa->errors->on('nome'))) {
                        echo $empresa->errors->on('nome')[0];
                    } else {
                        echo $empresa->errors->on('nome');
                    }
                    echo '</span>';
                }
                ?>
                <input class="form-control" type="text" name="nome" value="<?php if (isset($empresa->nome)) echo $empresa->nome ?>">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Email*</label>
                <?php
                if (isset($empresa->errors)) {
                    echo "<span class='alerta'>";
                    if (is_array($empresa->errors->on('email'))) {
                        echo $empresa->errors->on('email')[0];
                    } else {
                        echo $empresa->errors->on('email');
                    }
                    echo '</span>';
                }
                ?>
                <input class="form-control" type="text" name="email" value="<?php if (isset($empresa->email)) echo $empresa->email ?>">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Telefone*</label>
                <?php
                if (isset($empresa->errors)) {
                    echo "<span class='alerta'>";
                    if (is_array($empresa->errors->on('telefone'))) {
                        echo $empresa->errors->on('telefone')[0];
                    } else {
                        echo $empresa->errors->on('telefone');
                    }
                    echo '</span>';
                }
                ?>
                <input class="form-control" type="text" name="telefone" value="<?php if (isset($empresa->telefone)) echo $empresa->telefone ?>">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Nif*</label>
                <?php
                if (isset($empresa->errors)) {
                    echo "<span class='alerta'>";
                    if (is_array($empresa->errors->on('nif'))) {
                        echo $empresa->errors->on('nif')[0];
                    } else {
                        echo $empresa->errors->on('nif');
                    }
                    echo '</span>';
                }
                ?>
                <input class="form-control" type="text" name="nif" value="<?php if (isset($empresa->nif)) echo $empresa->nif ?>">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Morada*</label>
                <?php
                if (isset($empresa->errors)) {
                    echo "<span class='alerta'>";
                    if (is_array($empresa->errors->on('morada'))) {
                        echo $empresa->errors->on('morada')[0];
                    } else {
                        echo $empresa->errors->on('morada');
                    }
                    echo '</span>';
                }
                ?>
                <input class="form-control" type="text" name="morada" value="<?php if (isset($empresa->morada)) echo $empresa->morada ?>">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Código-Postal*</label>
                <?php
                if (isset($empresa->errors)) {
                    echo "<span class='alerta'>";
                    if (is_array($empresa->errors->on('cod_postal'))) {
                        echo $empresa->errors->on('cod_postal')[0];
                    } else {
                        echo $empresa->errors->on('cod_postal');
                    }
                    echo '</span>';
                }
                ?>
                <input class="form-control" type="text" name="cod_postal" value="<?php if (isset($empresa->cod_postal)) echo $empresa->cod_postal ?>">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Localidade*</label>
                <?php
                if (isset($empresa->errors)) {
                    echo "<span class='alerta'>";
                    if (is_array($empresa->errors->on('localidade'))) {
                        echo $empresa->errors->on('localidade')[0];
                    } else {
                        echo $empresa->errors->on('localidade');
                    }
                    echo '</span>';
                }
                ?>
                <input class="form-control" type="text" name="localidade" value="<?php if (isset($empresa->localidade)) echo $empresa->localidade ?>">
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Capital Social*</label>
                <?php
                if (isset($empresa->errors)) {
                    echo "<span class='alerta'>";
                    if (is_array($empresa->errors->on('capital_social'))) {
                        echo $empresa->errors->on('capital_social')[0];
                    } else {
                        echo $empresa->errors->on('capital_social');
                    }
                    echo '</span>';
                }
                ?>
                <input class="form-control" type="text" name="capital_social" value="<?php if (isset($empresa->capital_social)) echo $empresa->capital_social ?>">
            </div>

            <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button></div>
        </form>
    </div>
</section>