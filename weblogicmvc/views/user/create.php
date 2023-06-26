<div class="container">
  <main>
    <div class="row g-5">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Novo utilizador</h4>
        <h6 class="mb-3">Preencha todos os campos!</h6>
        <form class="needs-validation" action="index.php?c=user&a=store" method="POST">
          <div class="row g-3">

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" placeholder="Username" value="<?php if (isset($user)) {
                                                                                        echo $user->username;
                                                                                      } ?>" name="username" id="username" required>
                <?php if (isset($user->errors)) {
                  echo $user->errors->on('username');
                } ?>
              </div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" placeholder="password" value="<?php if (isset($user)) {
                                                                                          echo $user->password;
                                                                                        } ?>" name="password" id="password" required="">
              <p><?php if (isset($user->errors)) {
                    echo $user->errors->on('password');
                  } ?></p>
              <div class="invalid-feedback">
                Campo Obrigatorio!
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-body-secondary">(Opcional)</span></label>
              <input type="email" class="form-control" placeholder="seuemail@exemplo.com" value="<?php if (isset($user)) {
                                                                                                    echo $user->email;
                                                                                                  } ?>" name="email" id="email" required>
              <p><?php if (isset($user->errors)) {
                    echo $user->errors->on('email');
                  } ?></p>
              <div class="invalid-feedback">
                Porfavor insira um email.
              </div>
            </div>

            <div class="col-12">
              <label for="morada" class="form-label">Morada</label>
              <input type="text" class="form-control" placeholder="Rua do Castelo de Leiria" required="" value="<?php if (isset($user)) {
                                                                                                                  echo $user->morada;
                                                                                                                } ?>" name="morada" id="morada">
              <p><?php if (isset($user->errors)) {
                    echo $user->errors->on('morada');
                  } ?></p>
              <div class="invalid-feedback">
                Porfavor insira a sua morada.
              </div>
            </div>

            <div class="col-md-6">
              <label for="localidade" class="form-label">Localidade</label>
              <input type="text" class="form-control" placeholder="Leiria" required="" value="<?php if (isset($user)) {
                                                                                                echo $user->localidade;
                                                                                              } ?>" name="localidade" id="localidade">
              <p><?php if (isset($user->errors)) {
                    echo $user->errors->on('localidade');
                  } ?></p>
              <div class="invalid-feedback">
                Campo Obrigatorio!
              </div>
            </div>

            <div class="col-md-3">
              <label for="codigopostal" class="form-label">Codigo Postal</label>
              <input type="text" class="form-control" placeholder="" required="" value="<?php if (isset($user)) {
                                                                                          echo $user->codigopostal;
                                                                                        } ?>" name="codigopostal" id="codigopostal">
              <p><?php if (isset($user->errors)) {
                    echo $user->errors->on('codigopostal');
                  } ?></p>
              <div class="invalid-feedback">
                Campo Obrigatorio!
              </div>
            </div>

            <div class="col-md-3">
              <label for="telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" placeholder="" required="" value="<?php if (isset($user)) {
                                                                                          echo $user->telefone;
                                                                                        } ?>" name="telefone" id="telefone">
              <p><?php if (isset($user->errors)) {
                    echo $user->errors->on('telefone');
                  } ?></p>
              <div class="invalid-feedback">
                Campo Obrigatorio!
              </div>
            </div>
            <div class="col-md-3">
              <label for="nif" class="form-label">NIF</label>
              <input type="text" class="form-control" placeholder="" required="" value="<?php if (isset($user)) {
                                                                                          echo $user->nif;
                                                                                        } ?>" name="nif" id="nif">
              <p><?php if (isset($user->errors)) {
                    echo $user->errors->on('nif');
                  } ?></p>
              <div class="invalid-feedback">
                Campo Obrigatorio!
              </div>
            </div>

            <div class="col-md-3">
              <label for="role">Role</label><br>
              <select class="form-select" name="role">
              <?php $auth = $_SESSION['role'];?>
                <?php if ($auth == "Admin") {
                  $roles = array('Cliente', 'Funcionario', 'Admin');
                } elseif ($auth == "Funcionario") {
                  $roles = array('Cliente');
                } ?>

                <?php foreach ($roles as $role) { ?>
                  <option value="<?= $role ?>"> <?= $role; ?></option>
                <?php } ?>
              </select>
              <p><?php if (isset($user->errors)) {
                    echo $user->errors->on('role');
                  } ?></p>
              <div class="invalid-feedback">
                Campo Obrigatorio!
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Registar</button>
        </form>
      </div>
    </div>
  </main>


</div>