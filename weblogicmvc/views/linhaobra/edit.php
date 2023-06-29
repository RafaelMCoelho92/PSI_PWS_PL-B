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
            </b>
            <br><br>

            <br>
        </div>
    </div>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Serviço</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <form method="post" action="index.php?c=linhaobra&a=store&id=<?= $folhaobra->id ?>">
                        <input type="text" name="referencia" placeholder="Introduza um serviço" value="" class="form-control" required>
                </div>
                <div class="col-3">
                    <input min='0' type="number" name="quantidade" id="quantidade" placeholder="Insira a quantidade" class="form-control" required>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary form-control" role="button">Adicionar Serviço</button>
                    </form>
                </div>
                <div class="col-3">
                    <form method="post" action="index.php?c=service&a=select&id=<?= $folhaobra->id ?>">
                        <button class="btn btn-info form-control" role="button">Selecionar Serviço</button>
                    </form>
                </div>
            </div>
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
                            <form action="index.php?c=linhaobra&a=update&id=<?= $linha->id ?>" method="post">
                                <td><?php echo $linha->id; ?></td> <!-- Ref -->
                                <?php
                                if ($linha->id == $idlinha) { ?>
                                    <td><input type="number" name="quantidade" placeholder="<?php echo $linha->quantidade; ?>" value="<?php echo $linha->quantidade; ?>"></td><!-- Qtd -->
                                <?php } else { ?>
                                    <td><?php echo $linha->quantidade; ?></td><!-- Qtd -->
                                <?php } ?>
                                <td><?php echo $linha->servico->descricao; ?></td><!-- Serviço -->
                                <td><?php echo number_format($linha->servico->precohora, 2, ',', '.') . " €" ?></td><!-- preco hora -->
                                <td><?php echo $linha->servico->iva->percentagem . " %" ?></td><!-- IVA -->
                                <td><?= number_format(($linha->servico->precohora * $linha->quantidade), 2, ',', '.') . " €" ?></td><!-- Subtotal s/ iva -->
                                <td><?php echo number_format((($linha->servico->iva->percentagem * ($linha->servico->precohora * $linha->quantidade)) / 100), 2, ',', '.')  . " €" ?></td><!-- IVA TOTAL -->
                                <td><?php echo number_format((($linha->servico->precohora * $linha->quantidade) +
                                        ($linha->servico->iva->percentagem * ($linha->servico->precohora * $linha->quantidade)) / 100 ), 2, ',', '.').
                                        "€" ?></td><!-- VALOR TOTAL-->
                                <?php
                                if ($linha->id == $idlinha) { ?>
                                    <td><button class="btn btn-info" role="button">Atualizar</button></td>
                                <?php } else { ?>
                                    <td></td>
                                <?php } ?>

                            </form>
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
                            <td><?= number_format($folhaobra->subtotal, 2, ',', '.'); ?> €</td>
                        </tr>
                        <tr>
                            <th>IVA Total</th>
                            <td><?= number_format($folhaobra->ivatotal, 2, ',', '.'); ?> €</td>
                        </tr>

                        <tr>
                            <th>Total:</th>
                            <td><?= number_format($folhaobra->valortotal, 2, ',', '.'); ?> €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row no-print">
        <div class="col-12">
            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
            <a href="index.php?c=folhaobra&a=paga&id=<?= $folhaobra->id ?>" class="btn btn-success float-right" style="margin-right: 5px;" role="button">Emitir e Pagar</a>
            <a href="index.php?c=folhaobra&a=emitir&id=<?= $folhaobra->id ?>" class="btn btn-info float-right" style="margin-right: 5px;" role="button">Emitir</a>
        </div>
    </div>
</div>