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
                        <th>
                            <a href="index.php?c=user&a=index" class="btn btn-success">Criar Folha de Obra</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($folhasObra as $folhaObra) { ?>
                        <tr>
                            <td><?= $folhaObra->id ?></td>
                            <td><?= date('D, d M Y H:i', strtotime($folhaObra->data)) ?></td>
                            <td><?= $folhaObra->estado ?></td>
                            <td><?= $folhaObra->user->username ?></td>
                            <td>
                                <?php if ($folhaObra->estado != 'Em Lançamento') { ?>
                                    <a href="index.php?c=folhaobra&a=show&id=<?= $folhaObra->id ?>" class="btn btn-primary" role="button">Ver mais</a>
                                <?php } ?>
                                <?php if ($folhaObra->estado == 'Em Lançamento') { ?>
                                    <a href="index.php?c=folhaobra&a=edit&id=<?= $folhaObra->id ?>" class="btn btn-secondary" role="button">Editar</a>
                                    <a href="index.php?c=folhaobra&a=emitir&id=<?= $folhaObra->id ?>" class="btn btn-info" role="button">Emitir</a>
                                <?php } ?>
                                <?php if ($folhaObra->estado != 'Paga') { ?>
                                    <a href="index.php?c=folhaobra&a=anular&id=<?= $folhaObra->id ?>" class="btn btn-danger" role="button">Anular</a>
                                <?php } ?>
                                <?php if ($folhaObra->estado == 'Emitida') { ?>
                                    <a href="index.php?c=folhaobra&a=paga&id=<?= $folhaObra->id ?>" class="btn btn-success" role="button">Pagar</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>