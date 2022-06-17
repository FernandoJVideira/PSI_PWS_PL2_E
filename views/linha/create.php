<section class="clean-block clean-form dark h-100">
  <div class="container">
    <div class="block-heading" style="padding-top: 0px;">
      <h2 class="text-primary">Linha Fatura</h2>
      <p></p>
    </div>
    <form action="router.php?r=linha/store&id=<?= $fatura->id ?>" method="post" enctype="multipart/form-data" role="form">
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
        <input class="form-control" type="text" name="quantidade" value="<?php if (isset($linha->quantidade)) echo $linha->quantidade ?>">
      </div>

      <div class="form-group mb-3">
        <label class="form-label">Referencia do produto*</label>
        <?php
        if (isset($_GET['erro'])) {
          echo "<span class='alerta'>";
          echo "Referencia não encontrada!";
          echo '</span>';
        }
        if (isset($linha->errors)) {
          echo "<span class='alerta'>";
          if (is_array($linha->errors->on('referencia'))) {
            echo $linha->errors->on('referencia')[0];
          } else {
            echo $linha->errors->on('referencia');
          }
          echo '</span>';
        }
        ?>
        <br>
        <input class="form-control" type="text" name="referencia" value="<?php if (isset($produto)) echo $produto->referencia ?>">
      </div>
      <hr style="margin-top: 30px;margin-bottom: 10px;">
      <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button></div>
      <a href="router.php?r=linha/pesquisa&id=<?= $_GET['id'] ?>" class="btn btn-info" role="button">Pesquisa</a>
    </form>
  </div>
</section>