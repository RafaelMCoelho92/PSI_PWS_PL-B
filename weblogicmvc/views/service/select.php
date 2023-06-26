<h1 class="text-left top-space">Serviços Prestados - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
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
                    <h3>IVA</h3>
                </th>
                <th>
                    <h3>Quantidade</h3>
                </th>
                <th>
                    <a href='index.php?c=service&a=create' class="btn btn-success"> Registar novo Serviço </a>
                </th>
            </thead>
            <tbody>
                <?php foreach ($services as $service) { ?>
                    <form method="post" action="index.php?c=linhaobra&a=store&id=<?= $folhaobra->id ?>">
                        <tr>
                            <td><?= $service->referencia ?></td>
                            <td name="descricao"value="<?= $service->descricao ?>"><?= $service->descricao ?></td>
                            <td><?= $service->precohora ?></td>
                            <td><?= $service->iva->descricao ?></td>
                            <td><input type="number" name="quantidade" id="quantidade" placeholder="Insira a quantidade" class="form-control" required></td>
                            <td>
                                <button class="btn btn-primary" role="button">Selecionar</button>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>