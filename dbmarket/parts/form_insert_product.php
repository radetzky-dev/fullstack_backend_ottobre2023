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
                    <input type="text" id="operation" name="operation" value="insertproduct" hidden />
                    <button type="submit" class="btn btn-primary">
                        <?php echo $addIcon; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php
    require_once "cart.php";