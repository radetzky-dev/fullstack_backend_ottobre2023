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

$name = $surname = $phone = $anagraficaArray =$company = $qualifica = $dummyName= $email =$birthdate = $dummySurname = $dummyText = $terms=  "";

var_dump($_SERVER['REQUEST_METHOD']);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $canRegister = false;
    //gestiamo la chiamata
    $name = ucfirst($_POST['nome']);
    $surname = ucfirst($_POST['cognome']);


    $phone = $_POST['telefono'];
    $birthdate = $_POST['birthdate'];
    var_dump($birthdate);

    // "1920-02-01"
    $anno = substr($birthdate,0,4);
  //  echo $anno;
    $mese = substr($birthdate,5,2);
  //  echo $mese;
    $giorno = substr($birthdate,-2,2);
 //   echo $giorno;

    $terms = $_POST['terms'];
    $terms = isset($_POST['terms']) ? 1 : 0;


    $today = new DateTime('now');
    $birthday = new DateTime();
    $birthday->setDate($anno, $mese, $giorno);

    $interval= $birthday->diff($today);

   // var_dump($interval);

    if ($interval->y >=18)
    {
        echo "Sei maggiorenne";
        $canRegister = true;
    } else
    {
        echo "Sei minorenne NON puoi registrarti";
    }

    //salvo i dati in un JSON

    //se esistono i campi company ecc opzionali di valorizzarli nel form (is not empty)

    //todo mettere la data max di oggi nel form
    

}

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
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email (opz)" value="<?= $email ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTelephone">Telefono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono"
                            value="<?= $phone ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBirthDate">Data di nascita</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Data di nascita"
                            value="<?= $birthdate ?>" required min="1920-01-01" max="2023-01-01">
                    </div>

                

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="terms" name="terms" 
                        <?php
        if (!empty($terms))
        {
            echo "checked";
        }
                        ?>
                        
                        required  >
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