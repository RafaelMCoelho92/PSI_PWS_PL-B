<h1 class="text-left top-space">Detalhe da Task do  - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <th>
                    <h3>Done</h3>
                </th>
                <th>
                    <h3>Descrição</h3>
                </th>
            </thead>
            <tbody>
                <tr>
                    <td><?= $task->done ?></td>
                    <td><?= $task->description ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <p>
            <a href="index.php?c=task&a=index" class="btn btn-info">Voltar as TASKS</a>
        </p>
    </div>
</div>