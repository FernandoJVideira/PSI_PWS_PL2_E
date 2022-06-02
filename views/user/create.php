    <section class="clean-block clean-form dark h-100">
        <div class="container">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="">Registo de Utilizadores</h2>
                <p></p>
            </div>
            <form action="router.php?r=user/store" method="post" enctype="multipart/form-data" role="form">
                <div class="form-group mb-3">
                  <label class="form-label">Username*</label>
                  <input class="form-control" type="text" name="username" required="">
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Password*</label>
                  <input class="form-control" type="password" name="password" required=""></div>
                <div class="form-group mb-3">
                  <label class="form-label">Email*</label>
                  <input class="form-control" type="email" name="email" required="">
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Telemóvel*</label>
                  <input class="form-control" type="tel" name="telemovel" required="">
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Nif*</label>
                  <input class="form-control" type="text" name="nif" required="">
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Morada*</label>
                  <input class="form-control" type="text" name="morada" required="">
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Código-Postal*</label>
                  <input class="form-control" type="text" name="codPostal" required="">
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Localidade*</label>
                  <input class="form-control" type="text" name="localidade" required="">
                </div>
                <div class="form-group mb-3">
                  <label class="form-label">Tipo de Utilizador*</label>
                  <br>
                  <select name="type_user" >
                    <option value="cliente">Cliente</option>
                    <option value="funcionario">Funcionário</option>
                    <option value="administrador">Administrador</option>
                  </select>
                </div>
                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <div class="form-group mb-3"><button class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i>&nbsp;Guardar</button></div>
            </form>
        </div>
    </section>
