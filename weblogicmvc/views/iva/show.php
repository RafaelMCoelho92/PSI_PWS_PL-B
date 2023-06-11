<h1 class="text-left top-space">Detalhe Serviço - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <th>
                    <h3>Referência</h3>
                </th>
                <th>
                    <h3>Descrição</h3>
                </th>
                <th>
                    <h3>Preço / Hora</h3>
                </th>
                <th>
                    <h3>IVA</h3>
                </th>
            </thead>
            <tbody>
                <tr>
                    <td><?= $service->referencia ?></td>
                    <td><?= $service->descricao ?></td>
                    <td><?= $service->precohora ?></td>
                    <td><?= $service->iva->referencia ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <p>
            <a href="index.php?c=service&a=index" class="btn btn-info">Voltar aos Serviços</a>
        </p>
    </div>
</div>