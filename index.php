<?php 
function pre_r ($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';

}

$prenom = $nom = $email = $genre = $sujet = $pays = $message = $name = "";
$prenomError = $nomError = $emailError = $genreError = $sujetError = $paysError = $messageError = $nameError = "";
$isSuccess = false;
$emailTo = "tiagogameiro15@gmail.com";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$prenom = veryfiInput($_POST['prenom']);
$nom = veryfiInput($_POST['nom']);
$email = veryfiInput($_POST['email']);


$genre = $_POST['genre'];
/* $_POST['genre']; */

$sujet = veryfiInput($_POST['sujet']);
$pays = veryfiInput($_POST['pays']);
$message = veryfiInput($_POST['message']);
$name = veryfiInput($_POST['name']);
$isSuccess = true;
$emailText = "";


if(empty($prenom)){
$prenomError = "Ecrivez votre prenom svp.";
$isSuccess = false;
}
else
$emailText .= "Prenom: $prenom\n";

if(empty($nom)){
$nomError = "Ecrivez votre nom svp.";
$isSuccess = false;
}
else
$emailText .= "Nom: $nom\n";

if(!isEmail($email)){
    $emailError = "Ecrivez une adresse mail valide";
    $isSuccess = false;
    }
    else
    $emailText .= "Email: $email\n";

/*  genre  */  

    if(isset($_POST['genre'])) {
        if($_POST['genre'] == 'NULL') {
            $genreError = "Votre genre svp";
            $isSuccess = false;
            /* faire ancre contact form */
        }
        else {
            $emailText .= "Genre: $genre\n"; 
        }
    }

/*  sujet  */  

    if(isset($_POST['sujet'])) {
            $emailText .= "Sujet: $sujet\n"; 
            $sujet = $sujet;
    }

/*  pays  */  

if(isset($_POST['pays'])) {
    if($_POST['pays'] == 'NULL') {
        $paysError = "Votre pays svp";
        $isSuccess = false;
        /* faire ancre contact form */
    }
    else {
        $emailText .= "Pays: $pays\n"; 
    }
}

if(empty($pays)){
$paysError = "Ecrivez votre pays svp.";
$isSuccess = false;
}

if(empty($message)){
    $messageError = "Ecrivez votre message svp.";
    $isSuccess = false;
    }
    else
    $emailText .= "Message: $message\n";

    if(!empty($name)){
        echo '<p class="errormessage" style="background-color: red; font-size: 30px;">Robot detected</p>';
        $isSuccess = false;
        }
 
