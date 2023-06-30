<h1 class="text-left top-space">IVAs - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>


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

                        <?php if ($iva->emvigor == 'Sim') {
                            //echo '<td class="btn btn-success">Ativo</td>';
                        ?><td>
                                <form action="index.php?c=iva&a=update&id=<?= $iva->id; ?>" method="POST">
                                    <button type="submit" name="emvigor" value="Não" class="btn btn-success">Ativo</button>
                                </form>
                            </td>
                        <?php } else { ?>
                            <td>
                                <form action="index.php?c=iva&a=update&id=<?= $iva->id; ?>" method="POST">
                                    <button type="submit" name="emvigor" value="Sim" class="btn btn-danger">Inativo</button>
                                </form>
                            </td>
                        <?php } ?>
                        <td name="descricao" value="<?= $iva->descricao ?>"><?= $iva->descricao ?></td>
                        <td name="percentagem" value="<?= $iva->percentagem ?>"><?= $iva->percentagem . "%"?></td>
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