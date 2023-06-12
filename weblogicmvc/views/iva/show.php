<h1 class="text-left top-space">Detalhe Serviço - <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <th>
                    <h3>Em Vigor</h3>
                </th>
                <th>
                    <h3>Descrição</h3>
                </th>
                <th>
                    <h3>Percentagem</h3>
                </th>

            </thead>
            <tbody>
                <tr>
                    <td><?= $iva->emvigor ?></td>
                    <td><?= $iva->descricao ?></td>
                    <td><?= $iva->percentagem ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <p>
            <a href="index.php?c=iva&a=index" class="btn btn-info">Voltar aos IVAS</a>
        </p>
    </div>
</div>