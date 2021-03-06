<!DOCTYPE html>
<html>
<head>
    <title>Déposer Annonce Trajet - SendTonWay.com</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/form_trajet_css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">

    <?php
    $Villes = include 'villes.txt';
    $i = 0;
    echo '<script type="text/javascript">

                         function addField()
                         {
                           var holder = document.getElementById("inputs"),
                           div = document.createElement("div"),
                           label = document.createElement("label"),
                           select = document.createElement("select");

      label.innerText = ""; // texte du label
      select.type = "text"; // type text
      select.className = "form-control"; // class
      select.name = "arret[]"; // nom du champ
      var option = document.createElement("option");
      	select.appendChild(option);';

    for ($i = 0; $i < 48; $i++) {
        echo 'option = document.createElement("option");
      	select.appendChild(option);
     	option.text="' . $Villes[$i] . '";
      	option.value="' . $Villes[$i] . '";';


    }

    echo '
      div.appendChild(label);
      div.appendChild(select);
      holder.appendChild(div);

      return false;
}

    </script>'; ?>


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

<div class="col-md-4 container bg-default">


    <h4 class="my-4 text-center align-text-bottom ">
        <b>Annonce Trajet</b> <i class="fas fa-road"></i>
    </h4>

    <form method="POST" action='php/trajet.php'>
        <hr class="mb-4">
        <div class="row">
            <h5 class="my-3">
                <label for="country">Départ</label>
            </h5>
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="country">Ville *</label>
                <select type="text" class="form-control" name="depart" required>
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
                    Veuillez Choisir une Ville.
                </div>
            </div>


            <div class="row">
                <h5 class="my-3">
                    <label for="country">Arrivé</label>
            </div>
        </div>


        <div class="form-group">
            <div class="form-group">
                <label for="country">Ville *</label>
                <select type="text" class="form-control" name="arrive" required>
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
                    Veuillez Choisir une Ville.
                </div>
            </div>


            <div class="row">
                <h5 class="my-3">
                    <label for="country">Arrets</label>
            </div>

            <div class="form-group">
                <label for="text" name="arrets">"Augumenter vos chances de trouver un colis en ajoutant des villes de
                    passage !"</label>
                <div id="inputs">

                </div>

                <div class="my-3">
                    <input class="form-control" type="button" value="Ajouter un champ" onclick="addField();">
                </div>

                <div class="row">
                    <h5 class="my-3">
                        <label for="country">Détour max*</label>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <select type="text" class="form-control" name="detour_max" required>
                            <option value>Choisir...</option>
                            <option>00 -50 km</option>
                            <option>50 -80 km</option>
                            <option>80 -100 km</option>
                            <option>100 -150 km</option>
                            <option>Plus 150 km</option>
                        </select>
                        <div class="invalid-feedback">
                            Veuillez Choisir un champ.
                        </div>
                    </div>

                    <div class="row">
                        <h5 class="my-3">
                            <label for="country">Moyen de transport*</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="moy_transport" value="Avion" id="Avion"
                                   required>
                            <i class="fa fa-1"> &#9992;&#65039; </i>
                            <label for="Avion" class="form-check-label">Avion</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="moy_transport" value="Voiture"
                                   id="Voiture" required>
                            <i class="fa fa-1"> &#128664; </i>
                            <label for="Voiture" class="form-check-label">Voiture</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="moy_transport" value="Camionette/camion"
                                   id="Camionette/camion" required>
                            <i class="fa fa-1"> &#128656; </i>
                            <label for="Camionette/camion" class="form-check-label">Camionette/camion</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="moy_transport" value="Train" id="Train"
                                   required>
                            <i class="fa fa-1"> &#128642; </i>
                            <label for="Train" class="form-check-label">Train</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="moy_transport" value="Bus" id="Bus"
                                   required>
                            <i class="fa fa-1"> &#128652; </i>
                            <label for="Bus" class="form-check-label">Bus</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="moy_transport" value="Bâteau" id="Bateau"
                                   required>
                            <i class="fa fa-1"> &#128674; </i>
                            <label for="Bâteau" class="form-check-label">Bâteau</label>
                        </div>

                    </div>

                    <div class="row">
                        <h5 class="my-3">
                            <label for="country">Taille de colis*</label>
                    </div>

                    <div class="row">
                        <div class="col-md-4 form-group">

                            <i class="fa fa-1"> &#9993;&#65039;</i>

                            <label for="country">Petit</label>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="taille_max" value="Petit"
                                       id="Petit">
                                Téléphone, clés...
                                <label for="shipping-adress" class="form-check-label"></label>
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <i class="fa fa-1"> &#128187;</i>
                            <label for="country">Moyen</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="taille_max" value="Moyen"
                                       id="Moyen">
                                Ordinateur, livres, vêtements...
                                <label for="shipping-adress" class="form-check-label"></label>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-4 form-group">

                            <i class="fa fa-1"> &#128452;&#65039; </i>

                            <label for="country">Grand</label>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="taille_max" value="Grand"
                                       id="Grand">
                                Commode, chaise, lit bébé...
                                <label for="shipping-adress" class="form-check-label"></label>
                            </div>
                        </div>

                        <div class="col-md-4 form-group">
                            <i class="fa fa-1"> &#128230; </i>
                            <label for="country">Trés Grand</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="taille_max" value="Tres Grand"
                                       id="Tres Grand">
                                Plusieurs cartons, matelas, canapé...
                                <label for="shipping-adress" class="form-check-label"></label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <h5 class="my-3">
                            <label for="country">Poids</label>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">(kg)</span>
                            </div>
                            <input type="text" class="form-control" name="poids"
                                   placeholder="Poids max que vous pouvez transporté" required>
                            <div class="invalid-feedback">
                                Veuillez entrez le poids.
                            </div>
                        </div>

                        <div class="row">
                            <h5 class="my-3">
                                <label for="country">Fréquences*</label>
                        </div>

                        <label for="text">Voyagez vous régulièrement ?*</label>

                        <hr>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="freq" value="non" required>
                            <label for="non" class="form-check-label">Non je fais pas des voyages réguliers</label>
                        </div>

                        <hr>

                        <div class="col-md-6 form-group">
                            <label for="dateofbirth">Départ*</label>
                            <input type="date" id="date_depart" name="date_depart" class="form-control" maxlength="10">
                            <span class="input-group-addon"><span class="fa" style="cursor:pointer" id="date_depart"
                                                                  name="date_depart" required></span>
                        </span>
                            <span class="fa " style="cursor:pointer" id="date_depart" name="date_depart"></span>

                            <div class="invalid-feedback">
                                Veuillez Choisir une date.
                            </div>
                        </div>


                        <div class="col-md-6 form-group">
                            <label for="dateofbirth">Retour (optionnel)</label>
                            <input type="date" id="date_retour" name="date_retour" class="form-control" maxlength="10">
                            <span class="input-group-addon" id="date_retour" name="date_retour" required>
                        <span class="fa" style="cursor:pointer" id="date_retour" name="date_retour"></span>

                        <div class="invalid-feedback">
                            Veuillez Choisir une date.
                        </div>
                        </div>


                        <hr>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="freq" value="oui" required>
                            <label for="oui" class="form-check-label">Oui je voyage régulièrement</label>
                        </div>

                        <hr>
                        <p>Départ*</p>

                        <div class="my-3">

                            <div class="col-md-6 form-group">
                                <input type="date" id="jour" name="jour" class="form-control" maxlength="10">
                                <span class="input-group-addon" id="jour" name="jour"><span class="fa "
                                                                                            style="cursor:pointer"
                                                                                            id="jour"
                                                                                            name="jour"></span></span>
                                <span class="fa " style="cursor:pointer" id="jour" name="jour"></span>

                                <div class="invalid-feedback">
                                    Veuillez Choisir une date.
                                </div>
                            </div>

                        </div>


                        <div class="my-3">

                            <label for="dateofbirth">Fréquence de voyage*</label>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="frequence" value="1"
                                       id="1 fois par semaine">
                                <label for="Voiture" class="form-check-label">1 fois par semaine</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="frequence" value="2"
                                       id="2 fois par semaine">
                                <label for="Camionette/camion" class="form-check-label">2 fois par semaine</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="frequence" value="3"
                                       id="3 fois par semaine">
                                <label for="Train" class="form-check-label">3 fois par semaine</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="frequence" value="4"
                                       id="4 fois par semaine">
                                <label for="Bus" class="form-check-label">4 fois par semaine</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="frequence" value="5"
                                       id="5 fois par semaine">
                                <label for="Bâteau" class="form-check-label">5 fois par semaine</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="frequence" value="6"
                                       id="6 fois par semaine">
                                <label for="Voiture" class="form-check-label">6 fois par semaine</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="frequence" value="7"
                                       id="7 fois par semaine">
                                <label for="Camionette/camion" class="form-check-label">7 fois par semaine</label>
                            </div>

                            <div class="invalid-feedback">
                                Veuillez Choisir un champ.
                            </div>

                        </div>

                    </div>


                    <?php if (isset($_GET['id_colis'])) {
                        # code...
                        ?>
                        <input type="text" name="id_colis" value="<?php echo $_GET['id_colis'] ?> " hidden>
                        <input type="text" name="id_compte_ann" value="<?php echo $_GET['id_compte'] ?> " hidden>
                    <?php } else {
                        ?>
                        <input type="text" name="id_colis" value="" hidden>
                        <input type="text" name="id_compte_ann" value="" hidden>
                    <?php } ?>

                    <div class="form-group">
                        <button class="btn btn-primary bt-lg btn-block" type="submit" name="envoyer">Valider</button>
                    </div>

    </form>
</div>

</body>
</html>
