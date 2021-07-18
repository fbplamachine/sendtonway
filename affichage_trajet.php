<?php
session_start();
if ((!isset($_GET['from'])) || (isset($_GET['from'])) && (($_GET['from'] != 'user') && ($_GET['from'] != 'admin'))) $_GET['from'] = 'user';
if ((isset($_GET['from'])) && ($_GET['from'] == 'admin') && (!$_SESSION['nom_admin'])) $_GET['from'] = 'user';
if (!isset($_SESSION['nom'])) $_SESSION['nom'] = "";
function affichage($row, $row2, $row3, $reg, $result5)
{

    $output = '
	<div class="rela-block image-grid-container top-container  mt-2 " style="width:660px; padding-top:5px;">
			<div class="floated image-column 1"  >
				<div class="rela-block image">
					<section class="box main">
				</div>
						<div class="wrap-content">
							<div class="first">
								<div class="inner mt-2" >';
    $output .= '<a href="profile.php?id=' . $row['id_compte'] . '&from=' . $_GET['from'] . '" target="_blank">';
    if ($row2['photo']) {
        $output .= '<img  src="img_profiles/' . $row2['photo'] . '"  alt="" style="border-radius: 50%; width: 40px;"  class="mb-2"> <span class=" text-body h5">' . $row2["prenom"] . " " . $row2["nom"] . ' </span> </a>';
    } else {
        $output .= '<img  src="./images/profile.png"  alt="" style="border-radius: 50%; width: 40px;"  class="mb-2"> <span class=" text-body h5">' . $row2["prenom"] . " " . $row2["nom"] . ' </span> </a>';
    }

    $output .= '<div style="lign-height:0.5px;">
									 <div class=" text-body " style="font-size:17px; margin-bottom:8px;">
										 ' . $row["lieux_depart"] . '
										 <i class="fas fa-arrow-right"> </i>
										 ' . $row["lieux_arrive"] . '
									 </div>';
    $num_arret = mysqli_num_rows($result5);
    if ($num_arret > 0) {
        // $row5 = mysqli_fetch_array($result5);
        $output .= ' <div class="badge badge-pill badge-secondary" data-trigger="hover" data-toggle="popover" title="Arrets" data-content="';
        $row5 = mysqli_fetch_array($result5);
        $output .= $row5['arret'];
        while ($row5 = mysqli_fetch_array($result5)) {
            $output .= ', ' . $row5['arret'];
        }
        $output .= '"style="font-size:15px; margin-bottom:5px;" > Arrets </div> ';
    }

    if ($reg == true) {
        $output .= '
										<div class=" text-body " style="font-size:17px; margin-bottom:5px;">
 										 Trajet regulier
 									 	</div>
 									 	<div class=" text-body " style="font-size:17px; margin-bottom:5px;">
 											depart : ' . $row3["jour"] . ' | Frequence : ' . $row3["frequence"] . ' fois par semaine
 									 	</div>';

    } else {
        $output .= '
									<div class=" text-body " style="font-size:17px; margin-bottom:5px;">
									 Trajet non regulier
									</div>
									<div class=" text-body " style="font-size:17px; margin-bottom:5px;">
										depart : ' . $row3["date_depart"] . ' | retour : ' . $row3["date_retour"] . '
									</div>';
    }

    $output .= '
									 <div class=" text-body " style="font-size:17px; margin-bottom:5px;">
										 Detour max : ' . $row["detour_max"] . '
									 </div>
									 <div class=" text-body " style="font-size:17px; margin-bottom:5px;">
										 Taille max : ' . $row["taille_max"] . ' | Poid max : ' . $row["poids_max"] . '
									 </div>
									 <div class=" text-body " style="font-size:17px; margin-bottom:10px;">
										Moyen de transport : ' . $row["moyen"] . '
									 </div>
									 <div class="text muted mb-3" > publié le  ' . $row["date_annonce"] . ' </div>';
    if ($_GET['from'] == 'user') {
        if ($_SESSION['nom']) {
            $output .= '<a href="choix_colis.php?id_trajet=' . $row["id_trajet"] . '&id_compte=' . $row["id_compte"] . ' " target="_blank" >
												 <button type="submit" class="btn  button" style="color:#fff; background-color: #E02D05;"> Demander </button>
												 </a>';
        } else {
            $output .= '<a href="#" onclick="connecter()" >
												 <button type="submit" class="btn button" style="color:#fff; background-color: #E02D05;"> Demander </button>
												 </a> ';
        }
    } else if ($_GET['from'] == 'admin') {

        $output .= '<a href="#" onclick="supp(2,' . $row['id_trajet'] . ')">
                         							 <button class="btn btn-danger button" > Supprimer </button>
												 </a>';


    }
    $output .= '

								 </div>
								</div>
							</div>

						</div>
					</section>
				</div>
	</div>
	';
    return $output;
}

