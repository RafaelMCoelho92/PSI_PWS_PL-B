<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Alterar dados privados</h3>
    </div>

    <form action="index.php?c=user&a=update&id=<?= $user->id ?>" method="post" class="form-horizontal">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Novo Email</label>
                <div class="col-sm-10">
                    <input value="<?php if (isset($user)) {
                                        echo $user->email;
                                    } ?>" type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Nova Password</label>
                <div class="col-sm-10">
                    <input value="<?php if (isset($user)) {
                                        echo $user->password;
                                    } ?>" type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Alterar</button>
            <a href="index.php?c=home&a=dashboardbo" class="btn btn-default float-right">Cancelar alterações</a>
            <!-- Dei indicação para retomar ao home , dashboard neste caso -->
        </div>
    </form>
</div>