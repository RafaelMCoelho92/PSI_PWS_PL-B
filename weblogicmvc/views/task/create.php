<div class="container">
    <main>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Registe uma nova Task</h4>
                <h6 class="mb-3">Preencha todos os campos!</h6>
                <form class="needs-validation" action="index.php?c=task&a=store" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="done">Feita</label><br>
                            <select class="form-control" name="done">
                                <?php $opcoes = array('Sim', 'Não') ?>
                                <?php foreach ($opcoes as $opcao) { ?>
                                    <option value="<?= $opcao ?>"> <?= $opcao; ?></option>
                                <?php } ?>
                            </select>
                            <p><?php if (isset($task->errors)) {
                                    echo $task->errors->on('done');
                                } ?></p>
                            <div class="invalid-feedback">
                                Campo Obrigatorio!
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Descrição</label><br>
                            <input type="text" class="form-control" name="description" value="<?php if (isset($task)) {
                                                                                                echo $task->description;
                                                                                            } ?>" placeholder="Descrição" required>
                            <p>
                                <?php
                                if (isset($task->errors)) {
                                    if (is_array($task->errors->on('description'))) {
                                        foreach ($task->errors->on('description') as $error) {
                                            echo $error . '<br>';
                                        }
                                    } else {
                                        echo $task->errors->on('description');
                                    }
                                }
                                ?>
                            </p>
                        </div>
                        
                        <div class="col-12">
                            <input type="submit" value="Criar" class="btn btn-primary">
                            <a href='index.php?c=task&a=index' class="btn btn-info">Voltar ao Index das Tasks</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>