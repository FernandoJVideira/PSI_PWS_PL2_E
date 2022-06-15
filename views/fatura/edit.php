<h2 class="text-left top-space">Fatura</h2>
<h2 class="top-space"></h2>
<div class="content-wrapper">

    <select name="cliente_id">
        <?php if(is_array($users)){
            foreach($users as $user){ ?>
                <option value="<?= $user->id ?>"<?php if($user->id == $fatura->cliente_id) echo"selected"; ?>> <?= $user->username ?></option>';
            <?php }
        } 
        else{
            echo '<option value="'.$users->id.'">'.$users->username.'</option>';
        }?>
    </select>

     <input class="form-control" type="text" name="data" value="<?= date("d-m-Y") ?>">

    <table class="table table-striped">
        <thead>
            <th>
                <h3>Produto</h3>
            </th>
            <th>
                <h3>Quantidade</h3>
            </th>
            <th>
                <h3>Actions</h3>
            </th>
        </thead>
        <tbody>
            <?php foreach ($linhas as $linha) { 
                $produto = Produto::find([$linha->produto_id]);
                ?>
            <tr>
                <td><?= $produto->descricao ?></td>
                <td><?= $linha->quantidade ?></td>
                <td>
                    <a href="router.php?r=linha/delete&id=<?= $linha->id ?>" class="btn btn-warning"
                        role="button">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="router.php?r=linha/create&id=<?= $fatura->id?>" class="btn btn-warning" role="button">Nova Linha</a>
</div>