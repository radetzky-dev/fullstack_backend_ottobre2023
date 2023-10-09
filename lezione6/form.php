<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<?php
$dummyPhoto = "assets/dummyphoto.png";
//$dummyPhoto = "https://dummyimage.com/300";

$name = $surname = $phone = $anagraficaArray =$company = $qualifica = $dummyName= $email =$birthdate = $dummySurname = $dummyText = "";

?>

<body>
    <div class="container">
        <h3>Registration form</h3>
        <div class="row">
        <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?= $dummyPhoto; ?>" id="profilePhoto" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" id="namesurname"><?= $dummyName . ' ' . $dummySurname; ?></h5>
                        <p class="card-text"><?= $dummyText; ?></p>
                        <button class="btn btn-primary">Dati corretti: registrami</button>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" id="FormProfilePhoto">
                        <input type="file" name="file">
                        <input type="hidden" name="uploadPhoto" value="uploadPhoto" />
                        <input type="hidden" name="otherFormInfo" value="<?= $anagraficaArray; ?>" />
                        <input type="submit" name="upload" value="Carica foto profilo">
                    </form>
                </div>
            </div>

            <div class="col">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome"
                            value="<?= $name ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cognome">Cognome</label>
                        <input type="text" class="form-control" id="cognome" name="cognome" placeholder="Cognome"
                            value="<?= $surname ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="company">Società</label>
                        <input type="text" class="form-control" id="societa" name="societa" placeholder="Società (opz)" value="<?= $company ?>">
                    </div>
                    <div class="form-group">
                        <label for="company">Qualifica</label>
                        <input type="text" class="form-control" id="qualifica" name="qualifica" placeholder="Qualifica (opz)" value="<?= $qualifica ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email (opz)" value="<?= $email ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTelephone">Telefono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono"
                            value="<?= $phone ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBirthDate">Data di nascita</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Data di nascita"
                            value="<?= $birthdate ?>" required>
                    </div>

                

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Accetta i nostri termini di servizio</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>