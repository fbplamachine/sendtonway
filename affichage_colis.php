<?php
session_start();

if ((!isset($_GET['from'])) || (isset($_GET['from'])) && (($_GET['from'] != 'user') && ($_GET['from'] != 'admin'))) $_GET['from'] = 'user';
if ((isset($_GET['from'])) && ($_GET['from'] == 'admin') && (!$_SESSION['nom_admin'])) $_GET['from'] = 'user';
if (!isset($_SESSION['nom'])) $_SESSION['nom'] = "";

function affichage($row, $row2, $row3)
{
    $output =
        '<div class="rela-block image-grid-container top-container  mt-2 " style="width:700px; height:350px; padding-top:5px;">
       <div class="floated image-column 1"  >
         <div class="rela-block image">
           <section class="box main">
         </div>
             <div class="wrap-content">
               <div class="first">
                 <div style="display:flex; flex-direction:row;" >
                   <div style="display: flex ; flex-direction: column ;margin-left: 10px ; width: 250px;">';
    if ($row['photo']) {
        $output .= '<img src="' . $row['photo'] . '" style="width: 240px; height: 240px;border-radius: 3%;margin-bottom : 20px; ">';
    } else {
        $output .= '<img src="img_colis/unkonwn-colis.jpg" style="width: 230px; height: 230px;border-radius: 3%; margin-bottom : 20px; ">';
    }
    $output .= ' <h4 class="badge badge-pill" style=" display: flex ; justify-content: center; font-size:20px;">Prix : ' . $row["tarif"] . ' FCFA </h3>
                   </div>
                 <div style="width:440px;">
                  <a href="profile.php?id=' . $row['id_compte_e'] . '&from=' . $_GET['from'] . '" target="_blank">';
    if ($row3['photo']) {
        $output .= '<img  src="img_profiles/' . $row3['photo'] . '"  alt="" style="border-radius: 50%; width: 40px;"  class="mb-2" > <span class=" text-body h5">' . $row3["prenom"] . " " . $row3["nom"] . ' </span> </a>';
    } else {
        $output .= '<img  src="./images/profile.png"  alt="" style="border-radius: 50%; width: 40px;"  class="mb-2"> <span class=" text-body h5">' . $row3["prenom"] . " " . $row3["nom"] . ' </span> </a>';
    }
    $output .= '

                   <div style="lign-height:0.5px;">
                     <div class=" text-body " style="font-size:17px; margin-bottom:8px;">
                       Nom de colis : ' . $row["nom"] . '
                     </div>
                    <div class=" text-body " style="font-size:17px; margin-bottom:8px;">
                      ' . $row2["lieux_depart"] . '
                      <i class="fas fa-arrow-right"> </i>
                      ' . $row2["lieux_arrive"] . '
                    </div>';

    if ($row["adr_depart"]) {
        $output .= ' <div class="badge badge-pill " data-trigger="hover" data-html="true" data-toggle="popover" title="Adresse exacte" data-content="Adresse de depart : ' . $row["adr_depart"] . ' <br /> ';
    } else {
        $output .= ' <div class="badge badge-pill " data-trigger="hover" data-html="true" data-toggle="popover" title="Adresse exacte" data-content="Adresse de depart : il n\'existe pas <br /> ';
    }
    if ($row["adr_arrive"]) {
        $output .= 'Adresse d\'arrivée : ' . $row["adr_arrive"] . ' "
                        style="font-size:15px; margin-bottom:5px;" > Addresse exacte </div> ';
    } else {
        $output .= 'Adresse d\'arrivée : il n\'existe pas "
                        style="font-size:15px; margin-bottom:5px;" > Addresse exacte </div> ';
    }
    $output .= '
                     <div class=" text-body " style="font-size:17px; margin-bottom:5px;">
                       Envoi : ' . $row["date_envoi"] . ' | Depot : ' . $row["date_depot"] . '
                     </div>
                    <div class=" text-body " style="font-size:17px; margin-bottom:5px;">
                      Taille : ' . $row["taille"] . ' | Poid : ' . $row["poids"] . ' KG
                    </div> ';
    if (!empty($row["demande_spec"])) {
        $output .= ' <div class="badge badge-pill " data-trigger="hover" data-toggle="popover" title="Demande speical" data-content="' . $row["demande_spec"] . '"
                     style="font-size:15px; margin-bottom:5px;" > Demande Special </div> ';
    } else {
        $output .= ' <div class="badge badge-pill " style="font-size:15px; margin-bottom:5px;" > </div> ';
    }
    $output .= '<div class="text muted mb-3" > publié le ' . $row["date_annonce"] . '  </div> ';
    if ($_GET['from'] == 'user') {
        if ($_SESSION['nom']) {
            $output .= '<a href="choix_trajet.php?id_colis=' . $row["id_colis"] . '&id_compte=' . $row["id_compte_e"] . ' " target="_blank" >
                          <button type="submit" class="btn btn-primary button" style ="color:#fff; background-color: #E02D05; "> Demander </button>
                          </a>';
        } else {
            $output .= '<a href="#" onclick="connecter()" >
                          <button type="submit" class="btn btn-primary button" style ="color:#fff; background-color: #E02D05; "> Demander </button>
                          </a> ';
        }
    } else if ($_GET['from'] == 'admin') {

        $output .= '<a href="#" onclick="supp(1,' . $row['id_colis'] . ')">
                          <button class="btn btn-danger button" > Supprimer </button>
                          </a>';

    }
    $output .= '
                  </div>
                </div>
                 </div>
               </div>

             </div>
           </section>
         </div>
   </div> ';
    return $output;
}

