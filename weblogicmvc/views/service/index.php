<h1 class="text-left top-space">Serviços Prestados - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <a href='index.php?c=service&a=create' class="btn btn-info"> Registar novo Serviço </a>

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
                <th>
                    <h3>Iva</h3>
                </th>
            </thead>
            <tbody>
                <?php foreach ($services as $service) { ?>
                    <tr>
                        <td><?= $service->referencia ?></td>
                        <td><?= $service->descricao ?></td>
                        <td><?= $service->precohora ?></td>
                        <td>
                            </ /?=$service->iva->iva_id ?></td>
                        <td>
                            <a href="index.php?c=service&a=show&id=<?= $service->id ?>" class="btn btn-info">Ver mais</a>
                            <a href="index.php?c=service&a=edit&id=<?= $service->id ?>" class="btn btn-info">Editar</a>
                            <a href="index.php?c=service&a=delete&id=<?= $service->id ?>" class="btn btn-warning">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Lista de Serviços</h3>
        <p>
            <a href="index.php?c=service&a=index" class="btn btn-info">Ver</a>
        </p>
    </div>
</div>