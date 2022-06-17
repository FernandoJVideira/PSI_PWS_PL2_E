<section class="clean-block clean-form dark h-100">
  <div class="container">
    <div class="block-heading" style="padding-top: 0px;">
      <h2 class="text-primary">Registo de Produtos</h2>
      <p></p>
    </div>
    <form action="router.php?r=produto/store" method="post" enctype="multipart/form-data" role="form">
      <div class="form-group mb-3">
        <label class="form-label">Referência*</label>
        <?php
        if (isset($produto->errors)) {
          echo "<span class='alerta'>";
          if (is_array($produto->errors->on('referencia'))) {
            echo $produto->errors->on('referencia')[0];
          } else {
            echo $produto->errors->on('referencia');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="referencia" value="<?php if (isset($produto->referencia)) echo $produto->referencia ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Nome Produto*</label>
        <?php
        if (isset($produto->errors)) {
          echo "<span class='alerta'>";
          if (is_array($produto->errors->on('descricao'))) {
            echo $produto->errors->on('descricao')[0];
          } else {
            echo $produto->errors->on('descricao');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="descricao" value="<?php if (isset($produto->descricao)) echo $produto->descricao ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Preço Unitário*</label>
        <?php
        if (isset($produto->errors)) {
          echo "<span class='alerta'>";
          if (is_array($produto->errors->on('preco_unid'))) {
            echo $produto->errors->on('preco_unid')[0];
          } else {
            echo $produto->errors->on('preco_unid');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="preco_unid" value="<?php if (isset($produto->preco_unid)) echo $produto->preco_unid ?>">
      </div>
      <div class="form-group mb3">
        <label class="form-label">Taxa de Iva*</label>
        <br>
        <select name="iva_id">
          <?php if (is_array($ivas)) {
            foreach ($ivas as $iva) {
              echo '<option value="' . $iva->id . '">' . $iva->percentagem . '</option>';
            }
          } else {
            echo '<option value="' . $ivas->id . '">' . $ivas->percentagem . '</option>';
          } ?>
        </select>
      </div>
      <br>
      <div class="form-group mb-3">
        <label class="form-label">Quantidade em Stock*</label>
        <?php
        if (isset($produto->errors)) {
          echo "<span class='alerta'>";
          if (is_array($produto->errors->on('quant_stock'))) {
            echo $produto->errors->on('quant_stock')[0];
          } else {
            echo $produto->errors->on('quant_stock');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="quant_stock" value="<?php if (isset($produto->quant_stock)) echo $produto->quant_stock ?>">
      </div>
      <hr style="margin-top: 30px;margin-bottom: 10px;">
      <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button></div>
    </form>
  </div>
</section>