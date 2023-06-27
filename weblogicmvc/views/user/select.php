<h1 class="text-left top-space">Utilizadores <?= APP_NAME ?></h1>
<h2 class="top-space"></h2>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-striped">
        <thead>
        <tr>
        <th colspan="4">
            <div class="row">
                <div class="col">
                    <input type="text" id="searchInput" placeholder="Digite o termo de pesquisa" class="form-control">
                </div>
                <div class="col-auto">
                    <button id="searchButton" class="btn btn-primary" role="button">Pesquisar</button>
                </div>
            </div>
        </th>
    </tr>
    <tr>
        <th>
            <h3>Nome</h3>
        </th>
        <th>
            <h3>Email</h3>
        </th>
        <th>
            <h3>NIF</h3>
        </th>
        <th>
            <h3>Role</h3>
        </th>
        <th>
        </th>
    </tr>
</thead>

            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->nif ?></td>
                        <td><?= $user->role ?></td>
                        <td>
                            <a href="index.php?c=folhaobra&a=store&id=<?= $user->id ?>" class="btn btn-info" role="button">Criar Folha de Obra</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