if($isSuccess){
    echo '<p class="successMessage" style="background-color: grey; font-size: 30px; opacity: 1;">Votre message a bien été envoyé</p>';
    $headers = "From: $prenom $nom <$email>\r\nReply-To: $email";
    mail($emailTo, "Message", $emailText, $headers);
    $prenom = $nom = $email = $genre = $sujet = $pays = $message = "";
    pre_r($_POST);
    }
    else
    echo '<p class="errormessage" style="background-color: red; height: 0px; font-size: 0px;">Vous avez oublie de remplir </p>';

    }

    function isEmail($var){
    return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function veryfiInput($var){
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
    }

    ?>
    <!DOCTYPE html>
    <html lang="zxx">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <title>Hackers Poulette</title>
        <script src="https://kit.fontawesome.com/4e7b59516f.js" crossorigin="anonymous"></script>
    </head>

    <body>


        <header>
            <nav id='myNav' class="navbar navbar-expand-lg  navbar-fixed-top">
                <a class="navbar-brand ml-5" href="#">
                    <img src="./assets/img/hackers-poulette-logo-copie.png" alt="logo hackers poulette">
                </a>
                <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="dark-blue-text"><i
                            class="fas fa-bars fa-1x"></i></span></button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="navbar-nav mr-auto ml-5">
                        <li class="nav-item active">
                            <a class="nav-link h2 mr-5" href="#">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  h2 mr-5" href="#produits">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h2 mr-5" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h2" href="#contact">Contact</a>
                        </li>
                    </ul>
                    <button type="button" data-toggle="modal" data-target="#modalLoginForm"
                        class="btn btn-info login">Se
                        connecter</button>
                    <button type="button" data-toggle="modal" data-target="#modalRegisterForm"
                        class="btn btn-info register">Créer
                        un compte</button>
                </div>
            </nav>

            <div class="jumbotron">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div id="slide-one" class="carousel-item active">
                            <img src="./assets/img/1.jpg" class="d-block w-100" alt="Rasperry">
                            <div class="carousel-caption d-md-block">
                                <h5 class="justify-content-center"><span>Lorem ipsum dolor sit, amet consectetur
                                        adipisicing elit. </span>
                                </h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur amet doloremque
                                    non, dolorum, sed
                                    quia, maiores deserunt quibusdam deleniti qui quasi aspernatur. Accusamus quia quasi
                                    quidem dolores ea
                                    suscipit dicta!</p>
                                <button type="button" class="btn btn-info">Decouvrir les offres</button>
                            </div>
                        </div>
                        <div id="slide-two" class="carousel-item">
                            <img src="./assets/img/2.jpg" class="d-block w-100" alt="Rasperry">
                            <div class="carousel-caption d-md-block">
                                <h5 class="justify-content-center"><span>Lorem ipsum dolor sit, amet consectetur
                                        adipisicing elit. </span>
                                </h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur amet doloremque
                                    non, dolorum, sed
                                    quia, maiores deserunt quibusdam deleniti qui quasi aspernatur. Accusamus quia quasi
                                    quidem dolores ea
                                    suscipit dicta!</p>
                                <button type="button" class="btn btn-info">Decouvrir les offres</button>
                            </div>
                        </div>
                        <div id="slide-three" class="carousel-item">
                            <img src="./assets/img/1.jpg" class="d-block w-100" alt="Rasperry">
                            <div class="carousel-caption d-md-block">
                                <h5 class="justify-content-center"><span>Lorem ipsum dolor sit, amet consectetur
                                        adipisicing elit. </span>
                                </h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur amet doloremque
                                    non, dolorum, sed
                                    quia, maiores deserunt quibusdam deleniti qui quasi aspernatur. Accusamus quia quasi
                                    quidem dolores ea
                                    suscipit dicta!</p>
                                <button type="button" class="btn btn-info">Decouvrir les offres</button>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </header>

        <!-- Modal Login -->
        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Se connecter</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Adresse mail</label>
                            <input type="email" id="defaultForm-email" class="form-control validate">
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="defaultForm-pass">Mot de passe</label>
                            <input type="password" id="defaultForm-pass" class="form-control validate">
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-info mr-4">Se connecter</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Create Account/Register -->
        <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Créer un compte</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="orangeForm-name">Votre nom</label>
                            <input type="text" id="orangeForm-name" class="form-control validate">
                        </div>
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="orangeForm-email">Votre adresse
                                mail</label>
                            <input type="email" id="orangeForm-email" class="form-control validate">
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="orangeForm-pass">Votre mot de
                                passe</label>
                            <input type="password" id="orangeForm-pass" class="form-control validate">
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-info">Créer un compte</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Produits-->

        <h1 class="text-center">Nos <b class="blue">produits</b></h1>
        <section class="p-5 text-center">

            <div class="row">

                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <img src="assets/img/produits/arduino.jpg" alt="arduino" style="height:196px"
                            class="card-img-top">
                        <div class=" card card-body">
                            <h5 class="card-title">Arduino</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                            <a href="#" class="btn btn-info">Dans le panier</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <img src="assets/img/produits/raspberry1.jpg" alt="raspberry 15b" style="height:196px"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Raspberry 15b</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                            <a href="#" class="btn btn-info">Dans le panier</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <img src="assets/img/produits/raspberry2.jpg" alt="raspberry cdc" style="height:196px"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Raspberry CDC</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                            <a href="#" class="btn btn-info">Dans le panier</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <img src="assets/img/produits/raspberry3.jpg" alt="raspberry org" style="height:196px"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Raspberry xxl</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                            <a href="#" class="btn btn-info">Dans le panier</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--services-->



        <h1 class="text-center">Nos <b class="blue">services</b></h1>
        <section class="container p-5 text-center mx-auto ">


            <!--service après vente-->

            <div class="row mb-5 flex-md-row-reverse  ">

                <div class="col-md-4 px-0">
                    <div class="card">
                        <img src="assets/img/services/sav.jpg" alt="service après vente"
                            style="height:260px; width:100%" class="img-thumbnail">
                    </div>
                </div>

                <div class="card col-md-8  ">
                    <div class="card-header">
                        Service après vente
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aliquid,
                            laborum veniam
                            minus nobis accusamus dignissimos rem nam odit eos. Minima consequuntur, eaque voluptatem
                            modi perspiciatis
                            iusto id maxime itaque.</p>
                        <a href="#" class="btn btn-info">En savoir plus</a>
                    </div>
                </div>


            </div>

            <!--Extension de garantie-->

            <div class="row my-5">

                <div class="col-md-4 px-0">
                    <div class="card">
                        <img src="assets/img/services/garantie.png" alt="extension de garantie"
                            style="height:260px; width:100%" class="img-thumbnail">
                    </div>
                </div>

                <div class="card col-md-8">
                    <div class="card-header">
                        Extension de garantie
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aliquid,
                            laborum veniam
                            minus nobis accusamus dignissimos rem nam odit eos. Minima consequuntur, eaque voluptatem
                            modi perspiciatis
                            iusto id maxime itaque.</p>
                        <a href="#" class="btn btn-info">En savoir plus</a>
                    </div>
                </div>

            </div>

            <!--online training-->

            <div class="row mb-5 flex-md-row-reverse  ">

                <div class="col-md-4 px-0">
                    <img src="assets/img/services/online-training.jpeg" alt="online training" class="img-thumbnail card"
                        style="height:260px; width:100%">
                </div>

                <div class="card col-md-8">
                    <div class="card-header">
                        Online training
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aliquid,
                            laborum veniam
                            minus nobis accusamus dignissimos rem nam odit eos. Minima consequuntur, eaque voluptatem
                            modi perspiciatis
                            iusto id maxime itaque.
                        </p>
                        <a href="#" class="btn btn-info">En savoir plus</a>
                    </div>
                </div>

            </div>

            <!--Démonstration en entreprise-->

            <div class="row ">

                <div class="col-md-4 px-0">
                    <img src="assets/img/services/board.jpg" alt="Démonstration en entreprise"
                        class="img-thumbnail card" style="height:260px;width:100%" id="card">
                </div>


                <div class="card col-md-8">
                    <div class="card-header">
                        Démonstration en entrerprise
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Démonstration en entreprise</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aliquid,
                            laborum veniam
                            minus nobis accusamus dignissimos rem nam odit eos. Minima consequuntur, eaque voluptatem
                            modi perspiciatis
                            iusto id maxime itaque.</p>
                        <a href="#" class="btn btn-info">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!--section contact-->

        </section>

        <h1 class="mb-5 text-center">Nous <b class="blue">contacter</b></h1>

        <div class="container">
            <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                role="form">
                <div class="row">
                    <div class="col-xl-10 col-md-12  mx-auto  border rounded shadow-lg background-form text-white">
                        <div class="row">

                            <!--first-name-->

                            <div class="col-md-6 col-xs-12">
                                <div class="form-group mt-3">
                                    <label>Prenom</label>
                                    <input type="text" onkeyup="verifPrenom();" name="prenom" id="prenom" placeholder="Saisissez votre prénom"
                                        class="form-control" value="<?php echo $prenom; ?>">
                                    <p class="comments"><?php echo $prenomError; ?></p>
                                </div>
                            </div>

                            <!--second-name-->

                            <div class="col-md-6 col-xs-12 ">
                                <div class="form-group mt-3">
                                    <label>Nom</label>
                                    <input type="text" onkeyup="verifNom();" name="nom" id="nom" placeholder="Saisissez votre nom" class="form-control"
                                        value="<?php echo $nom; ?>">
                                    <p class="comments"><?php echo $nomError; ?></p>
                                </div>
                            </div>
                        </div>

                        <!--email-->

                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">@</div>
                                        </div>
                                        <input onkeyup="verifMail();" type="text" name="email" id="email" placeholder="Saisissez votre email" class="form-control" value="<?php echo $email; ?>">
                                    </div>
                                    <p class="comments"><?php echo $emailError; ?></p>
                                </div>
                            </div>

                        
                            <!--gender-->

                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Genre</label>
                                    <select class="form-control" name="genre" value="<?php echo $genre; ?>">
                                        <option value="NULL">- Genre -</option>
                                        <option <?php if ($genre == 'Homme' ) echo $genre ; ?> value="Homme">Homme</option>
                                        <option value="Femme">Femme</option>
                                    </select>
                                    <p class="comments"><?php echo $genreError; ?></p>
                                </div>
                            </div>
                           
                        </div>

                        <!--questions-->

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Sujet</label>
                                    <select class="form-control" name="sujet" value="<?php echo $sujet; ?>">
                                        <option value="Autre">Autre</option>
                                        <option value="Nos produits">Nos Produits</option>
                                        <option value="Nos Services">Nos Services</option>
                                        <option value="Nos Horaires">Nos Horaires</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!--Country choice-->

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Choix du Pays</label>
                                    <select class="form-control" name="pays" value="<?php echo $pays; ?>">
                                        <option value="NULL" selected="selected">- Pays -</option>
                                        <option value="Afghanistan">Afghanistan </option>
                                        <option value="Afrique_Centrale">Afrique_Centrale </option>
                                        <option value="Afrique_du_sud">Afrique_du_Sud </option>
                                        <option value="Albanie">Albanie </option>
                                        <option value="Algerie">Algerie </option>
                                        <option value="Allemagne">Allemagne </option>
                                        <option value="Andorre">Andorre </option>
                                        <option value="Angola">Angola </option>
                                        <option value="Anguilla">Anguilla </option>
                                        <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                        <option value="Argentine">Argentine </option>
                                        <option value="Armenie">Armenie </option>
                                        <option value="Australie">Australie </option>
                                        <option value="Autriche">Autriche </option>
                                        <option value="Azerbaidjan">Azerbaidjan </option>
                                        <option value="Bahamas">Bahamas </option>
                                        <option value="Bangladesh">Bangladesh </option>
                                        <option value="Barbade">Barbade </option>
                                        <option value="Bahrein">Bahrein </option>
                                        <option value="Belgique">Belgique </option>
                                        <option value="Belize">Belize </option>
                                        <option value="Benin">Benin </option>
                                        <option value="Bermudes">Bermudes </option>
                                        <option value="Bielorussie">Bielorussie </option>
                                        <option value="Bolivie">Bolivie </option>
                                        <option value="Botswana">Botswana </option>
                                        <option value="Bhoutan">Bhoutan </option>
                                        <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                        <option value="Bresil">Bresil </option>
                                        <option value="Brunei">Brunei </option>
                                        <option value="Bulgarie">Bulgarie </option>
                                        <option value="Burkina_Faso">Burkina_Faso </option>
                                        <option value="Burundi">Burundi </option>
                                        <option value="Caiman">Caiman </option>
                                        <option value="Cambodge">Cambodge </option>
                                        <option value="Cameroun">Cameroun </option>
                                        <option value="Canada">Canada </option>
                                        <option value="Canaries">Canaries </option>
                                        <option value="Cap_vert">Cap_Vert </option>
                                        <option value="Chili">Chili </option>
                                        <option value="Chine">Chine </option>
                                        <option value="Chypre">Chypre </option>
                                        <option value="Colombie">Colombie </option>
                                        <option value="Comores">Colombie </option>
                                        <option value="Congo">Congo </option>
                                        <option value="Congo_democratique">Congo_democratique </option>
                                        <option value="Cook">Cook </option>
                                        <option value="Coree_du_Nord">Coree_du_Nord </option>
                                        <option value="Coree_du_Sud">Coree_du_Sud </option>
                                        <option value="Costa_Rica">Costa_Rica </option>
                                        <option value="Cote_d_Ivoire">CÃ´te_d_Ivoire </option>
                                        <option value="Croatie">Croatie </option>
                                        <option value="Cuba">Cuba </option>
                                        <option value="Danemark">Danemark </option>
                                        <option value="Djibouti">Djibouti </option>
                                        <option value="Dominique">Dominique </option>
                                        <option value="Egypte">Egypte </option>
                                        <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                        <option value="Equateur">Equateur </option>
                                        <option value="Erythree">Erythree </option>
                                        <option value="Espagne">Espagne </option>
                                        <option value="Estonie">Estonie </option>
                                        <option value="Etats_Unis">Etats_Unis </option>
                                        <option value="Ethiopie">Ethiopie </option>
                                        <option value="Falkland">Falkland </option>
                                        <option value="Feroe">Feroe </option>
                                        <option value="Fidji">Fidji </option>
                                        <option value="Finlande">Finlande </option>
                                        <option value="France">France </option>
                                        <option value="Gabon">Gabon </option>
                                        <option value="Gambie">Gambie </option>
                                        <option value="Georgie">Georgie </option>
                                        <option value="Ghana">Ghana </option>
                                        <option value="Gibraltar">Gibraltar </option>
                                        <option value="Grece">Grece </option>
                                        <option value="Grenade">Grenade </option>
                                        <option value="Groenland">Groenland </option>
                                        <option value="Guadeloupe">Guadeloupe </option>
                                        <option value="Guam">Guam </option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernesey">Guernesey </option>
                                        <option value="Guinee">Guinee </option>
                                        <option value="Guinee_Bissau">Guinee_Bissau </option>
                                        <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                        <option value="Guyana">Guyana </option>
                                        <option value="Guyane_Francaise ">Guyane_Francaise </option>
                                        <option value="Haiti">Haiti </option>
                                        <option value="Hawaii">Hawaii </option>
                                        <option value="Honduras">Honduras </option>
                                        <option value="Hong_Kong">Hong_Kong </option>
                                        <option value="Hongrie">Hongrie </option>
                                        <option value="Inde">Inde </option>
                                        <option value="Indonesie">Indonesie </option>
                                        <option value="Iran">Iran </option>
                                        <option value="Iraq">Iraq </option>
                                        <option value="Irlande">Irlande </option>
                                        <option value="Islande">Islande </option>
                                        <option value="Israel">Israel </option>
                                        <option value="Italie">italie </option>
                                        <option value="Jamaique">Jamaique </option>
                                        <option value="Jan Mayen">Jan Mayen </option>
                                        <option value="Japon">Japon </option>
                                        <option value="Jersey">Jersey </option>
                                        <option value="Jordanie">Jordanie </option>
                                        <option value="Kazakhstan">Kazakhstan </option>
                                        <option value="Kenya">Kenya </option>
                                        <option value="Kirghizstan">Kirghizistan </option>
                                        <option value="Kiribati">Kiribati </option>
                                        <option value="Koweit">Koweit </option>
                                        <option value="Laos">Laos </option>
                                        <option value="Lesotho">Lesotho </option>
                                        <option value="Lettonie">Lettonie </option>
                                        <option value="Liban">Liban </option>
                                        <option value="Liberia">Liberia </option>
                                        <option value="Liechtenstein">Liechtenstein </option>
                                        <option value="Lituanie">Lituanie </option>
                                        <option value="Luxembourg">Luxembourg </option>
                                        <option value="Lybie">Lybie </option>
                                        <option value="Macao">Macao </option>
                                        <option value="Macedoine">Macedoine </option>
                                        <option value="Madagascar">Madagascar </option>
                                        <option value="MadÃ¨re">MadÃ¨re </option>
                                        <option value="Malaisie">Malaisie </option>
                                        <option value="Malawi">Malawi </option>
                                        <option value="Maldives">Maldives </option>
                                        <option value="Mali">Mali </option>
                                        <option value="Malte">Malte </option>
                                        <option value="Man">Man </option>
                                        <option value="Mariannes du Nord">Mariannes du Nord </option>
                                        <option value="Maroc">Maroc </option>
                                        <option value="Marshall">Marshall </option>
                                        <option value="Martinique">Martinique </option>
                                        <option value="Maurice">Maurice </option>
                                        <option value="Mauritanie">Mauritanie </option>
                                        <option value="Mayotte">Mayotte </option>
                                        <option value="Mexique">Mexique </option>
                                        <option value="Micronesie">Micronesie </option>
                                        <option value="Midway">Midway </option>
                                        <option value="Moldavie">Moldavie </option>
                                        <option value="Monaco">Monaco </option>
                                        <option value="Mongolie">Mongolie </option>
                                        <option value="Montserrat">Montserrat </option>
                                        <option value="Mozambique">Mozambique </option>
                                        <option value="Namibie">Namibie </option>
                                        <option value="Nauru">Nauru </option>
                                        <option value="Nepal">Nepal </option>
                                        <option value="Nicaragua">Nicaragua </option>
                                        <option value="Niger">Niger </option>
                                        <option value="Nigeria">Nigeria </option>
                                        <option value="Niue">Niue </option>
                                        <option value="Norfolk">Norfolk </option>
                                        <option value="Norvege">Norvege </option>
                                        <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                        <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>
                                        <option value="Oman">Oman </option>
                                        <option value="Ouganda">Ouganda </option>
                                        <option value="Ouzbekistan">Ouzbekistan </option>
                                        <option value="Pakistan">Pakistan </option>
                                        <option value="Palau">Palau </option>
                                        <option value="Palestine">Palestine </option>
                                        <option value="Panama">Panama </option>
                                        <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                        <option value="Paraguay">Paraguay </option>
                                        <option value="Pays_Bas">Pays_Bas </option>
                                        <option value="Perou">Perou </option>
                                        <option value="Philippines">Philippines </option>
                                        <option value="Pologne">Pologne </option>
                                        <option value="Polynesie">Polynesie </option>
                                        <option value="Porto_Rico">Porto_Rico </option>
                                        <option value="Portugal">Portugal </option>
                                        <option value="Qatar">Qatar </option>
                                        <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                        <option value="Republique_Tcheque">Republique_Tcheque </option>
                                        <option value="Reunion">Reunion </option>
                                        <option value="Roumanie">Roumanie </option>
                                        <option value="Royaume_Uni">Royaume_Uni </option>
                                        <option value="Russie">Russie </option>
                                        <option value="Rwanda">Rwanda </option>
                                        <option value="Sahara Occidental">Sahara Occidental </option>
                                        <option value="Sainte_Lucie">Sainte_Lucie </option>
                                        <option value="Saint_Marin">Saint_Marin </option>
                                        <option value="Salomon">Salomon </option>
                                        <option value="Salvador">Salvador </option>
                                        <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                        <option value="Samoa_Americaine">Samoa_Americaine </option>
                                        <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                                        <option value="Senegal">Senegal </option>
                                        <option value="Seychelles">Seychelles </option>
                                        <option value="Sierra Leone">Sierra Leone </option>
                                        <option value="Singapour">Singapour </option>
                                        <option value="Slovaquie">Slovaquie </option>
                                        <option value="Slovenie">Slovenie</option>
                                        <option value="Somalie">Somalie </option>
                                        <option value="Soudan">Soudan </option>
                                        <option value="Sri_Lanka">Sri_Lanka </option>
                                        <option value="Suede">Suede </option>
                                        <option value="Suisse">Suisse </option>
                                        <option value="Surinam">Surinam </option>
                                        <option value="Swaziland">Swaziland </option>
                                        <option value="Syrie">Syrie </option>
                                        <option value="Tadjikistan">Tadjikistan </option>
                                        <option value="Taiwan">Taiwan </option>
                                        <option value="Tonga">Tonga </option>
                                        <option value="Tanzanie">Tanzanie </option>
                                        <option value="Tchad">Tchad </option>
                                        <option value="Thailande">Thailande </option>
                                        <option value="Tibet">Tibet </option>
                                        <option value="Timor_Oriental">Timor_Oriental </option>
                                        <option value="Togo">Togo </option>
                                        <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                        <option value="Tristan da cunha">Tristan de cuncha </option>
                                        <option value="Tunisie">Tunisie </option>
                                        <option value="Turkmenistan">Turmenistan </option>
                                        <option value="Turquie">Turquie </option>
                                        <option value="Ukraine">Ukraine </option>
                                        <option value="Uruguay">Uruguay </option>
                                        <option value="Vanuatu">Vanuatu </option>
                                        <option value="Vatican">Vatican </option>
                                        <option value="Venezuela">Venezuela </option>
                                        <option value="Vierges_Americaines">Vierges_Americaines </option>
                                        <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                        <option value="Vietnam">Vietnam </option>
                                        <option value="Wake">Wake </option>
                                        <option value="Wallis et Futuma">Wallis et Futuma </option>
                                        <option value="Yemen">Yemen </option>
                                        <option value="Yougoslavie">Yougoslavie </option>
                                        <option value="Zambie">Zambie </option>
                                        <option value="Zimbabwe">Zimbabwe </option>
                                    </select>
                                    <p class="comments"><?php echo $paysError; ?></p>
                                </div>
                            </div>
                        </div>

                        <!--message-->

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="textarea">Votre message</label>
                                    <textarea maxlength="1000" onkeyup="verifMessage();" class="form-control" id="textarea" rows="5" name="message" style="resize: none;"><?php echo $message; ?></textarea>
                                    <p class="comments"><?php echo $messageError; ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <!--ohnohoney-->

                        <div class="ohnohoney">
                                <div class="here">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Saisissez votre prénom" class="form-control">
                                </div>
                            </div>
                        <!-- create alert if input is not empty -->
                        <!--submited-->

                        <button class="btn text-white my-3 btn-lg" type="submit" onClick="verifierFormulaire();" id="btn-form"><i class ="fa fa-envelope"></i> Envoyer</button>
                        <p style="display:<?php if($isSuccess) echo'block'; else echo 'none'; ?>"> Votre message a bien été envoyé!!!</p>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->

        <footer class="page-footer font-small text-white  pt-4 mt-5">

            <div class="container text-center text-md-left">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-4 mx-auto">

                        <!-- adresse -->
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Adresse</h5>
                        <ul class="list-unstyled">
                            <li>1 Square des martyrs,</li>
                            <li>6000 Charleroi</li>
                            <li>tel: XXXX XXX XXX</li>
                        </ul>
                    </div>
                    <!-- Grid column -->
                    <div class="col-md-4  mx-auto">
                        <!-- horaire -->
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Horaire</h5>
                        <ul class="list-unstyled">
                            <li>Lundi 10h à 19h</li>
                            <li>Mardi 10h à 19h</li>
                            <li>Mercredi 10h à 19h</li>
                            <li>Jeudi 10h à 19h</li>
                            <li>Vendredi 10h à 19h</li>
                            <li>Samedi 10h à 19h</li>
                        </ul>
                    </div>


                    <!-- Grid column -->
                    <div class="col-md-2 .offset-md-2 mx-auto">

                        <!-- Links -->
                        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                        <ul class="list-unstyled" id="list-link">
                            <li>
                                <a href="#!">Nos partenaires</a>
                            </li>
                            <li>
                                <a href="#!">Revues de presse</a>
                            </li>
                            <li>
                                <a href="#!">Notre catalogue</a>
                            </li>
                            <li>
                                <a href="#!">Blog</a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none">

                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <hr>

            <!-- Call to action -->
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h5 class="mb-1">Register for free</h5>
                </li>
                <li class="list-inline-item">
                    <a href="#!" class="btn btn-info btn-rounded">Sign up!</a>
                </li>
            </ul>
            <!-- Call to action -->

            <hr>

            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center" id="icon">
                <li class="list-inline-item">
                    <a class="fb-ic my-font-awesome" href="#">
                        <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="tw-ic my-font-awesome" href="#">
                        <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="gplus-ic my-font-awesome" href="#">
                        <i class="fab fa-google-plus fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="li-ic my-font-awesome" href="#">
                        <i class="fab fa-linkedin fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="ins-ic my-font-awesome" href="#">
                        <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                    </a>
                </li>
            </ul>
            <!-- Social buttons -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
                <a href="#"> Tiago Rodrigues</a><a href="#"> Samuel Léonard</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->

    






        <script src="./assets/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
    </body>

    </html>