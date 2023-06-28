<h1 class="text-left top-space">Serviços Prestados - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="4">
                        <div class="row">
                            <form method="post" action="index.php?c=service&a=search_service">
                                <div class="col">
                                    <input type="text" name="pesquisa" id="searchInput" placeholder="Referencia/Descricao/Preço-Hora/IVA" class="form-control">
                                </div>
                                <div class="col-auto">
                                    <input type="submit" value="Pesquisar" class="btn btn-primary">
                                </div>
                        </div>
                    </th>
                </tr>
                <tr>
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
                        <h3>IVA</h3>
                    </th>
                    <th>
                        <a href='index.php?c=service&a=create' class="btn btn-success"> Registar novo Serviço </a>
                    </th>
            </thead>
            <tbody>
                <?php foreach ($services as $service) { ?>
                    <tr>
                        <td><?= $service->referencia ?></td>
                        <td><?= $service->descricao ?></td>
                        <td><?= $service->precohora ?></td>
                        <td><?= $service->iva->descricao ?></td>
                        <td>
                            <a href="index.php?c=service&a=show&id=<?= $service->id ?>" class="btn btn-primary">Ver mais</a>
                            <a href="index.php?c=service&a=edit&id=<?= $service->id ?>" class="btn btn-secondary">Editar</a>
                            <a href="index.php?c=service&a=delete&id=<?= $service->id ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">

    </div>
</div>