<h1 class="text-left top-space">Utilizadores <?= APP_NAME ?></h1>
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
                    <h3>NIF</h3>
                </th>
                <th>
                    <h3>Role</h3>
                </th>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->nif ?></td>
                        <td><?= $user->role ?></td>
                        <td>
                            <a href="index.php?c=user&a=show&id=<?= $user->id ?>" class="btn btn-info" role="button">Ver mais</a>
                            <a href="index.php?c=user&a=edit&id=<?= $user->id ?>" class="btn btn-info" role="button">Editar</a>
                            <a href="index.php?c=user&a=delete&id=<?= $user->id ?>" class="btn btn-warning" role="button">Delete</a>                         
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <h3>Area Reservada</h3>
        <p>
            <a href="index.php?c=reservado&a=admin" class="btn btn-info" role="button">Voltar</a>
        </p>
    </div>
</div>