?>

<html>
<head>
    <link rel="icon" href="images/icon.png">

    <title>Annonces Trajets - SendTonWay.com</title>

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


    <?php

    date_default_timezone_set('Africa/Douala');
    $date_jour = $date_annonce = date('Y-m-d');
    $connect = mysqli_connect("localhost", "root", "", "projet2cp");
    $echec = ' SELECT * FROM trajets_non_reguliers where `date_depart` < \'' . $date_jour . '\' ';
    $result_echec = mysqli_query($connect, $echec);
    if (mysqli_num_rows($result_echec) > 0) {
        while ($row_echec = mysqli_fetch_array($result_echec)) {
            $ss = 'UPDATE `trajet` SET `etat`=\'echec\' WHERE `id_trajet` = ' . $row_echec['id_trajet'] . ' AND etat="annonce" ';
            $s = mysqli_query($connect, $ss);
        }
    }
    ?>
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


<div class="container-fluid">

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
                        Rechecher par la date
                    </div>

                    <div class="col-lg-10 ">
                        <div style="display:flex; justify-content : center;">
                            <input type="text" name="to_date" id="to_date" class="form-control" class="text-dark"
                                   placeholder="Date de départ "/>
                        </div>
                    </div>

                    <div class="mb-2" style="font-size: 1.10rem;display:flex; justify-content : ;margin-left: 15px;">
                        Charactersitique de colis
                    </div>

                    <div class="col-lg-10 d-flex justify-content-center mb-3">
                        <select type="text" id="taille_max" class="form-control text-dark" name="taille_max">
                            <option value="">Taille Max</option>
                            <option value="Petit">Petit</option>
                            <option value="Moyen">moyen</option>
                            <option value="Grand">grand</option>
                            <option value="Tres Grand">très grand</option>
                        </select>
                        <div class="input-group ml-2">
                            <input id="poid_max" type="number" step="0.1" min="0.1"
                                   class="form-control text-dark justify-content-center" placeholder="Poid max"
                                   name="poid_max">
                        </div>

                    </div>


                    <div class="mt-2"
                         style="display:flex; justify-content : center; margin-bottom:30px; position: relative; left: -30px;">
                        <input type="button" name="filter" id="filter" value="Filtrer"
                               class="btn btn-lg btn-info btn-block"
                               style="width: 200px ;color:#fff; background-color: #E02D05;"/>
                    </div>

                </div>
            </div>
        </div>

        <?php
        if ($_SESSION['nom']) {
            $query = "SELECT * FROM `trajet` where (`id_compte` != {$_SESSION['id_compte']}) AND (supp = 0) and ((etat = 'annonce') or (etat='accepte')) and (poids_max != 0) ORDER BY date_annonce desc  ";
        } else {
            $query = "SELECT * FROM `trajet` where (supp = 0) and ((etat = 'annonce') or (etat='accepte')) and (poids_max != 0) ORDER BY date_annonce desc  ";
        }
        ?>
        <div class="col-xl-9 col-lg-8 col-md-7">

            <div class=" mt-5  rela-block top-container ">
                <div class="rela-block top-center-container">
                    <div class="inner-container top-text-container">
                        <h2 class="rela-block top-main-text">ANNONCES TRAJET</h2>
                        <p></br>Ques que vous attendez encore ! Trouver un trajet maintenent</p>
                    </div>
                </div>
            </div>

            <div class="row" id="annonce_filtrer" style="display: flex;justify-content: center;">
                <?php
                $result = mysqli_query($connect, $query);

                while ($row = mysqli_fetch_array($result)) {
                    $id_trajet = $row['id_trajet'];
                    $query2 = " SELECT `nom`,`prenom`,`photo`,`prem_accepte`,`supp`,`desactiver` FROM `compte` where `id_compte` = " . $row["id_compte"] . " ";
                    $result2 = mysqli_query($connect, $query2);
                    $row2 = mysqli_fetch_array($result2);
                    if (($row2['supp'] != 1) && ($row2['desactiver'] != 1)) {
                        if ($row2['prem_accepte'] == 1) {
                            $query3 = " SELECT `date_depart` , `date_retour` FROM `trajets_non_reguliers`  WHERE `id_trajet` = {$id_trajet} ";
                            $result3 = mysqli_query($connect, $query3);
                            $query4 = " SELECT * FROM `trajets_reguliers` WHERE `id_trajet` = " . $id_trajet . " ";
                            $result4 = mysqli_query($connect, $query4);
                            if (mysqli_num_rows($result3) > 0) {
                                $reg = false;
                                $row3 = mysqli_fetch_array($result3);
                                $query5 = " SELECT * FROM `arrets` WHERE `id_trajet` = " . $id_trajet . " ";
                                $result5 = mysqli_query($connect, $query5);
                                echo affichage($row, $row2, $row3, $reg, $result5);
                            } elseif (mysqli_num_rows($result4) > 0) {
                                $reg = true;
                                $row4 = mysqli_fetch_array($result4);
                                $query5 = " SELECT * FROM `arrets` WHERE `id_trajet` = " . $id_trajet . " ";
                                $result5 = mysqli_query($connect, $query5);
                                echo affichage($row, $row2, $row4, $reg, $result5);
                            }
                            // echo affichage($row,$row2,$result3,$result4,$result5);
                        }
                    }
                }
                $result = mysqli_query($connect, $query);

                while ($row = mysqli_fetch_array($result)) {
                    $id_trajet = $row['id_trajet'];
                    $query2 = " SELECT `nom`,`prenom`,`photo`,`prem_accepte`,`supp`,`desactiver` FROM `compte` where `id_compte` = " . $row["id_compte"] . " ";
                    $result2 = mysqli_query($connect, $query2);
                    $row2 = mysqli_fetch_array($result2);
                    if (($row2['supp'] != 1) && ($row2['desactiver'] != 1)) {
                        if ($row2['prem_accepte'] != 1) {
                            $query3 = " SELECT `date_depart` , `date_retour` FROM `trajets_non_reguliers`  WHERE `id_trajet` = {$id_trajet} ";
                            $result3 = mysqli_query($connect, $query3);
                            $query4 = " SELECT * FROM `trajets_reguliers` WHERE `id_trajet` = " . $id_trajet . " ";
                            $result4 = mysqli_query($connect, $query4);
                            if (mysqli_num_rows($result3) > 0) {
                                $reg = 0;
                                $row3 = mysqli_fetch_array($result3);
                                $query5 = " SELECT * FROM `arrets` WHERE `id_trajet` = " . $id_trajet . " ";
                                $result5 = mysqli_query($connect, $query5);
                                echo affichage($row, $row2, $row3, $reg, $result5);
                            } elseif (mysqli_num_rows($result4) > 0) {
                                $reg = 1;
                                $row4 = mysqli_fetch_array($result4);
                                $query5 = " SELECT * FROM `arrets` WHERE `id_trajet` = " . $id_trajet . " ";
                                $result5 = mysqli_query($connect, $query5);
                                echo affichage($row, $row2, $row4, $reg, $result5);
                            }
                        }
                    }
                }
                ?>
            </div>


        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="affichage-colis/js/vendor/bootstrap.min.js"></script>
<script src="affichage-colis/js/jquery.nice-select.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript">
    function connecter() {
        alert('Veuillez connecter');
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd'
        });
        $(function () {
            $("#to_date").datepicker();
        });
        $('#filter').click(function () {
            var ville_depart = $('#ville_depart').val();

            var ville_arrive = $('#ville_arrive').val();
            var date_depart = $('#to_date').val();
            var taille_max = $('#taille_max').val();
            var from = "<?php echo $_GET['from']?>";
            var poid_max = $('#poid_max').val();
            $.ajax({
                url: "filtrer_annonce_trajet.php",
                method: "POST",
                data: {
                    ville_depart: ville_depart,
                    ville_arrive: ville_arrive,
                    taille_max: taille_max,
                    poid_max: poid_max,
                    date_depart: date_depart,
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
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>
<script type="text/javascript">
    function supp(type, i) {
        document.getElementById("conf_supp").href = "php/supp_ann.php?id=".concat(String(i), "&type=", String(type), "&from=ann_t");
        $("#supp_ann").fadeIn();

    }

    $("#annul_supp").click(function () {
        $("#supp_ann").fadeOut();
    });
</script>
</body>
</html>
