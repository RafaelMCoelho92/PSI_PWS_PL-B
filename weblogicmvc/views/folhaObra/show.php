<div class="invoice p-3 mb-3">

    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> <?= APP_NAME ?>
                <small class="float-right"><?= date('D, d M Y H:i', strtotime($folhaObra->data)) ?> </small>
            </h4>
        </div>

    </div>

    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong><?= $folhaObra->funcionario->username ?></strong><br>
                <?= $empresa->morada ?><br>
                <?= $empresa->codigopostal; ?> <?= $empresa->localidade ?> <br>
                Telefone: <?= $empresa->telefone ?><br>
                Email: <?= $empresa->email ?>
            </address>
        </div>

        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong><?= $folhaObra->user->username ?></strong><br>
                <?= $folhaObra->user->morada ?><br>
                <?= $folhaObra->user->codigopostal ?>, <?= $folhaObra->user->localidade ?><br>
                Teleone: <?= $folhaObra->user->telefone ?><br>
                Email: <?= $folhaObra->user->email ?>
            </address>
        </div>

        <div class="col-sm-4 invoice-col">
            <br>
            <b>Order ID:</b> <?= $folhaObra->id ?><br>
            <b>Estado:</b> <?= $folhaObra->estado ?><br>
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
                    <?php foreach ($linhaObras as $linha) { ?>

                        <tr>
                            <td><?php echo $linha->id; ?></td> <!-- Ref -->
                            <td><?php echo $linha->quantidade; ?></td><!-- Qtd -->
                            <td><?php echo $linha->servico->descricao; ?></td><!-- Serviço -->
                            <td><?php echo number_format($linha->servico->precohora, 2, ',', '.') . " €" ?></td><!-- preco hora -->
                            <td><?php echo $linha->servico->iva->percentagem . " %" ?></td><!-- IVA -->
                            <td><?= number_format(($linha->servico->precohora * $linha->quantidade), 2, ',', '.') . " €" ?></td><!-- Subtotal s/ iva -->
                            <td><?php echo number_format((($linha->servico->iva->percentagem * ($linha->servico->precohora * $linha->quantidade)) / 100), 2, ',', '.')  . " €" ?></td><!-- IVA TOTAL -->
                            <td><?php echo number_format((($linha->servico->precohora * $linha->quantidade) +
                                    ($linha->servico->iva->percentagem * ($linha->servico->precohora * $linha->quantidade)) / 100), 2, ',', '.') .
                                    "€" ?></td><!-- VALOR TOTAL-->
                        </tr>
                    <?php } ?>
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
                            <td><?= number_format($folhaObra->valortotal, 2, ',', '.'); ?> €</td>
                        </tr>
                        <tr>
                            <th>IVA Total</th>
                            <td><?= number_format($folhaObra->ivatotal, 2, ',', '.'); ?> €</td>
                        </tr>

                        <tr>
                            <th>Total:</th>
                            <td><?= number_format($folhaObra->valortotal + $folhaObra->ivatotal, 2, ',', '.'); ?> €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <div class="row no-print">
        <div class="col-12">
        </div>
    </div>
</div>