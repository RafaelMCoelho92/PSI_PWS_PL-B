<? //SEMELHANTE AO EDIT DO IVA, MAS É SUPOSTO TER UM EDITAR SÓ DEPOIS DE ALGUM CRIADO NA BASE DE DADOS, CORRETO? 
//OU SEJA PARA JÁ AINDA NAO ESTÁ A SER CHAMADO 
?>


<div class="container">
    <main>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Editar Folha de Obra</h4>
                <h6 class="mb-3">Preencha todos os campos!</h6>
                <form class="needs-validation" action="index.php?c=folhaobra&a=update&id=<?php echo $folhaObra->id; ?>" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="emvigor">Em Vigor</label><br>
                            <select class="form-control" name="emvigor">
                                <?php $opcoes = array('Sim', 'Não') ?>
                                <?php foreach ($opcoes as $opcao) { ?>
                                    <option value="<?= $opcao ?>"> <?= $opcao; ?></option>
                                <?php } ?>
                            </select>
                            <p><?php if (isset($folhaObra->errors)) {
                                    echo $folhaObra->errors->on('emvigor');
                                } ?></p>
                            <div class="invalid-feedback">
                                Campo Obrigatório!
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="descricao" class="form-label">Descrição</label><br>
                            <input type="text" class="form-control" name="descricao" value="<?php if (isset($folhaObra)) {
                                                                                                echo $folhaObra->descricao;
                                                                                            } ?>" required>
                            <p>
                                <?php
                                if (isset($folhaObra->errors)) {
                                    if (is_array($folhaObra->errors->on('descricao'))) {
                                        foreach ($folhaObra->errors->on('descricao') as $error) {
                                            echo $error . '<br>';
                                        }
                                    } else {
                                        echo $folhaObra->errors->on('descricao');
                                    }
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-12">
                            <label for="percentagem" class="form-label">Percentagem</label><br>
                            <input type="text" class="form-control" name="percentagem" value="<?php if (isset($folhaObra)) {
                                                                                                    echo $folhaObra->percentagem;
                                                                                                } ?>" placeholder="Percentagem" required>
                            <p>
                                <?php
                                if (isset($folhaObra->errors)) {
                                    if (is_array($folhaObra->errors->on('percentagem'))) {
                                        foreach ($folhaObra->errors->on('percentagem') as $error) {
                                            echo $error . '<br>';
                                        }
                                    } else {
                                        echo $folhaObra->errors->on('percentagem');
                                    }
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="Atualizar" class="btn btn-primary">
                            <a href='index.php?c=folhaobra&a=index' class="btn btn-info">Voltar às Folhas de Obra</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>