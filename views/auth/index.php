<section class="clean-block clean-form dark h-100">
    <div class="content-wrapper">
        <div class="block-heading" style="padding-top: 0px;">
            <h2 class="text-primary">Login</h2>
            <p></p>
        </div>
        <form action="router.php?r=auth/login" method="post" class="needs-validation row justify-content-center" novalidate>
            <div class="form-group mb-3">
                <label for="inputUsername" class="form-label">Username:</label>
                <?php
                if (isset($erro)) {
                    echo "<span class='alerta'>";
                    echo "Username ou password incorretos!";
                    echo '</span>';
                }
                ?>
                <input type="text" class="form-control" id="inputUsername" name="username" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="inputPassword" class="form-label">Password:</label>
                <input type="password" class="form-control" id="inputPassword" name="password" required>
                <div class="invalid-feedback">
                    Campo obrigatório!
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</section>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>