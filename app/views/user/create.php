<section class="clean-block clean-form dark h-100">
  <div class="container">
    <div class="block-heading" style="padding-top: 0px;">
      <h2 class="text-primary">Registo de Utilizadores</h2>
      <p></p>
    </div>
    <form action="router.php?r=user/store" method="post" enctype="multipart/form-data" role="form">
      <div class="form-group mb-3">
        <label class="form-label">Username*</label>
        <?php
        if (isset($users->errors)) {
          echo "<span class='alerta'>";
          if (is_array($users->errors->on('username'))) {
            echo $users->errors->on('username')[0];
          } else {
            echo $users->errors->on('username');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="username" value="<?php if (isset($users->username)) echo $users->username ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Password*</label>
        <?php
        if (isset($users->errors)) {
          echo "<span class='alerta'>";
          if (is_array($users->errors->on('password'))) {
            echo $users->errors->on('password')[0];
          } else {
            echo $users->errors->on('password');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="password" name="password">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Email*</label>
        <?php
        if (isset($users->errors)) {
          echo "<span class='alerta'>";
          if (is_array($users->errors->on('email'))) {
            echo $users->errors->on('email')[0];
          } else {
            echo $users->errors->on('email');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="email" value="<?php if (isset($users->email)) echo $users->email ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Telefone*</label>
        <?php
        if (isset($users->errors)) {
          echo "<span class='alerta'>";
          if (is_array($users->errors->on('telefone'))) {
            echo $users->errors->on('telefone')[0];
          } else {
            echo $users->errors->on('telefone');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="telefone" value="<?php if (isset($users->telefone)) echo $users->telefone ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Nif*</label>
        <?php
        if (isset($users->errors)) {
          echo "<span class='alerta'>";
          if (is_array($users->errors->on('nif'))) {
            echo $users->errors->on('nif')[0];
          } else {
            echo $users->errors->on('nif');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="nif" value="<?php if (isset($users->nif)) echo $users->nif ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Morada*</label>
        <?php
        if (isset($users->errors)) {
          echo "<span class='alerta'>";
          if (is_array($users->errors->on('morada'))) {
            echo $users->errors->on('morada')[0];
          } else {
            echo $users->errors->on('morada');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="morada" value="<?php if (isset($users->morada)) echo $users->morada ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Código-Postal*</label>
        <?php
        if (isset($users->errors)) {
          echo "<span class='alerta'>";
          if (is_array($users->errors->on('cod_postal'))) {
            echo $users->errors->on('cod_postal')[0];
          } else {
            echo $users->errors->on('cod_postal');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="cod_postal" value="<?php if (isset($users->cod_postal)) echo $users->cod_postal ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Localidade*</label>
        <?php
        if (isset($users->errors)) {
          echo "<span class='alerta'>";
          if (is_array($users->errors->on('localidade'))) {
            echo $users->errors->on('localidade')[0];
          } else {
            echo $users->errors->on('localidade');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="localidade" value="<?php if (isset($users->localidade)) echo $users->localidade ?>">
      </div>
      <?php if ($_SESSION['login'][2] != 'funcionario') { ?>
        <div class="form-group mb-3">
          <label class="form-label">Tipo de Utilizador*</label>
          <?php
          if (isset($users->errors)) {
            echo "<span class='alerta'>";
            if (is_array($users->errors->on('role'))) {
              echo $users->errors->on('role')[0];
            } else {
              echo $users->errors->on('role');
            }
            echo '</span>';
          }
          ?>
          <br>
          <select name="role">
            <option value="cliente" <?php if (isset($users->role)) if ($users->role  ==  "cliente") echo "selected" ?>>Cliente</option>
            <option value="funcionario" <?php if (isset($users->role)) if ($users->role  ==  "funcionario") echo "selected" ?>>Funcionário</option>
          </select>
        </div>
        <hr style="margin-top: 30px;margin-bottom: 10px;">
      <?php } ?>
      <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button></div>
    </form>
  </div>
</section>