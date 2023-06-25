<h1 class="text-left top-space">Editar IVA - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="index.php?c=iva&a=update&id=<?= $iva->id ?>" method="POST">
            <table class="table table-striped">
                <thead>
                    <th>
                        <h3>IVA em Vigor</h3>
                    </th>
                    <th>
                        <h3>Descrição</h3>
                    </th>
                    <th>
                        <h3>Percentagem</h3>
                </thead>
                <tbody>
                    <td>
                        <select class="form-control" name="emvigor">
                            <?php
                            $opcoes = array('Sim', 'Não');

                            foreach ($opcoes as $opcao) {
                                if ($opcao == $iva->emvigor) { ?>
                                    <option value="<?= $opcao ?>" selected><?= $opcao ?></option>
                                <?php } else { ?>
                                    <option value="<?= $opcao ?>"><?= $opcao ?></option>
                            <?php }
                            } ?>
                        </select>
                    </td>


                    <td> <input class="form-control" type="text" name="descricao" value="<?php if (isset($service)) {
                                                                                                echo $service->descricao;
                                                                                            } ?>" placeholder="Descição">

                    </td>

                    <td><input class="form-control" id="percentagem" placeholder="percentagem" type="number" step="0.01" value="<?php if (isset($iva)) {
                                                                                                                                    echo $iva->percentagem;
                                                                                                                                } ?>" placeholder="percentagem">
                        <?php if (isset($iva->errors)) {
                            echo $iva->errors->on('percentagem');
                        } ?>
                    </td>
                    </td>

                </tbody>
            </table>
            <button class="btn btn-warning" type="submit">Confirmar Alteração</button>
        </form>
    </div>
    <div class="col-sm-6">
        <p>
            <a href="index.php?c=iva&a=index" class="btn btn-info">Voltar aos Ivas</a>
        </p>
    </div>
=======
<div class="container">
    <main>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Editar IVA</h4>
                <h6 class="mb-3">Preencha todos os campos!</h6>
                <form class="needs-validation" action="index.php?c=iva&a=update&id=<?php echo $iva->id; ?>" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="emvigor">Em Vigor</label><br>
                            <select class="form-control" name="emvigor">
                                <?php $opcoes = array('Sim', 'Não') ?>
                                <?php foreach ($opcoes as $opcao) { ?>
                                    <option value="<?= $opcao ?>"> <?= $opcao; ?></option>
                                <?php } ?>
                            </select>
                            <p><?php if (isset($iva->errors)) {
                                    echo $iva->errors->on('emvigor');
                                } ?></p>
                            <div class="invalid-feedback">
                                Campo Obrigatorio!
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="descricao" class="form-label">Descrição</label><br>
                            <input type="text" class="form-control" name="descricao" value="<?php if (isset($iva)) {
                                                                                                echo $iva->descricao;
                                                                                            } ?>"  required>
                            <p>
                                <?php
                                if (isset($iva->errors)) {
                                    if (is_array($iva->errors->on('descricao'))) {
                                        foreach ($iva->errors->on('descricao') as $error) {
                                            echo $error . '<br>';
                                        }
                                    } else {
                                        echo $iva->errors->on('descricao');
                                    }
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-12">
                            <label for="percentagem" class="form-label">Percentagem</label><br>
                            <input type="text" class="form-control" name="percentagem" value="<?php if (isset($iva)) {
                                                                                                    echo $iva->percentagem;
                                                                                                } ?>" placeholder="Percentagem" required>
                            <p>
                                <?php
                                if (isset($iva->errors)) {
                                    if (is_array($iva->errors->on('percentagem'))) {
                                        foreach ($iva->errors->on('percentagem') as $error) {
                                            echo $error . '<br>';
                                        }
                                    } else {
                                        echo $iva->errors->on('percentagem');
                                    }
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Atualizar" class="btn btn-primary">
                            <a href='index.php?c=iva&a=index' class="btn btn-info">Voltar aos IVAs</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
>>>>>>> main
</div>