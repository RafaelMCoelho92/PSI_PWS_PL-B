<div class="container">
    <main>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Registe um novo Serviço</h4>
                <h6 class="mb-3">Preencha todos os campos!</h6>
                <form class="needs-validation" action="index.php?c=service&a=store" method="POST">
                    <div class="row g-3">

                        <div class="col-12">
                            <label for="referencia" class="form-label">Referência</label><br>
                            <input type="text" class="form-control" name="referencia" value="<?php if (isset($service)) {
                                                                                                    echo $service->referencia;
                                                                                                } ?>" placeholder="Referência" required>
                            <p>
                                <?php if (isset($service->errors)) {
                                    echo $service->errors->on('referencia');
                                } ?>
                            </p>
                        </div>
                        <div class="col-12">
                            <label for="descricao" class="form-label">Descrição</label><br>
                            <input type="text" class="form-control" name="descricao" value="<?php if (isset($service)) {
                                                                                                echo $service->descricao;
                                                                                            } ?>" placeholder="Descrição" required>
                            <p>
                                <?php
                                if (isset($service->errors)) {
                                    if (is_array($service->errors->on('descricao'))) {
                                        foreach ($service->errors->on('descriacao') as $error) {
                                            echo $error . '<br>';
                                        }
                                    } else {
                                        echo $service->errors->on('descricao');
                                    }
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-12">
                            <label for="precohora" class="form-label">Preço / hora</label><br>
                            <input type="text" class="form-control" name="precohora" value="<?php if (isset($service)) {
                                                                                                echo $service->precohora;
                                                                                            } ?>" placeholder="Preço / hora" required>
                            <p>
                                <?php
                                if (isset($service->errors)) {
                                    if (is_array($service->errors->on('precohora'))) {
                                        foreach ($service->errors->on('precohora') as $error) {
                                            echo $error . '<br>';
                                        }
                                    } else {
                                        echo $service->errors->on('precohora');
                                    }
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-12">
                            <label for="iva_id">Iva:</label><br>
                            <select class="form-control" name="iva_id">
                                <?php
   
                                foreach ($ivas as $iva) { ?>
                                    <?php if ($iva->id == $service->iva_id) { ?>
                                        <option value="<?= $iva->id ?>" selected><?= $iva->descricao;
                                                                                    ?> </option>
                                    <?php } else { ?>
                                        <option value="<?= $iva->id ?>"> <?= $iva->descricao;
                                                                            ?></option>
                                <?php }
                                } ?>
                                <p>
                                    <?php
                                    if (isset($service->iva_id)) {
                                        if (is_array($service->errors->on('iva_id'))) {
                                            foreach ($service->errors->on('iva_id') as $error) {
                                                echo $error . '<br>';
                                            }
                                        } else {
                                            echo $service->errors->on('iva_id');
                                        }
                                    }
                                    ?>
                                </p>
                            </select>
                            <br>
                            <input type="submit" value="Criar" class="btn btn-primary">
                            <a href='index.php?c=service&a=index' class="btn btn-info"> Voltar aos Serviços </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>