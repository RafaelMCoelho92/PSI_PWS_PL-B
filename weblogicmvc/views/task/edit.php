<h1 class="text-left top-space">Editar Task - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <form action="index.php?c=task&a=update&id=<?= $task->id ?>" method="POST">
            <table class="table table-striped">
                <thead>
                    <th>
                        <h3>TASK DONE</h3>
                    </th>
                    <th>
                        <h3>Descrição</h3>
                    </th>

                </thead>
                <tbody>
                    <td>
                        <select class="form-control" name="done">
                            <?php
                            $opcoes = array('Sim', 'Não');

                            foreach ($opcoes as $opcao) {
                                if ($opcao == $task->done) { ?>
                                    <option value="<?= $opcao ?>" selected><?= $opcao ?></option>
                                <?php } else { ?>
                                    <option value="<?= $opcao ?>"><?= $opcao ?></option>
                            <?php }
                            } ?>
                        </select>
                    </td>


                    <td> <input class="form-control" type="text" name="description" value="<?php if (isset($task)) {
                                                                                                echo $task->description;
                                                                                            } ?>" required>
                        <p>

                    </td>


                    </td>

                </tbody>
            </table>
            <button class="btn btn-warning" type="submit">Confirmar Alteração</button>
        </form>
    </div>
    <div class="col-sm-6">
        <p>
            <a href="index.php?c=task&a=index" class="btn btn-info">Voltar aos tasks</a>
        </p>
    </div>
</div>