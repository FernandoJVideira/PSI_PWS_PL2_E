<section class="clean-block clean-form dark h-100">
  <div class="container">
    <div class="block-heading" style="padding-top: 0px;">
      <h2 class="text-primary">Editar Utilizador</h2>
      <p></p>
    </div>
    <form action="router.php?r=user/update&id=<?= $user->id ?>" method="post" enctype="multipart/form-data" role="form">
      <div class="form-group mb-3">
        <label class="form-label">Username*</label>
        <?php
        if (isset($user->errors)) {
          echo "<span class='alerta'>";
          if (is_array($user->errors->on('username'))) {
            echo $user->errors->on('username')[0];
          } else {
            echo $user->errors->on('username');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="username" value="<?php if (isset($user->username)) echo $user->username ?>">
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
        <label class="form-label">Telefone*</label>
        <?php
        if (isset($user->errors)) {
          echo "<span class='alerta'>";
          if (is_array($user->errors->on('telefone'))) {
            echo $user->errors->on('telefone')[0];
          } else {
            echo $user->errors->on('telefone');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="telefone" value="<?php if (isset($user->telefone)) echo $user->telefone ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Nif*</label>
        <?php
        if (isset($user->errors)) {
          echo "<span class='alerta'>";
          if (is_array($user->errors->on('nif'))) {
            echo $user->errors->on('nif')[0];
          } else {
            echo $user->errors->on('nif');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="nif" value="<?php if (isset($user->nif)) echo $user->nif ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Morada*</label>
        <?php
        if (isset($user->errors)) {
          echo "<span class='alerta'>";
          if (is_array($user->errors->on('morada'))) {
            echo $user->errors->on('morada')[0];
          } else {
            echo $user->errors->on('morada');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="morada" value="<?php if (isset($user->morada)) echo $user->morada ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Código-Postal*</label>
        <?php
        if (isset($user->errors)) {
          echo "<span class='alerta'>";
          if (is_array($user->errors->on('cod_postal'))) {
            echo $user->errors->on('cod_postal')[0];
          } else {
            echo $user->errors->on('cod_postal');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="cod_postal" value="<?php if (isset($user->cod_postal)) echo $user->cod_postal ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Localidade*</label>
        <?php
        if (isset($user->errors)) {
          echo "<span class='alerta'>";
          if (is_array($user->errors->on('localidade'))) {
            echo $user->errors->on('localidade')[0];
          } else {
            echo $user->errors->on('localidade');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="localidade" value="<?php if (isset($user->localidade)) echo $user->localidade ?>">
      </div>
      <?php if ($_SESSION['login'][2] != 'funcionario') { ?>
        <div class="form-group mb-3">
          <label class="form-label">Tipo de Utilizador*</label>
          <?php
          if (isset($user->errors)) {
            echo "<span class='alerta'>";
            if (is_array($user->errors->on('role'))) {
              echo $user->errors->on('role')[0];
            } else {
              echo $user->errors->on('role');
            }
            echo '</span>';
          }
          ?>
          <br>
          <select name="role">
            <option value="cliente" <?php if (isset($user->role)) if ($user->role  ==  "cliente") echo "selected" ?>>Cliente</option>
            <option value="funcionario" <?php if (isset($user->role)) if ($user->role  ==  "funcionario") echo "selected" ?>>Funcionário</option>
          </select>
        </div>
        <hr style="margin-top: 30px;margin-bottom: 10px;">
      <?php } ?>
      <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button></div>
    </form>
  </div>
</section>