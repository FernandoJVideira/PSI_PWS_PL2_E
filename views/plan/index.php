    <div class="container">
        <form action="router.php?r=plan/index" method="post" class="needs-validation row justify-content-center" novalidate>
            <div class="col col-6">
                <div class="mb-3">
                    <label for="inputMontante" class="form-label">Montante:</label>
                    <input type="text" class="form-control" id="inputMontante" name="montante" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputNumero" class="form-label">Número de Prestações:</label>
                    <input type="text" class="form-control" id="inputNumero" name="numero" required>
                    <div class="invalid-feedback">
                        Campo obrigatório!
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Preview</button>
            </div>
        </form>
    </div>
    
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'
    
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
    
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
    
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>