date_default_timezone_set('Africa/Douala');
$date_jour = date('Y-m-d');
$connect = mysqli_connect("localhost", "root", "", "projet2cp");
$echec = ' SELECT * FROM colis where `date_depot` < \'' . $date_jour . '\' ';
$result_echec = mysqli_query($connect, $echec);
if (mysqli_num_rows($result_echec) > 0) {
    while ($row_echec = mysqli_fetch_array($result_echec)) {
        $ss = 'UPDATE `colis` SET `etat`=\'echec\' WHERE `id_colis` = ' . $row_echec['id_colis'] . ' AND etat="annonce" ';
        $s = mysqli_query($connect, $ss);
    }
}
if ($_SESSION['nom']) {
    $query = "SELECT * FROM colis where (`id_compte_e` != {$_SESSION['id_compte']}) AND (supp = 0) and (etat = 'annonce') ORDER BY date_annonce desc  ";
} else {
    $query = "SELECT * FROM colis where (supp = 0) and (etat = 'annonce') ORDER BY date_annonce desc  ";
}
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <!-- Site Title -->
    <link rel="icon" href="images/icon.png">

    <title>Annonces Colis - SendTonWay.com</title><!--
            CSS
            ============================================= -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" href="affichage-colis/css/linearicons.css"> -->
    <!-- <link rel="stylesheet" href="affichage-colis/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="affichage-colis/css/nice-select.css"> -->
    <!-- <link rel="stylesheet" href="affichage-colis/css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="affichage-colis/css/main.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/wow.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <style type="text/css">
        .boutton {
            float: right;
            width: 145px;
            height: 41px;
            border: 1px solid #E02D05;
            text-align: center;
            font-size: 14px;
            color: #E02D05;
            font-weight: normal;
            text-transform: uppercase;
            line-height: 41px;
            margin: 0 0 0 0;
            border: 1px solid #E02D05;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            transition: 0.5s;
            -webkit-transition: 0.5s;
            background: #fff;
            text-decoration: none;
        }

        .boutton:hover {
            text-decoration: none;
            background: #E02D05;
            border: 1px solid #E02D05;
            color: #fff;
        }

        h2.s1 {
            color: #000;
            font-size: 35px;
            text-align: center;
            font-family: 'Raleway';
        }
    </style>

</head>


