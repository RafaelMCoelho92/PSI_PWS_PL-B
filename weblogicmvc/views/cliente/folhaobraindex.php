<!DOCTYPE html>
<html>

<head>
    <title><?= APP_NAME ?> - Folha de Obra</title>
</head>

<body>
    <h1 class="text-left top-space"><?= APP_NAME ?> - Folha de Obra</h1>
    <h2 class="top-space"></h2>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            <h3>ID</h3>
                        </th>
                        <th>
                            <h3>Data</h3>
                        </th>
                        <th>
                            <h3>Estado</h3>
                        </th>
                        <th>
                            <h3>Cliente</h3>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($folhasObra as $folhaObra) { ?>
                        <tr>
                            <td><?= $folhaObra->id ?></td>
                            <td><?= $folhaObra->data ?></td>
                            <td><?= $folhaObra->estado ?></td>
                            <td><?= $folhaObra->user->username ?></td>
                            <td>
                                <a href="index.php?c=cliente&a=folhaobrashow&id=<?= $folhaObra->id ?>" class="btn btn-primary" role="button">Ver mais</a>
                                <a href="index.php?c=folhaobra&a=paga&id=<?= $folhaObra->id ?>" class="btn btn-success" role="button">Pagar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>