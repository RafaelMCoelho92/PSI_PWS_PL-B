<h1 class="text-left top-space">Detalhe Serviço - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="index.php?c=service&a=update&id=<?= $service->id ?>" method="POST">
            <table class="table table-striped">
                <thead>
                    <th>
                        <h3>Referência</h3>
                    </th>
                    <th>
                        <h3>Descrição</h3>
                    </th>
                    <th>
                        <h3>Preço/Hora</h3>
                    </th>
                    <th>
                        <h3>IVA</h3>
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="form-control" type=" text" name="referencia" value="<?php if (isset($service)) {
                                                                                                    echo $service->referencia;
                                                                                                } ?>" placeholder="Referência">
                            <?php if (isset($service->errors)) {
                                echo $service->errors->on('referencia');
                            } ?>
                        </td>
                        <td> <input class="form-control" type="text" name="descricao" value="<?php if (isset($service)) {
                                                                                                    echo $service->descricao;
                                                                                                } ?>" placeholder="Descrição">
                            <?php if (isset($service->errors)) {
                                echo $service->errors->on('descricao');
                            } ?>
                        </td>
                        <td><input class="form-control" id="precohora" placeholder="Preço / Hora" type="text" value="<?php if (isset($service)) {
                                                                                                                            echo $service->precohora;
                                                                                                                        } ?>" name="precohora" id="precohora" required>
                            <?php if (isset($service->errors)) {
                                echo $service->errors->on('precohora');
                            } ?>
                        </td>
                        <td><select class="form-control" name="iva_id">
                                <?php
                                $iva = array('6%', '13%', '23%');

                                foreach ($ivas as $iva) { ?>
                                    <?php if ($iva->id == $service->iva_id) { ?>
                                        <option value="<?= $iva->id ?>" selected><?= $iva->descricao;
                                                                                    ?> </option>
                                    <?php } else { ?>
                                        <option value="<?= $iva->id ?>"> <?= $iva->descricao;
                                                                            ?></option>
                                <?php }
                                } ?>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-warning" type="submit">Confirmar Alteração</button>
        </form>
    </div>
    <div class="col-sm-6">
        <p>
            <a href="index.php?c=service&a=index" class="btn btn-info">Voltar aos Serviços</a>
        </p>
    </div>
</div>