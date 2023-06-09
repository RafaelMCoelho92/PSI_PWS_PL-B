<h1 class="text-left top-space">Contatos <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        <h3>IVA</h3>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ivas as $iva) { ?>
                    <tr>
                        <td><?= $iva->percentagem ?></td>
                        <!-- Adicione outras colunas da tabela aqui -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>