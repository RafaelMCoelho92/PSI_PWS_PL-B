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
            <b>Estado:</b> <?= $folhaobra->estado ?><br>
            </b>
            <br><br>
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
                    <input type="number" name="quantidade" id="quantidade" placeholder="Insira a quantidade" class="form-control" required>
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
        </div>
    </div>
</div>