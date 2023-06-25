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
                <strong><?= $empresas->designacaosocial ?></strong><br>
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
            <b>Invoice #007612</b><br>
            <br>
            <b>Order ID:</b> 4F3S8J<br>
            <b>Payment Due:</b> 2/22/2014<br>
            <b>Account:</b> 968-34567
        </div>

    </div>

    <div class="row">
        <div class="col-12 table-responsive">
            <form action="update_invoice.php" method="POST">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Quantidade</th>
                            <th>Serviço</th>
                            <th>IVA</th>
                            <th>Descrição</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="Quantidade[]" value="Quantidade"></td>
                            <td><input type="text" class="form-control" name="Servico[]" value="Serviço"></td>
                            <td><input type="text" class="form-control" name="Iva[]" value="Iva"></td>
                            <td><input type="text" class="form-control" name="Descricao[]" value="Descrição"></td>
                            <td><input type="text" class="form-control" name="Subtotal[]" value="Valor"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="Quantidade[]" value="Quantidade"></td>
                            <td><input type="text" class="form-control" name="Servico[]" value="Serviço"></td>
                            <td><input type="text" class="form-control" name="Iva[]" value="Iva"></td>
                            <td><input type="text" class="form-control" name="Descricao[]" value="Descrição"></td>
                            <td><input type="text" class="form-control" name="Subtotal[]" value="Valor"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="Quantidade[]" value="Quantidade"></td>
                            <td><input type="text" class="form-control" name="Servico[]" value="Serviço"></td>
                            <td><input type="text" class="form-control" name="Iva[]" value="Iva"></td>
                            <td><input type="text" class="form-control" name="Descricao[]" value="Descrição"></td>
                            <td><input type="text" class="form-control" name="Subtotal[]" value="Valor"></td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
        </div>

    </div>

    <div class="row">

        <div class="col-6">
            <p class="lead">Payment Methods:</p>
            <img src="../../dist/img/credit/visa.png" alt="Visa">
            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="../../dist/img/credit/american-express.png" alt="American Express">
            <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                plugg
                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
            </p>
        </div>

        <div class="col-6">
            <p class="lead">Amount Due 2/22/2014</p>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td>$250.30</td>
                        </tr>
                        <tr>
                            <th>Tax (9.3%)</th>
                            <td>$10.34</td>
                        </tr>
                        <tr>
                            <th>Shipping:</th>
                            <td>$5.80</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td>$265.24</td>
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
            <th>
                <a href="index.php?c=folhaObra&a=edit" class="btn btn-success">Editar folha de Obra</a>
            </th>
            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
            </button>
        </div>
    </div>
</div>