<div class="invoice p-3 mb-3">

    <div class="row">
        <div class="col-12">
            <h4>
                <i class="fas fa-globe"></i> <?= APP_NAME ?>
                <small class="float-right"><?= date('D, d M Y H:i', strtotime($folhaobra->data)) ?> </small>
            </h4>
        </div>

    </div>

    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong><?= $folhaobra->funcionario->username ?></strong><br>
                <?= $empresa->morada ?><br>
                <?= $empresa->codigopostal; ?> <?= $empresa->localidade ?> <br>
                Telefone: <?= $empresa->telefone ?><br>
                Email: <?= $empresa->email ?>
            </address>
            <div style="display: flex; align-items: center;">
                <button class="btn btn-info" role="button" style="margin-left: 10px; flex-shrink: 0;">Selecionar Serviço</button>
                <label for="servico" style="margin-left: 10px; flex-grow: 1;">Serviço:</label>
                <input type="text" name="referencia" placeholder="Insira o Serviço" value="" style="margin-left: 10px; flex-grow: 1;">
                <button class="btn btn-primary" role="button" style="margin-left: 10px; flex-shrink: 0;">Adicionar Serviço</button>
                <input type="number" name="quantidade" id="quantidade" placeholder="Insira a quantidade" class="form-control" required style="margin-left: 10px; flex-shrink: 0;">
            </div>
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
            <b>Estado:</b> <?= $folhaobra->estado ?><br>
            </b>
            <br><br>
            <div class="col">
                <form method="post" action="index.php?c=linhaobra&a=store&id=<?= $folhaobra->id ?>">
                    <div class="col">


                    </div>
                </form>
                <form method="post" action="index.php?c=service&a=select&id=<?= $folhaobra->id ?>">

                </form>
            </div>
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
                    <?php foreach ($linhaobras as $linha) { ?>

                        <tr>
                            <td><?php echo $linha->id; ?></td> <!-- Ref -->
                            <td><?php echo $linha->quantidade; ?></td><!-- Qtd -->
                            <td><?php echo $linha->servico->descricao; ?></td><!-- Serviço -->
                            <td><?php echo $linha->servico->precohora . " €" ?></td><!-- preco hora -->
                            <td><?php echo $linha->servico->iva->percentagem . " %" ?></td><!-- IVA -->
                            <td><?= ($linha->servico->precohora * $linha->quantidade) . " €" ?></td><!-- Subtotal s/ iva -->
                            <td><?php echo ($linha->servico->iva->percentagem * ($linha->servico->precohora * $linha->quantidade)) / 100  . " €" ?></td><!-- IVA TOTAL -->
                            <td><?php echo ($linha->servico->precohora * $linha->quantidade) +
                                    ($linha->servico->iva->percentagem * ($linha->servico->precohora * $linha->quantidade)) / 100 .
                                    "€" ?></td><!-- VALOR TOTAL-->
                            <td><a href="index.php?c=linhaobra&a=delete&id=<?= $linha->id ?>" class="btn btn-info" role="button">Remover Linha</a></td>
                            <td><a href="index.php?c=linhaobra&a=edit&id=<?= $linha->id ?>" class="btn btn-warning" role="button">Alterar Qtd.</a></td>

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
                            <td><?= $folhaobra->subtotal; ?> €</td>
                        </tr>
                        <tr>
                            <th>IVA Total</th>
                            <td><?= $folhaobra->ivatotal; ?> €</td>
                        </tr>

                        <tr>
                            <th>Total:</th>
                            <td><?= $folhaobra->valortotal; ?> €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row no-print">
        <div class="col-12">
            <a href="index.php?c=folhaobra&a=paga&id=<?= $folhaobra->id ?>" class="btn btn-success float-right" style="margin-right: 5px;" role="button">Emitir e Pagar</a>
            <a href="index.php?c=folhaobra&a=emitir&id=<?= $folhaobra->id ?>" class="btn btn-info float-right" style="margin-right: 5px;" role="button">Emitir</a>
        </div>
    </div>
</div>