<body id="category" style="background-color: #fff;">


<div class="container-fluid">


    <div class="row">


        <div class="navbarr">
            <div class="contain">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" alt="SendTonWay.com"><span
                                style="text-decoration: none; color: #E02D05; font-size:20px">SendTonWay</span></a>
                </div>
                <div class="nav" style="left:91%;">
                    <ul>
                        <?php
                        if ($_GET['from'] == 'admin') {
                            echo '<li><a style="background-color: #E02D05; color: #fff;" href="admin/administration.php">ACCUEIL</a></li>';
                        } else {
                            echo '<li><a style="background-color: #E02D05; color: #fff;" href="index.php">ACCUEIL</a></li>';

                        }

                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div id="supp_ann" style="display: none; z-index: 51;">
            <div style="position: fixed; height:100%; width: 100%; background: #000; opacity: 0.7;"></div>
            <div style="width: 400px; height: 190px; background-color: #fff; border-radius: 20px; position: fixed; top:50%;left:50%; transform: translate(-50%,-50%);">
                <br><br>
                <h2 class="s1" style="font-size: 18px;"><b style="color: #000;">Voulez-vous vraiment supprimer <br>cette
                        annonce?</b></h2><br>
                <a href="#" class="boutton" id="conf_supp" style="float: left; margin-left: 40px;">Oui</a>
                <a href="#" class="boutton" id="annul_supp" style="margin-right: 40px;">Non</a>
            </div>


        </div>
    </div>
    <br><br><br><br>
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5 ">

            <div class="row" style="display: flex;justify-content: center; ">
                <div style="position:fixed;margin-left: 60px;">
                    <div class="col-lg-10 mb-3">
                        <div class="mt-5"
                             style="display:flex; justify-content : center; align-items: center;color:#fff; background-color: #E02D05;height:40px;">
                            Filtrer les annonces
                        </div>
                    </div>
                    <div class="mb-2" style="font-size: 1.10rem;display:flex; justify-content : ;margin-left: 15px;">
                        Rechecher par ville
                    </div>

                    <div class="col-lg-10 ">

                        <select id="ville_depart" class="form-control text-dark"
                                style="display:flex; justify-content : center;" name="ville_depart">
                            <option value="">ville de depart</option>
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

                    </div>
                    <div class="col-lg-10 mt-2 mb-3 ">
                        <select type="text" id="ville_arrive" class="form-control text-dark" name="ville_arrive" style="
                      overflow-y : scroll;">
                            <option value="">ville d'arrivée</option>
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
                    </div>

                    <!-- <div class="mt-3">Charactersitique de colis</div> -->
                    <div class="mb-2" style="font-size: 1.10rem;display:flex; justify-content : ;margin-left: 15px;">
                        Charactersitique de colis
                    </div>

                    <div class="col-lg-10 d-flex justify-content-center mb-3">
                        <select type="text" id="taille_max" min="0.1" class="form-control text-dark" name="taille_max">
                            <option value="">Taille Max</option>
                            <option value="petit">Petit</option>
                            <option value="moyen">moyen</option>
                            <option value="grand">grand</option>
                            <option value="tres grand">très grand</option>
                        </select>
                        <div class="input-group ml-2">
                            <input id="poid_max" type="number" step="0.1"
                                   class="form-control text-dark justify-content-center" placeholder="Poid max"
                                   name="poid_max">
                        </div>

                    </div>
                    <div class="mb-2" style="font-size: 1.10rem;display:flex; justify-content : ;margin-left: 15px;">
                        Rechecher par la date
                    </div>

                    <div class="col-lg-10 ">
                        <div style="display:flex; justify-content : center;">
                            <input type="text" name="to_date" id="to_date" class="form-control" class="text-dark"
                                   placeholder="Date de départ "/>
                        </div>
                    </div>


                    <div class="mt-2"
                         style="display:flex; justify-content : center; margin-bottom:30px; position: relative; left: -30px;">
                        <input type="button" name="filter" id="filter" value="Filtrer"
                               class="btn btn-lg btn-info btn-block"
                               style="width: 200px ; color:#fff; background-color: #E02D05;"/>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8 col-md-7">

            <div class=" mt-5  rela-block top-container ">
                <div class="rela-block top-center-container">
                    <div class="inner-container top-text-container">
                        <h2 class="rela-block top-main-text">ANNONCES Colis</h2>
                        <p></br>Ques que vous attendez encore ! Trouver un colis maintenent</p>
                    </div>
                </div>
            </div>

            <div class="row" id="annonce_filtrer" style="display: flex;justify-content: center;">

                <?php
                $result = mysqli_query($connect, $query);

                while ($row = mysqli_fetch_array($result)) {
                    $id_trajet = $row["id_trajet"];

                    $query3 = " SELECT `nom`,`prenom`,`photo`,`prem_accepte`,`supp`,`desactiver` FROM `compte` where `id_compte` = " . $row["id_compte_e"] . " ";
                    $result3 = mysqli_query($connect, $query3);
                    $row3 = mysqli_fetch_array($result3);
                    if (($row3['supp'] != 1) && ($row3['desactiver'] != 1)) {
                        if ($row3['prem_accepte'] == 1) {
                            $query2 = " SELECT `lieux_depart`,`lieux_arrive` FROM `trajet` WHERE `id_trajet` = " . $id_trajet . " ";
                            $result2 = mysqli_query($connect, $query2);
                            $row2 = mysqli_fetch_array($result2);
                            echo affichage($row, $row2, $row3);
                        }
                    }

                }
                $result = mysqli_query($connect, $query);

                while ($row = mysqli_fetch_array($result)) {
                    $id_trajet = $row["id_trajet"];

                    $query3 = " SELECT `nom`,`prenom`,`photo`,`prem_accepte`,`supp`,`desactiver` FROM `compte` where `id_compte` = " . $row["id_compte_e"] . " ";
                    $result3 = mysqli_query($connect, $query3);
                    $row3 = mysqli_fetch_array($result3);

                    if (($row3['supp'] != 1) && ($row3['desactiver'] != 1)) {
                        if ($row3['prem_accepte'] != 1) {
                            $query2 = " SELECT `lieux_depart`,`lieux_arrive` FROM `trajet` WHERE `id_trajet` = " . $id_trajet . " ";
                            $result2 = mysqli_query($connect, $query2);
                            $row2 = mysqli_fetch_array($result2);
                            echo affichage($row, $row2, $row3);
                        }
                    }
                }

                ?>
