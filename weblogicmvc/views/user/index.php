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
            <a href='index.php?c=user&a=create' class="btn btn-success">Criar Utilizador</a>
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
                            <a href="index.php?c=user&a=show&id=<?= $user->id ?>" class="btn btn-primary" role="button">Ver mais</a>
                            <a href="index.php?c=user&a=edit&id=<?= $user->id ?>" class="btn btn-secondary" role="button">Editar</a>
                            <a href="index.php?c=user&a=delete&id=<?= $user->id ?>" class="btn btn-danger" role="button">Delete</a>
                            <a href="index.php?c=folhaobra&a=create&id=<?= $user->id ?>" class="btn btn-info" role="button">Criar Folha de Obra</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    document.getElementById('searchButton').addEventListener('click', function () {
        var input = document.getElementById('searchInput').value.toLowerCase();
        var rows = document.getElementsByTagName('tr');

        for (var i = 2; i < rows.length; i++) {
            var username = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
            var email = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
            var nif = rows[i].getElementsByTagName('td')[2].textContent.toLowerCase();
            var role = rows[i].getElementsByTagName('td')[3].textContent.toLowerCase();

            if (username.indexOf(input) > -1 || email.indexOf(input) > -1 || nif.indexOf(input) > -1 || role.indexOf(input) > -1) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
</script>
