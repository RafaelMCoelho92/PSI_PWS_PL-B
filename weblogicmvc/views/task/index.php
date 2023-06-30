<h1 class="text-left top-space">Tasks - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>


<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <h3>Descrição</h3>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task) { ?>
                    <tr>

                        <?php if ($task->done == 'Sim') {
                        ?>
                            <td name="description" value="<?= $task->description ?>"><strike><?= $task->description ?></strike></td>
                            
                        <?php } else { ?>
                            
                            <td name="description" value="<?= $task->description ?>"><?= $task->description ?></td>
                            
                        <?php } ?>
                        <td>
                            
                        <?php if ($task->done == 'Sim') {
                            //echo '<td class="btn btn-success">Ativo</td>';
                        ?><td>
                                <form action="index.php?c=task&a=update&id=<?= $task->id; ?>" method="POST">
                                    <button type="submit" name="done" value="Não" class="btn btn-warning">Marcar Como não Realizada</button>
                                </form>
                            </td>
                        <?php } else { ?>
                            <td>
                                <form action="index.php?c=task&a=update&id=<?= $task->id; ?>" method="POST">
                                    <button type="submit" name="done" value="Sim" class="btn btn-success">Marcar Como Realizada</button>
                                </form>
                            </td>
                        <?php } ?>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <div class="container">
    <main>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Registe uma nova Task</h4>
                <form class="needs-validation" action="index.php?c=task&a=store" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                           
                            <p><?php if (isset($task->errors)) {
                                    echo $task->errors->on('done');
                                } ?></p>
                            <div class="invalid-feedback">
                                Campo Obrigatorio!
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Descrição</label><br>
                            <input type="text" class="form-control" name="description" value="" placeholder="Descrição" required>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
</div>