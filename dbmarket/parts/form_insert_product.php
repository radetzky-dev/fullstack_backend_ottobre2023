<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Inserisci prodotto</h5>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="testo">Qta</label>
                        <input type="numeric" class="form-control" id="qta" name="qta" placeholder="1" required>
                        <label for="testo">Marca</label>
                        <select name="marca" id="marca" class="form-control">
                            <?php
                            foreach ($brands as $key => $value) {
                                echo ("<option value=" . $key . ">" . $value) . "</option>";
                            }
                            ?>
                        </select>
                        <label for="testo">Descrizione</label>
                        <input type="text" class="form-control" id="description" name="description"
                            placeholder="description" required>
                        <label for="testo">Price</label>
                        <input type="numeric" class="form-control" id="price" name="price" placeholder="price" required>
                        <select name="tipo" id="tipo" class="form-control">
                            <?php
                            foreach ($categories as $key => $value) {
                                echo ("<option value=" . $key . ">" . $value) . "</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">
                        <?php echo $addIcon; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Il tuo carrello</h5>
                <table>
                    <thead>
                        <th>Marca</th>
                        <th>Prezzo</th>
                    </thead>

                    <?php
                    $totalCart = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $obj) {
                            $deleteCart = "<tr><td><a href='" . $_SERVER['PHP_SELF'] . "?op=deletecart&id=" . $obj[0] . "'>$deleteIcon" . $obj[2] . "</a></td><td>€ " . $obj[1] . "</td></tr>";
                            $totalCart = $totalCart + $obj[1];
                            echo $deleteCart;
                        }
                    }
                    echo "</table>";
                    ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" name="amount" id="amount" value="<?php echo $totalCart; ?>" readonly>
                        <button type="submit" class="btn btn-primary">Paga</button>
                    </form>
            </div>
        </div>
    </div>