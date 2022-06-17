<div class="container">
    <div class="row">
        <!-- BEGIN INVOICE -->
        <div class="col-xs-12">
            <div class="grid invoice">
                <div class="grid-body">
                    <div class="invoice-title">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1>Fatura+</h1>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12">
                                <h2>Fatura
                                    <span class="small">Nº<?= $fatura->id ?></span>
                                    <span class="small"> - <i><?= $funcionario->username?></i></span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card" style="border-style:hidden;">
                                <div class="card-body">
                                    <h5 class="card-title">Cliente</h5>
                                    <b>Nome: </b><?= $cliente->username ?><br>
                                    <b>Email: </b><?= $cliente->email ?><br>
                                    <b>Telefone: </b><?= $cliente->telefone ?><br>
                                    <b>NIF: </b><?= $cliente->nif ?><br>
                                    <b>Morada: </b><?= $cliente->morada ?><br>
                                    <b>Código Postal: </b><?= $cliente->cod_postal ?><br>
                                    <b>Localidade: </b><?= $cliente->localidade ?><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card" style="border-style:hidden;">
                                <div class="card-body">
                                    <h5 class="card-title">Empresa</h5>
                                    <b>Nome: </b><?= $empresa->nome ?><br>
                                    <b>Email: </b><?= $empresa->email ?><br>
                                    <b>Telefone: </b><?= $empresa->telefone ?><br>
                                    <b>NIF: </b><?= $empresa->nif ?><br>
                                    <b>Morada: </b><?= $empresa->morada ?><br>
                                    <b>Código Postal: </b><?= $empresa->cod_postal ?><br>
                                    <b>Localidade: </b><?= $empresa->localidade ?><br>
                                    <b>Capital Social: </b><?= $empresa->capital_social?>€<br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-right">
                            <br>
                            <strong>Data de Emissão: </strong><br><?= $fatura->data->format('d-M-Y') ?>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Linhas Fatura</h3>
                            <table class="table">
                                <thead>
                                    <tr class="line">
                                        <td><strong>Referência</strong></td>
                                        <td class="text-right"><strong>Nome</strong></td>
                                        <td class="text-right"><strong>Quantidade</strong></td>
                                        <td class="text-right"><strong>IVA</strong></td>
                                        <td class="text-right"><strong>Preço</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($linhas as $linha) {
                                            $produto = Produto::find([$linha->produto_id]);
                                        ?>
                                            <td><?= $produto->referencia ?></td>
                                            <td><?= $produto->descricao ?><br></td>                  
                                            <td class="text-right"><?= $linha->quantidade ?></td>
                                            <td class="text-right"><?= $iva[array_search($produto->iva_id, array_column($iva, 'id'))]->percentagem?>%</td>
                                            <td class="text-right"><?= $linha->valor_uni * $linha->quantidade ?>€</td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="text-right"><strong>Subtotal (Sem IVA)</strong></td>
                                    <td class="text-right"><?= $fatura->valor_preco_total ?>€</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="text-right"><strong>IVA</strong></td>
                                    <td class="text-right"><?= $fatura->valor_iva_total ?>€</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                    </td>
                                    <td class="text-right"><strong>Total</strong></td>
                                    <td class="text-right"><?= $fatura->valor_preco_total + $fatura->valor_iva_total ?>€</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END INVOICE -->
    </div>
</div>