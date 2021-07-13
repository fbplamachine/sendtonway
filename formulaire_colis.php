<?php session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Déposer Annonce Colis - SendTonWay.com</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- font awesome css -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!--Js file -->
    <!-- bootstrap js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


    <!-- tether.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.js"></script>

    <!-- datepicker -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


    <title></title>
</head>
<body>

<div class="navbarr">
    <div class="contain">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="SendTonWay.com"><span
                        style="text-decoration: none; color: #E02D05; font-size:20px">SendTonWay</span></a>
        </div>
        <div class="nav" style="left:91%;">
            <ul>
                <li><a style="background-color: #E02D05; color: #fff;" href="index.php">ACCUEIL</a></li>
            </ul>
        </div>
    </div>
</div>

<br><br><br><br><br>
<div class="col-md-4 container  ">

    <h4 class="my-4 text-center align-text-bottom ">
        <b>Annonce Colis</b> <i class="fas fa-box"></i>
    </h4>
    <form class="needs-validation" novalidate method="post" action="php/colis.php" enctype="multipart/form-data">
        <hr>
        <h4 class="mb-4">Caractéristiques de Colis </h4>

        <div class="form-row ">
            <div class="col-md-12 form-group">
                <label for="N_colis">Nom Colis * </label>
                <div class="input-group">
                    <input type="text" class="form-control" id="N_colis" name="N_colis"
                           placeholder="veuillez écrire le nom de colis" required>
                    <div class="invalid-feedback">
                        Nom de colis requis
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3 form-group ">
                <label for="poid">Poid (KG) *</label>
                <div class="input-group">
                    <input type="number" step="0.1" min="0.1" class="form-control justify-content-center"
                           placeholder="KG" name="poid_colis">
                    <!-- <select type="text" class="form-control text-center" name="poid_colis" id="poid" required>
                        <option value="">Poid </option>
                        <option value="[0,5]"> [0,5] KG </option>
                        <option value="[6,15]"> [6,15] KG </option>
                        <option value="[16,30]"> [16,30] KG </option>
                        <option value="+31"> +31 KG </option>

                    </select> -->

                    <div class="invalid-feedback">
                        veuillez sélectionner le poid
                    </div>
                </div>
            </div>

            <div class="col-9 form-group">
                <label for="Taille">Taille * </label>
                <select type="text" class="form-control" name="taille_colis" id="Taille" required>
                    <option value="">Choisir</option>
                    <option value="petit">Petit (Exemple: Téléphone,clés )</option>
                    <option value="moyen">moyen (Exemple: Ordinateur,vêtements)</option>
                    <option value="grand">grand (Exemple: Commode,lit bébé)</option>
                    <option value="tres grand">très grand (Exemple: Plusieurs cartons,matelas)</option>
                </select>
                <div class="invalid-feedback">
                    veuillez sélectionner la taille
                </div>
            </div>
        </div>


        <hr class="mb-4">
        <div class="row">

            <div class="custom-control  custom-switch ml-3 mb-2">
                <input type="checkbox" class="custom-control-input " id="d_s" name="demande_special">
                <label for="d_s" class="custom-control-label">Demande Speical</label>
            </div>
        </div>

        <div class=" mb-2">
            <div class="input-group">
                    <textarea class="form-control" name="text_demande" id="text_demande" rows="5" id="comment"
                              placeholder="Ecrire votre demande"
                    ></textarea>
                <div class="invalid-feedback">
                    veuillez érire votre demande
                </div>
            </div>
        </div>

        <hr class="mb-4">

        <h4 class="mb-4">Date de d'envoi et dépot </h4>
        <div class="row">
            <div class="col">
                <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Date d'envoi *"
                       required=""/>
                <div class="invalid-feedback">
                    veuillez sélectionner la date d'envoi
                </div>
            </div>
            <div class="col form-group">
                <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Date de dépot *"
                       required/>
                <div class="invalid-feedback">
                    veuillez sélectionner la date de depot
                </div>
            </div>
        </div>
        <br>


        <hr class="mb-4">

        <h4 class="mb-4">L'adresse de départ et d'arrivé </h4>
        <div class="row">
            <div class="col form-group ">
                <label for="ville_d">ville de départ * </label>
                <select type="text" class="form-control text-center" name="ville_d" id="ville_d"
                        required>
                    <option value="">Choisir</option>
                    <option value="Douala">01 Douala</option>
                    <option value="Yaoundé">02 Yaoundé</option>
                    <option value="Garoua">03 Garoua</option>
                    <option value="Bamenda">04 Bamenda</option>
                    <option value="Maroua">05 Maroua</option>
                    <option value="Nkongsamba">06 Nkongsamba</option>
                    <option value="Bafoussam">07 Bafoussam</option>
                    <option value="Ngaoundéré">08 Ngaoundéré</option>
                    <option value="Bertoua">09 Bertoua</option>
                    <option value="Loum">10 Loum</option>
                    <option value="Kumba">11 Kumba</option>
                    <option value="Edéa">12 Edéa</option>
                    <option value="Kumbo">13 Kumbo</option>
                    <option value="Foumban">14 Foumban</option>
                    <option value="Mbouda">15 Mbouda</option>
                    <option value="Dschang">16 Dschang</option>
                    <option value="Limbé">17 Limbé</option>
                    <option value="Ebolowa">18 Ebolowa</option>
                    <option value="Kousséri">19 Kousséri</option>
                    <option value="Guider">20 Guider</option>
                    <option value="Meiganga">21 Meiganga</option>
                    <option value="Yagoua">22 Yagoua</option>
                    <option value="Mbalmayo">23 Mbalmayo</option>
                    <option value="Bafang">24 Bafang</option>
                    <option value="Tiko">25 Tiko</option>
                    <option value="Bafia">26 Bafia</option>
                    <option value="Wum">27 Wum</option>
                    <option value="Kribi">28 Kribi</option>
                    <option value="Buea">29 Buea</option>
                    <option value="Sangmélima">30 Sangmélima</option>
                    <option value="Foumbot">31 Foumbot</option>
                    <option value="Bangangté">32 Bangangté</option>
                    <option value="Banyo">33 Banyo</option>
                    <option value="Mokolo">34 Mokolo</option>
                    <option value="Garoua-Boulaï">35 Garoua-Boulaï</option>
                    <option value="Mora">36 Mora</option>
                    <option value="Kaélé">37 Kaélé</option>
                    <option value="Tibati">38 Tibati</option>
                    <option value="Ndop">39 Ndop</option>
                    <option value="Akonolinga">40 Akonolinga</option>
                    <option value="Eséka">41 Eséka</option>
                    <option value="Obala">42 Obala</option>
                    <option value="Koutaba">43 Koutaba</option>
                    <option value="Guidiguis">44 Guidiguis</option>
                    <option value="Figuil">45 Figuil</option>
                    <option value="Makénéné">46 Makénéné</option>
                    <option value="Gazawa">47 Gazawa</option>
                    <option value="Tcholliré">48 Tcholliré</option>
                </select>
                <div class="invalid-feedback">
                    veuillez sélectionner la ville de départ
                </div>
            </div>

            <div class="col form-group ">
                <label for="ville_a">ville d'arrivé * </label>
                <select type="text" class="form-control text-center" name="ville_a" id="ville_a"
                        required>
                    <option value="">Choisir</option>
                    <option value="Douala">01 Douala</option>
                    <option value="Yaoundé">02 Yaoundé</option>
                    <option value="Garoua">03 Garoua</option>
                    <option value="Bamenda">04 Bamenda</option>
                    <option value="Maroua">05 Maroua</option>
                    <option value="Nkongsamba">06 Nkongsamba</option>
                    <option value="Bafoussam">07 Bafoussam</option>
                    <option value="Ngaoundéré">08 Ngaoundéré</option>
                    <option value="Bertoua">09 Bertoua</option>
                    <option value="Loum">10 Loum</option>
                    <option value="Kumba">11 Kumba</option>
                    <option value="Edéa">12 Edéa</option>
                    <option value="Kumbo">13 Kumbo</option>
                    <option value="Foumban">14 Foumban</option>
                    <option value="Mbouda">15 Mbouda</option>
                    <option value="Dschang">16 Dschang</option>
                    <option value="Limbé">17 Limbé</option>
                    <option value="Ebolowa">18 Ebolowa</option>
                    <option value="Kousséri">19 Kousséri</option>
                    <option value="Guider">20 Guider</option>
                    <option value="Meiganga">21 Meiganga</option>
                    <option value="Yagoua">22 Yagoua</option>
                    <option value="Mbalmayo">23 Mbalmayo</option>
                    <option value="Bafang">24 Bafang</option>
                    <option value="Tiko">25 Tiko</option>
                    <option value="Bafia">26 Bafia</option>
                    <option value="Wum">27 Wum</option>
                    <option value="Kribi">28 Kribi</option>
                    <option value="Buea">29 Buea</option>
                    <option value="Sangmélima">30 Sangmélima</option>
                    <option value="Foumbot">31 Foumbot</option>
                    <option value="Bangangté">32 Bangangté</option>
                    <option value="Banyo">33 Banyo</option>
                    <option value="Mokolo">34 Mokolo</option>
                    <option value="Garoua-Boulaï">35 Garoua-Boulaï</option>
                    <option value="Mora">36 Mora</option>
                    <option value="Kaélé">37 Kaélé</option>
                    <option value="Tibati">38 Tibati</option>
                    <option value="Ndop">39 Ndop</option>
                    <option value="Akonolinga">40 Akonolinga</option>
                    <option value="Eséka">41 Eséka</option>
                    <option value="Obala">42 Obala</option>
                    <option value="Koutaba">43 Koutaba</option>
                    <option value="Guidiguis">44 Guidiguis</option>
                    <option value="Figuil">45 Figuil</option>
                    <option value="Makénéné">46 Makénéné</option>
                    <option value="Gazawa">47 Gazawa</option>
                    <option value="Tcholliré">48 Tcholliré</option>
                </select>
                <div class="invalid-feedback">
                    veuillez sélectionner ville d'arrivé
                </div>
            </div>
        </div>

        <div>
            <label for="@_d"> Adresse exacte de départ </label>
            <input type="text" class="form-control" name="@_d" id="@_d" value="" required>
        </div>

        <br>

        <div>
            <label for="@_a"> Adresse exacte d'arrivé </label>
            <input type="text" name="@_a" class="form-control" id="@_a" value="" required>
        </div>
        <hr class="mb-4">

        <div class="row">
            <div class="col">
                <h4>Photo de colis </h4>
                <div class="input-group">
                    <label class="input-group-btn">
                                    <span class="btn btn-success">
                                        Importez une photo&hellip; <input type="file" name="photo_colis"
                                                                          style="display: none;" multiple>
                                    </span>
                    </label>
                    <input type="text" name="titre_photo" class="form-control" readonly>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['id_trajet'])) {
            # code...
            ?>
            <input type="text" name="id_trajet" value="<?php echo $_GET['id_trajet'] ?> " hidden>
            <input type="text" name="id_compte_ann" value="<?php echo $_GET['id_compte'] ?> " hidden>
        <?php } else {
            ?>
            <input type="text" name="id_trajet" value="" hidden>
            <input type="text" name="id_compte_ann" value="" hidden>
        <?php } ?>
        <hr class="mb-4">
        <div class=" d-flex justify-content-center ">
            <div class="col-8  ">
                <button class="btn btn-primary btn-block mb-4" name="submit_colis" type="submit">Valider</button>
            </div>
        </div>
        <!--                <hr class="mb-4">-->
        <!---->
        <!--                <button class="btn btn-primary bt-md btn-block" type="submit" name="submit_colis">Continue</button>-->
        <!--                <hr>-->
        <!--                <hr>-->

    </form>
</div>
<script type="text/javascript">
    $(function () {

        // We can attach the `fileselect` event to all file inputs on the page
        $(document).on('change', ':file', function () {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        // We can watch for our custom `fileselect` event like this
        $(document).ready(function () {
            $(':file').on('fileselect', function (event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });
        });

    });
    $(document).ready(function () {
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        $(function () {
            $("#from_date").datepicker();
            $("#to_date").datepicker();
        });
    });
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    $(document).ready(function () {
        $("#d_s").click(function () {
            if (!$("#text_demande").prop('required')) {
                $("#text_demande").prop('required', true);
            } else {
                $("#text_demande").prop('required', false);
            }

        });
    });

</script>
</body>
</html>
