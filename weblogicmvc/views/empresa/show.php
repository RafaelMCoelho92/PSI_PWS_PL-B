<a href="index.php?c=home&a=index" ><h1 class="text-left top-space">Contatos <?= APP_NAME ?></h1></a>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <th>
                    <h3>Designação Social</h3>
                </th>
                <th>
                    <h3>Email</h3>
                </th>
                <th>
                    <h3>Telefone</h3>
                </th>
                <th>
                    <h3>NIF</h3>
                </th>
                <th>
                    <h3>Morada</h3>
                </th>
                <th>
                    <h3>Codigo Postal</h3>
                </th>
                <th>
                    <h3>Localidade</h3>
                </th>
                <th>
                    <h3>Capital Social</h3>
                </th>
            </thead>
            <tbody>
                    <tr>
                        <td><?= $empresa->designacaosocial ?></td>
                        <td><?= $empresa->email ?></td>
                        <td><?= $empresa->telefone ?></td>
                        <td><?= $empresa->nif ?></td>
                        <td><?= $empresa->morada ?></td>
                        <td><?= $empresa->codigopostal ?></td>
                        <td><?= $empresa->localidade ?></td>
                        <td><?= $empresa->capitalsocial ." €" ?></td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>