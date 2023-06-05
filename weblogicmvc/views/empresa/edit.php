<p>
<h1 class="text-left top-space">Dados Empresa</h1>
<h4><?= APP_NAME ?></h4>
</p>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-6">
        <table class="table table-striped ">
            <form action="index.php?c=empresa&a=update&id=<?= $empresa->id ?>" method="post">


                <tbody>
                    <th>
                        <a href="index.php?c=reservado&a=admin" class="btn btn-info" role="button">Voltar</a>
                    </th>
                    <th></th>
                    <tr>
                        <th>
                            <h6>Designação Social</h6>
                        </th>
                        <td><input id="designacaosocial" placeholder="designacaosocial" type="text" value="<?php if (isset($empresa)) {
                                                                                                                echo $empresa->designacaosocial;
                                                                                                            } ?>" name="designacaosocial" id="designacaosocial"><!-- required  tbm-->
                            <?php if (isset($empresa->errors)) {
                                echo $empresa->errors->on('designacaosocial');
                            } ?></td>
                    </tr>
                    <tr>

                        <th>
                            <h6>Email</h6>
                        </th>
                        <td><input id="email" placeholder="email" type="text" value="<?php if (isset($empresa)) {
                                                                                            echo $empresa->email;
                                                                                        } ?>" name="email" id="email"><!-- required  tbm-->
                            <?php if (isset($empresa->errors)) {
                                echo $empresa->errors->on('email');
                            } ?></td>
                    </tr>
                    <tr>
                        <th>
                            <h6>Telefone</h6>
                        </th>
                        <td><input id="telefone" placeholder="telefone" type="text" value="<?php if (isset($empresa)) {
                                                                                                echo $empresa->telefone;
                                                                                            } ?>" name="telefone" id="telefone"><!-- required  tbm-->
                            <?php if (isset($empresa->errors)) {
                                echo $empresa->errors->on('telefone');
                            } ?></td>
                    </tr>
                    <tr>
                        <th>
                            <h6>NIF</h6>
                        </th>
                        <td><input id="nif" placeholder="nif" type="text" value="<?php if (isset($empresa)) {
                                                                                        echo $empresa->nif;
                                                                                    } ?>" name="nif" id="nif"><!-- required  tbm-->
                            <?php if (isset($empresa->errors)) {
                                echo $empresa->errors->on('nif');
                            } ?></td>
                    </tr>
                    <tr>
                        <th>
                            <h6>Morada</h6>
                        </th>
                        <td><input id="morada" placeholder="morada" type="text" value="<?php if (isset($empresa)) {
                                                                                            echo $empresa->morada;
                                                                                        } ?>" name="morada" id="morada"><!-- required  tbm-->
                            <?php if (isset($empresa->errors)) {
                                echo $empresa->errors->on('morada');
                            } ?></td>
                    </tr>
                    <tr>
                        <th>
                            <h6>Codigo Postal</h6>
                        </th>
                        <td><input id="codigopostal" placeholder="codigopostal" type="text" value="<?php if (isset($empresa)) {
                                                                                                        echo $empresa->codigopostal;
                                                                                                    } ?>" name="codigopostal" id="codigopostal"><!-- required  tbm-->
                            <?php if (isset($empresa->errors)) {
                                echo $empresa->errors->on('codigopostal');
                            } ?></td>
                    </tr>
                    <tr>
                        <th>
                            <h6>Localidade</h6>
                        </th>
                        <td><input id="localidade" placeholder="localidade" type="text" value="<?php if (isset($empresa)) {
                                                                                                    echo $empresa->localidade;
                                                                                                } ?>" name="localidade" id="localidade"><!-- required  tbm-->
                            <?php if (isset($empresa->errors)) {
                                echo $empresa->errors->on('localidade');
                            } ?></td>
                    </tr>
                    <tr>
                        <th>
                            <h6>Capital Social</h6>
                        </th>
                        <td><input id="capitalsocial" placeholder="capitalsocial" type="text" value="<?php if (isset($empresa)) {
                                                                                                            echo $empresa->capitalsocial;
                                                                                                        } ?>" name="capitalsocial" id="capitalsocial"><!-- required  tbm-->
                            <?php if (isset($empresa->errors)) {
                                echo $empresa->errors->on('capitalsocial');
                            } ?></td>
                    </tr>
                    <tr><th></th>
                    <th>
                        <button class="btn btn-success" type="submit">Alterar dados</button>
                    </th>
                    </tr>
                </tbody>
            </form>
        </table>
    </div>
</div>