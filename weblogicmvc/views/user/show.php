<h1 class="text-left top-space">Detalhe utilizadores <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
            <thead>
                <th>
                    <h3>Nome</h3>
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
                    <h3>Role</h3>
                </th>
            </thead>
            <tbody>
                    <tr>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->telefone ?></td>
                        <td><?= $user->nif ?></td>
                        <td><?= $user->morada ?></td>
                        <td><?= $user->codigopostal ?></td>
                        <td><?= $user->localidade ?></td>
                        <td><?= $user->role ?></td>
                    </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Voltar index</h3>
        <p>
            <a href="index.php?c=user&a=index" class="btn btn-info" role="button">Voltar</a>
        </p>
    </div>
</div>