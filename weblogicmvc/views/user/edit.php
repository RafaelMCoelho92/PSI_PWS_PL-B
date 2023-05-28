<h1 class="text-left top-space">Detalhe utilizadores <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
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
                                                                                    } ?>" name="email" id="email" required >
                        <?php if (isset($user->errors)) {
                            echo $user->errors->on('email');
                        } ?></td>
                    <td><input id="telefone" placeholder="telefone" type="text" value="<?php if (isset($user)) {
                                                                                            echo $user->telefone;
                                                                                        } ?>" name="telefone" id="telefone"required>
                        <?php if (isset($user->errors)) {
                            echo $user->errors->on('telefone');
                        } ?></td>
                    <td><input id="nif" placeholder="nif" type="text" value="<?php if (isset($user)) {
                                                                                    echo $user->nif;
                                                                                } ?>" name="nif" id="nif" required>
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
                    <?php if (isset($user->errors)) {
                        echo $user->errors->on('nif');
                    } ?></td>
                    <td><input id="morada" placeholder="morada" type="text" value="<?php if (isset($user)) {
                                                                                        echo $user->morada;
                                                                                    } ?>" name="morada" id="morada" required>
                        <?php if (isset($user->errors)) {
                            echo $user->errors->on('morada');
                        } ?></td>
                    <td><input id="codigopostal" placeholder="codigopostal" type="text" value="<?php if (isset($user)) {
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
                        } ?></td>
                    <?php $funcoes = array('Cliente', 'Funcionario', 'Admin') ?>
                    <td><input id="role" placeholder="role" type="text" value="<?php if (isset($user)) {
                                                                                    echo $user->role;
                                                                                } ?>" name="role" id="role"required>
                        <?php if (isset($user->errors)) {
                            echo $user->errors->on('role');
                        } ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Voltar index</h3>
        <p>
            <a href="index.php?c=user&a=index" class="btn btn-info" role="button">Voltar</a>
        </p>
    </div>
</div>