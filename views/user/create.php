<section class="clean-block clean-form dark h-100">
  <div class="container">
    <div class="block-heading" style="padding-top: 0px;">
      <h2 class="text-primary">Registo de Utilizadores</h2>
      <p></p>
    </div>
    <form action="router.php?r=user/store" method="post" enctype="multipart/form-data" role="form">
      <div class="form-group mb-3">
        <label class="form-label">Username*</label>
        <span> <?php if (isset($users->errors)) {
                  echo $users->errors->on('username');
                } ?></span>
        <input class="form-control" type="text" name="username" value="<?php if (isset($users->username)) echo $users->username ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Password*</label>
        <span> <?php if (isset($users->errors)) {
                  echo $users->errors->on('password');
                } ?></span>
        <input class="form-control" type="password" name="password">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Email*</label>
        <span> <?php if (isset($users->errors)) {
                  echo $users->errors->on('email');
                } ?></span>
        <input class="form-control" type="email" name="email" value="<?php if (isset($users->email)) echo $users->email ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Telemóvel*</label>
        <span> <?php if (isset($users->errors)) {
                  echo $users->errors->on('telefone');
                } ?></span>
        <input class="form-control" type="tel" name="telefone" value="<?php if (isset($users->telefone)) echo $users->telefone ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Nif*</label>
        <span> <?php if (isset($users->errors)) {
                  echo $users->errors->on('nif');
                } ?></span>
        <input class="form-control" type="text" name="nif" value="<?php if (isset($users->nif)) echo $users->nif ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Morada*</label>
        <span> <?php if (isset($users->errors)) {
                  echo $users->errors->on('morada');
                } ?></span>
        <input class="form-control" type="text" name="morada" value="<?php if (isset($users->morada)) echo $users->morada ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Código-Postal*</label>
        <span> <?php if (isset($users->errors)) {
                  echo $users->errors->on('cod_postal');
                } ?></span>
        <input class="form-control" type="text" name="cod_postal" value="<?php if (isset($users->cod_postal)) echo $users->cod_postal ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Localidade*</label>
        <span> <?php if (isset($users->errors)) {
                  echo $users->errors->on('localidade');
                } ?></span>
        <input class="form-control" type="text" name="localidade" value="<?php if (isset($users->localidade)) echo $users->localidade ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Tipo de Utilizador*</label>
        <span> <?php if (isset($users->errors)) {
                  echo $users->errors->on('type_user');
                } ?></span>
        <br>
        <select name="role">
          <option value="cliente" <?php if (isset($users->role)) if ($users->role  ==  "cliente") echo "selected" ?>>Cliente</option>
          <option value="funcionario" <?php if (isset($users->role)) if ($users->role  ==  "funcionario") echo "selected" ?>>Funcionário</option>
        </select>
      </div>
      <hr style="margin-top: 30px;margin-bottom: 10px;">
      <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button></div>
    </form>
  </div>
</section>
