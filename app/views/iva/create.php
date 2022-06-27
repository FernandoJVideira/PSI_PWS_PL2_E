<section class="clean-block clean-form dark h-100">
  <div class="container">
    <div class="block-heading" style="padding-top: 0px;">
      <h2 class="text-primary">Registo de Ivas</h2>
      <p></p>
    </div>
    <form action="router.php?r=iva/store" method="post" enctype="multipart/form-data" role="form">
      <div class="form-group mb-3">
        <label class="form-label">Percentagem</label>
        <?php
        if (isset($iva->errors)) {
          echo "<span class='alerta'>";
          if (is_array($iva->errors->on('percentagem'))) {
            echo $iva->errors->on('percentagem')[0];
          } else {
            echo $iva->errors->on('percentagem');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="percentagem" value="<?php if (isset($iva->percentagem)) echo $iva->percentagem ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Descrição</label>
        <?php
        if (isset($iva->errors)) {
          echo "<span class='alerta'>";
          if (is_array($iva->errors->on('descricao'))) {
            echo $iva->errors->on('descricao')[0];
          } else {
            echo $iva->errors->on('descricao');
          }
          echo '</span>';
        }
        ?>
        <input class="form-control" type="text" name="descricao" value="<?php if (isset($iva->descricao)) echo $iva->descricao ?>">
      </div>
      <div class="form-group mb-3">
        <label class="form-label">Em Vigor</label>
        <?php
        if (isset($iva->errors)) {
          echo "<span class='alerta'>";
          if (is_array($iva->errors->on('em_vigor'))) {
            echo $iva->errors->on('em_vigor')[0];
          } else {
            echo $iva->errors->on('em_vigor');
          }
          echo '</span>';
        }
        ?>
        <br>
        <select name="em_vigor">
          <option value='true' <?php if (isset($iva->em_vigor)) if ($iva->em_vigor  ==  true) echo "selected" ?>>Sim</option>
          <option value='false' <?php if (isset($iva->em_vigor)) if ($iva->em_vigor  ==  false) echo "selected" ?>>Não</option>
        </select>
      </div>
      <hr style="margin-top: 30px;margin-bottom: 10px;">
      <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button></div>
    </form>
  </div>
</section>