<!--                 <div class="rela-block image-grid-container top-container  mt-2 " style="width:700px; height:342.5px; padding-top:5px;">-->
<!---->
<!---->
<!--                          <div class="wrap-content" style="margin:10px;">-->
<!--                            <div class="first">-->
<!--                              <div style="display:flex; flex-direction:row;" >-->
<!--                                <div style="display: flex ; flex-direction: column ;margin-left: 10px ; width: 250px;">';-->
<!--                                <img src="img_colis/unkonwn-colis.jpg" style="width: 240px; height: 240px;border-radius: 3%;margin-bottom : 20px; ">-->
<!--                                 <h4 class="text-danger" style=" display: flex ; justify-content: center;font-size:20px; ">Prix : 1000 FCFA </h3>-->
<!--                                </div>-->
<!--                              <div style="width:440px; display: flex ; flex-direction: column ; ">-->
<!--                               <div style=" height: 240px;">-->
<!--                               <a href="#" target="_blank">';-->
<!--                              <img  src="img_profiles/unknown-profile.png"  alt="" style="border-radius: 50%; width: 40px;"  class="mb-2"> <span class=" text-body h5">Fouoka Junior </span> </a>';-->
<!--                                <div style="lign-height:0.5px;">-->
<!--                                  <div class=" text-body " style="font-size:17px; margin-bottom:8px;">-->
<!--                                    Nom de colis : Veste-->
<!--                                  </div>-->
<!--                                 <div class=" text-body " style="font-size:17px; margin-bottom:8px;">-->
<!--                                   Kumbo-->
<!--                                   <i class="fas fa-arrow-right"> </i>-->
<!--                                   Dschang-->
<!--                                 </div>-->
<!--                                 <div class="badge badge-pill " data-trigger="hover" data-html="true" data-toggle="popover" title="Adresse exacte" data-content="Adresse de depart : N 120 <br />Adresse d\'arrivée : N 120  " style="font-size:15px; margin-bottom:5px;" > Addresse exacte </div>-->
<!--                                  <div class=" text-body " style="font-size:17px; margin-bottom:5px;">-->
<!--                                    Envoi : 12-05-2000 | Depot : 12-05-1500-->
<!--                                  </div>-->
<!--                                 <div class=" text-body " style="font-size:17px; margin-bottom:5px;">-->
<!--                                   Taille : petit | Poid : 520 KG-->
<!--                                 </div>-->
<!--                                 <div class="badge badge-pill " data-trigger="hover" data-toggle="popover" title="Demande speical" data-content=""-->
<!--                                  style="font-size:15px; margin-bottom:5px;" > Demande Special </div> ';-->
<!--                                 <div class="text muted mb-3" > publié le 1200  </div>-->
<!--                               </div>-->
<!--                             </div>-->
<!--                                 <div style="display:flex; flex-direction: column ; align-items : center" >-->
<!--                                       <button type="submit" class="btn btn-primary button" style ="color:#fff; background-color: #E02D05; "> Demander </button>-->
<!--                                  </div>-->
<!--                               </div>-->
<!--                             </div>-->
<!--                              </div>-->
<!---->
<!---->
<!--                          </div>-->
<!--                 </section>-->
<!--              </div>-->
        </div> ';


            </div>
            <!-- </form> -->

            <!-- End Best Seller -->

        </div>
    </div>
