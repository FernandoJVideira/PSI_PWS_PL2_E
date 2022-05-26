<div class="container">
    <main>
        <form action="router.php?r=chapter/store" method="post" class="needs-validation row justify-content-center">
            <div class="row gy-3">
                <div class="col-md-6">
                    <input type="hidden" name="book_id" value="<?= $id ?>">
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">Chapter Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <button class="w-100 btn btn-primary btn-lg" type="submit">go</button>
        </form>
    </main>
</div>