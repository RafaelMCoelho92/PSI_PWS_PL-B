<div class="invoice p-3 mb-3">

    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> <?= APP_NAME ?>
                <small class="float-right"><?= date('d/m/Y') ?> </small>
            </h4>
        </div>

    </div>

    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong><?= $folhaobra->funcionario->username ?></strong><br>
                <?= $empresas->morada ?><br>
                <?= $empresas->codigopostal; ?> <?= $empresas->localidade ?> <br>
                Telefone: <?= $empresas->telefone ?><br>
                Email: <?= $empresas->email ?>
            </address>
        </div>

        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong><?= $folhaobra->user->username ?></strong><br>
                <?= $folhaobra->user->morada ?><br>
                <?= $folhaobra->user->codigopostal ?>, <?= $folhaobra->user->localidade ?><br>
                Teleone: <?= $folhaobra->user->telefone ?><br>
                Email: <?= $folhaobra->user->email ?>
            </address>
        </div>

        <div class="col-sm-4 invoice-col">
            <br>
            <b>Order ID:</b> <?= $folhaobra->id ?><br>
            <b><a href="index.php?c=linhaobra&a=create&id=<?= $folhaobra->id ?>" class="btn btn-success">Adicionar linha de Obra</a>
            </b><br>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ref.</th>
                        <th>Qtd</th>
                        <th>Serviço</th>
                        <th>Preço/Hora</th>
                        <th>IVA</th>
                        <th>Subtotal (s/ IVA)</th>
                        <th>IVA Total</th>
                        <th>Valor Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        </td>
                        <td> <input type="number" class="form-control" name="quantidade" value="<?php if (isset($linhaobra)) {
                                                                                                    echo $linhaobra->quantidade;
                                                                                                } ?>" placeholder="Qtd" required>
                        </td>
                        <td><input type="text" class="form-control" name="descricao" value="<?php if (isset($linhaobra)) {
                                                                                                    echo $linhaobra->servico->descricao;
                                                                                                } ?>" placeholder="Descrição do Serviço" required>
                        </td>
                        <td><input type="number" class="form-control" name="precohora" value="<?php if (isset($linhaobra)) {
                                                                                                    echo $linhaobra->servico->precohora;
                                                                                                } ?>" placeholder="precohora" required>
                        </td>
                        <td><input type="number" class="form-control" name="iva" value="<?php if (isset($linhaobra)) {
                                                                                                    echo $linhaobra->servico->precohora;
                                                                                                } ?>" placeholder="precohora" required>
                        </td>
                        <td><?= ?>
                        </td>
                        <td>aa
                        </td>
                        <td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="row">

        <div class="col-6">
            <p class="lead">Payment Methods:</p>
            <img src="public/img/credit/visa.png" alt="Visa">
            <img src="public/img/credit/mastercard.png" alt="Mastercard">
            <img src="public/img/credit/american-express.png" alt="American Express">
            <img src="public/img/credit/paypal2.png" alt="Paypal">
        </div>

        <div class="col-6">
            <p class="lead">Amount Due 2/22/2014</p>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td><?= $folhaobra->valortotal; ?> €</td>
                        </tr>
                        <tr>
                            <th>IVA Total</th>
                            <td><?= $folhaobra->ivatotal; ?> €</td>
                        </tr>

                        <tr>
                            <th>Total:</th>
                            <td><?= $folhaobra->valortotal + $folhaobra->ivatotal; ?> €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <div class="row no-print">
        <div class="col-12">
            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                Payment
            </button>

            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
            </button>
        </div>
    </div>
</div>