</div>

<script type="text/javascript">
    function connecter() {
        alert('Veuillez connecter');
    }
</script>


<!-- <script src="js/vendor/jquery-2.2.4.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="affichage-colis/js/vendor/bootstrap.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

<!-- <script src="js/jquery.ajaxchimp.min.js"></script> -->
<script src="affichage-colis/js/jquery.nice-select.min.js"></script>
<!-- <script src="js/jquery.sticky.js"></script> -->
<!-- <script src="js/nouislider.min.js"></script> -->
<!-- <script src="js/jquery.magnific-popup.min.js"></script> -->
<!-- <script src="js/owl.carousel.min.js"></script> -->
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<!-- <script src="affichage-colis/js/gmaps.min.js"></script> -->
<!-- <script src="affichage-colis/js/main.js"></script> -->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        // $('[data-toggle="popover"]').popover();

        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        $(function () {
            $("#from_date").datepicker();
            $("#to_date").datepicker();
        });
        $('#filter').click(function () {
            var to_date = $('#to_date').val();
            var ville_depart = $('#ville_depart').val();
            var ville_arrive = $('#ville_arrive').val();
            var taille_max = $('#taille_max').val();
            var poid_max = $('#poid_max').val();
            var from = "<?php echo $_GET['from'] ?>";
            $.ajax({
                url: "filtrer_annonce_colis.php",
                method: "POST",
                data: {
                    to_date: to_date,
                    ville_depart: ville_depart,
                    ville_arrive: ville_arrive,
                    taille_max: taille_max,
                    poid_max: poid_max,
                    from: from
                },
                success: function (data) {
                    $('#annonce_filtrer').html(data);
                }
            });

        });

    });

</script>

<script type="text/javascript">
    function supp(type, i) {
        document.getElementById("conf_supp").href = "php/supp_ann.php?id=".concat(String(i), "&type=", String(type), "&from=ann_c");
        $("#supp_ann").fadeIn();

    }

    $("#annul_supp").click(function () {
        $("#supp_ann").fadeOut();
    });
</script>

</body>

</html>
