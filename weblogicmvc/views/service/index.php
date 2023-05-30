<h1 class="text-left top-space">Serviços Prestados <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <a href='index.php?c=user&a=create'> Registar novo Serviço </a>

    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <th>
                    <h3>Referencia</h3>
                </th>
                <th>
                    <h3>Descricao</h3>
                </th>
                <th>
                    <h3>Preço/Hora</h3>
                </th>
            </thead>
            <tbody>
                <?php foreach ($services as $service) { ?>
                    <tr>
                        <td><?= $service->referencia ?></td>
                        <td><?= $service->descricao ?></td>
                        <td><?= $service->precohora ?></td>
                        <td>
                            <a href="index.php?c=user&a=show&id=<?= $service->id ?>" class="btn btn-info" role="button">Ver mais</a>
                            <a href="index.php?c=user&a=edit&id=<?= $service->id ?>" class="btn btn-info" role="button">Editar</a>
                            <a href="index.php?c=user&a=delete&id=<?= $service->id ?>" class="btn btn-warning" role="button">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Lista de Serviços</h3>
        <p>
            <a href="index.php?c=service&a=index.php" class="btn btn-info" role="button">Voltar</a>
        </p>
    </div>
</div>