<h2 class="text-left top-space">Book Index</h2>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table tablestriped">
            <thead>
                <th>
                    <h3>Id</h3>
                </th>
                <th>
                    <h3>Name</h3>
                </th>
                <th>
                    <h3>ISBN</h3>
                </th>
                <th>
                    <h3>Genre</h3>
                </th> 
                <th>
                    <h3>User Actions</h3>
                </th>
            </thead>
            <tbody>
                <?php foreach ($books as $book) { ?>
                <tr>
                    <td><?=$book->id?></td>
                    <td><?=$book->name?></td>
                    <td><?=$book->isbn?></td>
                    <td><?= $book->genre->name ?></td>
                    <td>
                        <a href="router.php?r=book/show&id=<?=$book->id ?>" class="btn btn-info"
                            role="button">Show</a>
                        <a href="router.php?r=chapter/index&id=<?=$book->id ?>" class="btn btn-info" 
                            role="button">Chapters</a>
                        <a href="router.php?r=book/edit&id=<?=$book->id ?>" class="btn btn-info"
                            role="button">Edit</a>
                        <a href="router.php?r=book/destroy&id=<?=$book->id ?>" class="btn btn-warning"
                            role="button">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Create a new Book</h3>
        <p>
            <a href="router.php?r=book/create" class="btn btn-info" role="button">New</a>
        </p>
    </div>
</div>