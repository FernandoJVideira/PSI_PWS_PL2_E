<section class="clean-block clean-form dark h-100">
  <div class="container">
    <div class="block-heading" style="padding-top: 0px;">
      <h2 class="text-primary">Linha Fatura</h2>
      <p></p>
    </div>
    <form action="router.php?r=linha/store" method="post" enctype="multipart/form-data" role="form">
      <div class="form-group mb-3">
        <label class="form-label">Quantidade*</label>
        <?php
        if (isset($linhaFatura->errors)) {
          echo "<span class='alerta'>";
          if (is_array($linhaFatura->errors->on('quantidade'))) {
            echo $linhaFatura->errors->on('quantidade')[0];
          } else {
            echo $linhaFatura->errors->on('quantidade');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="quantidade" value="<?php if (isset($linhaFatura->quantidade)) echo $linhaFatura->quantidade ?>">
      </div>
      </div>
      <?php if ($_SESSION['login'][2] != 'funcionario') { ?>
        <div class="form-group mb-3">
          <label class="form-label">Produto*</label>
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