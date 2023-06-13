<h1 class="text-left top-space">IVAs - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<!--
<h1><//?= $service->referencia ?></h1>
<h3><//?= $service->descricao ?></h3>
<h3><//?= $service->iva->iva_id ?></h3>
-->
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <h3>IVA em Vigor</h3>
                    </th>
                    <th>
                        <h3>Descrição</h3>
                    </th>
                    <th>
                        <h3>Percentagem</h3>
                    </th>
                    <th><a href="index.php?c=iva&a=create" class="btn btn-success">Criar IVA</a></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ivas as $iva) { ?>
                    <tr>
                        <td><?= $iva->emvigor ?></td>
                        <td><?= $iva->descricao ?></td>
                        <td><?= $iva->percentagem ?></td>
                        <td>
                            <a href="index.php?c=iva&a=show&id=<?php echo $iva->id; ?>" class="btn btn-primary" role="button">Ver mais</a>
                            <a href="index.php?c=iva&a=edit&id=<?php echo $iva->id; ?>" class="btn btn-secondary" role="button">Editar</a>
                            <a href="index.php?c=iva&a=delete&id=<?php echo $iva->id; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>