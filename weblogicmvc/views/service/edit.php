<form action="index.php?c=service&a=update&id=<?= $service->id ?>" method="POST">
    <input type="text" name="referencia" value="<?php if (isset($service)) {
                                                    echo $service->referencia;
                                                } ?>" placeholder="Referência">
    <?php if (isset($service->errors)) {
        echo $service->errors->on('referencia');
    } ?>

    <input type="text" name="descricao" value="<?php if (isset($service)) {
                                                    echo $service->descricao;
                                                } ?>" placeholder="Descrição">
    <?php if (isset($service->errors)) {
        echo $service->errors->on('descricao');
    } ?>

    <label for="ivas">Iva:</label><br>
    <select name="iva_id">
        <?php foreach ($ivas as $iva) { ?>
            <?php if ($iva->id == $service->iva_id) { ?>
                <option value="<?= $iva->id ?>" selected><?= $iva->name;
                                                            ?> </option>
            <?php } else { ?>
                <option value="<?= $iva->id ?>"> <?= $iva->name;
                                                    ?></option>
        <?php }
        } ?>
    </select>

    <input type="submit" value="Confirmar">

</form>