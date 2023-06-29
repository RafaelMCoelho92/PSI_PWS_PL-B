<h1 class="text-left top-space">Detalhe utilizadores <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="index.php?c=user&a=update&id=<?= $user->id ?>" method="post">
            <table class="table table-striped">
                <thead>
                    <th>
                        <h3>Nome</h3>
                    </th>
                    <th>
                        <h3>Email</h3>
                    </th>
                    <th>
                        <h3>Telefone</h3>
                    </th>
                    <th>
                        <h3>NIF</h3>
                    </th>

                    <tr>
                        <td><input id="username" placeholder="username" type="text" value="<?php if (isset($user)) {
                                                                                                echo $user->username;
                                                                                            } ?>" name="username" id="username" required>
                            <?php if (isset($user->errors)) {
                                echo $user->errors->on('username');
                            } ?></td>
                        <td><input id="email" placeholder="email" type="text" value="<?php if (isset($user)) {
                                                                                            echo $user->email;
                                                                                        } ?>" name="email" id="email" required>
                            <?php if (isset($user->errors)) {
                                echo $user->errors->on('email');
                            } ?></td>
                        <td><input id="telefone" placeholder="telefone" min="0" type="number" value="<?php if (isset($user)) {
                                                                                                            echo $user->telefone;
                                                                                                        } ?>" name="telefone" id="telefone" required>
                            <?php if (isset($user->errors)) {
                                echo $user->errors->on('telefone');
                            } ?></td>
                        <td><input id="nif" placeholder="nif" min="0" type="number" value="<?php if (isset($user)) {
                                                                                                echo $user->nif;
                                                                                            } ?>" name="nif" id="nif" required>
                            <!-- estava a dar erro neste codigo por supostamente estava a retomar o nif 
                                                                    como uma array e nao numa strings -->
                            <?php if (isset($user->errors)) {
                                echo $user->errors->on('nif');
                            }  ?>
                        </td>


                    </tr>

                    <th>
                        <h3>Morada</h3>
                    </th>
                    <th>
                        <h3>Codigo Postal</h3>
                    </th>
                    <th>
                        <h3>Localidade</h3>
                    </th>
                    <th>
                        <h3>Role</h3>
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td><input id="morada" placeholder="morada" type="text" value="<?php if (isset($user)) {
                                                                                            echo $user->morada;
                                                                                        } ?>" name="morada" id="morada" required>
                            <?php if (isset($user->errors)) {
                                echo $user->errors->on('morada');
                            } ?></td>
                        <td><input id="codigopostal" placeholder="codigopostal" min="0" type="number" value="<?php if (isset($user)) {
                                                                                                                    echo $user->codigopostal;
                                                                                                                } ?>" name="codigopostal" id="codigopostal" required>
                            <?php if (isset($user->errors)) {
                                echo $user->errors->on('codigopostal');
                            } ?></td>
                        <td><input id="localidade" placeholder="localidade" type="text" value="<?php if (isset($user)) {
                                                                                                    echo $user->localidade;
                                                                                                } ?>" name="localidade" id="localidade" required>
                            <?php if (isset($user->errors)) {
                                echo $user->errors->on('localidade');
                            } ?>
                        </td>

                        <td>
                            <div class="col-md-3">
                                <select class="form-select" name="role">
                                    <?php $auth = $auth->getRole(); ?>
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

                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btns" type="submit">Confirmar Alteração</button>
        </form>
    </div>
    <div class="col-sm-6">
        <h3>Voltar index</h3>
        <p>
            <a href="index.php?c=user&a=index" class="btn btn-info" role="button">Voltar</a>
        </p>
    </div>
</div>