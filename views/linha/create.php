<section class="clean-block clean-form dark h-100">
  <div class="container">
    <div class="block-heading" style="padding-top: 0px;">
      <h2 class="text-primary">Linha Fatura</h2>
      <p></p>
    </div>
    <form action="router.php?r=linha/store&id= <?= $fatura->id ?>" method="post" enctype="multipart/form-data"
      role="form">
      <div class="form-group mb-3">
        <label class="form-label">Quantidade*</label>
        <?php
        if (isset($linha->errors)) {
          echo "<span class='alerta'>";
          if (is_array($linha->errors->on('quantidade'))) {
            echo $linha->errors->on('quantidade')[0];
          } else {
            echo $linha->errors->on('quantidade');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="quantidade"
          value="<?php if (isset($linha->quantidade)) echo $linha->quantidade ?>">
      </div>

      <div class="form-group mb-3">
        <label class="form-label">Produto*</label>
        <?php
          if (isset($linha->errors)) {
            echo "<span class='alerta'>";
            if (is_array($linha->errors->on('role'))) {
              echo $linha->errors->on('role')[0];
            } else {
              echo $linha->errors->on('role');
            }
            echo '</span>';
          }
          ?>
        <br>
        <select name="produto_id">
          <?php foreach($produtos as $produto){?>
          <option value="<?= $produto->id ?>"> <?= $produto->descricao ?></option>
          <?php } ?>
        </select>
      </div>
      <hr style="margin-top: 30px;margin-bottom: 10px;">
      <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i
            class="fas fa-save"></i>&nbsp;Guardar</button></div>
    </form>
  </div>
</section>