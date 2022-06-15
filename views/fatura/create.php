<h2 class="text-left top-space">Fatura</h2>
<h2 class="top-space"></h2>
<div class="content-wrapper">

<form action="router.php?r=fatura/store" method="post" enctype="multipart/form-data" role="form">
    <select name="cliente_id">
        <?php if(is_array($users)){
            foreach($users as $user){
                echo '<option value="'.$user->id.'">'.$user->username.'</option>';
            }
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

        </tbody>
    </table>
    <div class="form-group mb-3"><button class="btn btn-warning" type="submit">Nova Linha</button></div>
</form>
</div>