    <div class="container">
        <h2>Resultado Simulação</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Em divida</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($prest as $row){ ?>
                    <tr>
                        <th scope="row"><?= $row['data']?></th>
                        <td><?= $row['valor']?></td>
                        <td><?= $row['divida']?></td>
                    </tr>
                <?php } ?>
                </tbody>
        </table>
    </div>