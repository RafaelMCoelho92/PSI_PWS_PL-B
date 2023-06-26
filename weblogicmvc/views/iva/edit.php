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


                    <td> <input class="form-control" type="text" name="descricao" value="<?php if (isset($iva)) {
                                                                                                echo $iva->descricao;
                                                                                            } ?>" required>
                        <p>

                    </td>

                    <td><input class="form-control" name="percentagem" id="percentagem" placeholder="percentagem" type="number" step="0.01" value="<?php if (isset($iva)) {
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
</div>