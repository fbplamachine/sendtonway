<?php

function distance($lat1, $lng1, $lat2, $lng2)
{
    $unit = 'k';
    $earth_radius = 6378137;
    $rlo1 = deg2rad($lng1);
    $rla1 = deg2rad($lat1);
    $rlo2 = deg2rad($lng2);
    $rla2 = deg2rad($lat2);
    $dlo = ($rlo2 - $rlo1) / 2;
    $dla = ($rla2 - $rla1) / 2;
    $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo));
    $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $meter = ($earth_radius * $d);
    return ceil($meter / 1000);
}

$distance = array
(
    'Douala' => array(
        'latitude' => 4.060,
        'longitude' => 9.710
    ),
    'Yaounde' => array(
        'latitude' => 3.870,
        'longitude' => 11.520
    ),
    'Garoua' => array(
        'latitude' => 9.300,
        'longitude' => 13.390
    ),
    'Kousseri' => array(
        'latitude' => 12.080,
        'longitude' => 15.030
    ),
    'Bamenda' => array(
        'latitude' => 5.960,
        'longitude' => 10.150
    ),
    'Maroua' => array(
        'latitude' => 10.580,
        'longitude' => 14.330
    ),
    'Ngaoundere' => array(
        'latitude' => 7.320,
        'longitude' => 13.580
    ),
    'Bafoussam' => array(
        'latitude' => 5.490,
        'longitude' => 10.410
    ),
    'Bertoua' => array(
        'latitude' => 4.580,
        'longitude' => 13.680
    ),
    'Nkongsamba' => array(
        'latitude' => 4.960,
        'longitude' => 9.940
    ),
    'Kaele' => array(
        'latitude' => 10.120,
        'longitude' => 14.450
    ),
    'Edea' => array(
        'latitude' => 3.800,
        'longitude' => 10.120
    ),
    'Kumbo' => array(
        'latitude' => 6.220,
        'longitude' => 10.680
    ),
    'Foumban' => array(
        'latitude' => 5.730,
        'longitude' => 10.900
    ),
    'Mbouda' => array(
        'latitude' => 5.640,
        'longitude' => 10.250
    ),
    'Dschang' => array(
        'latitude' => 36.775348,
        'longitude' => 3.060065
    ),
    'Limbé' => array(
        'latitude' => 4.020,
        'longitude' => 9.190
    ),
    'Ebolowa' => array(
        'latitude' => 3.520,
        'longitude' => 11.500
    ),
    'Kousséri' => array(
        'latitude' => 12.080,
        'longitude' => 15.030
    ),
    'Guider' => array(
        'latitude' => 9.930,
        'longitude' => 13.940
    ),
    'Meiganga' => array(
        'latitude' => 6.520,
        'longitude' => 14.290
    ),
    'Yagoua' => array(
        'latitude' => 10.350,
        'longitude' => 15.240
    ),
    'Mbalmayo' => array(
        'latitude' => 3.520,
        'longitude' => 11.500
    ),
    'Bafang' => array(
        'latitude' => 5.170,
        'longitude' => 10.180
    ),
    'Tiko' => array(
        'latitude' => 4.080,
        'longitude' => 9.370
    ),
    'Bafia' => array(
        'latitude' => 4.750,
        'longitude' => 11.230
    ),
    'Wum' => array(
        'latitude' => 6.400,
        'longitude' => 10.070
    ),
    'Kribi' => array(
        'latitude' => 2.940,
        'longitude' => 9.910
    ),
    'Buea' => array(
        'latitude' => 4.160,
        'longitude' => 9.230
    ),
    'Sangmélima' => array(
        'latitude' => 2.940,
        'longitude' => 11.970
    ),
    'Foumbot' => array(
        'latitude' => 5.520,
        'longitude' => 10.630
    ),
    'Bangangté' => array(
        'latitude' => 5.150,
        'longitude' => 10.510
    ),
    'Banyo' => array(
        'latitude' => 6.750,
        'longitude' => 11.810
    ),
    'Mokolo' => array(
        'latitude' => 10.750,
        'longitude' => 13.810
    ),
    'Garoua-Boulaï' => array(
        'latitude' => 5.890,
        'longitude' => 14.550
    ),
    'Mora' => array(
        'latitude' => 11.040,
        'longitude' => 14.140
    ),
    'Kaélé' => array(
        'latitude' => 10.120,
        'longitude' => 14.450
    ),
    'Tibati' => array(
        'latitude' => 6.470,
        'longitude' => 12.620
    ),
    'Ndop' => array(
        'latitude' => 6.070,
        'longitude' => 10.470
    ),
    'Akonolinga' => array(
        'latitude' => 3.770,
        'longitude' => 12.250
    ),
    'Eséka' => array(
        'latitude' => 3.650,
        'longitude' => 10.770
    ),
    'Obala' => array(
        'latitude' => 4.170,
        'longitude' => 11.530
    ),
    'Koutaba' => array(
        'latitude' => 36.2502135,
        'longitude' => 6.1652163
    ),
    'Guidiguis' => array(
        'latitude' => 36.1586843,
        'longitude' => 2.0842817
    ),
    'Figuil' => array(
        'latitude' => 33.2336851,
        'longitude' => -0.8151958
    ),
    'Makénéné' => array(
        'latitude' => 35.3650471,
        'longitude' => -0.9452807
    ),
    'Gazawa' => array(
        'latitude' => 32.485855,
        'longitude' => 3.677104
    ),
    'Tcholliré' => array(
        'latitude' => 35.7381193,
        'longitude' => 0.5547673
    ),
);

session_start();

if (isset($_POST['submit_colis'])) {
    $Host = "localhost";
    $Host_user = "root";
    $Host_pswd = "";
    $database = "projet2cp";

    $connect = mysqli_connect($Host, $Host_user, $Host_pswd, $database);

    if (!$connect) {
        die("la connexion a échoué" . mysqli_connect_error());
        exit();
    } else {
        date_default_timezone_set('Africa/Douala');

        $id_compte_e = $_SESSION['id_compte'];
        $nom_colis = $_POST['N_colis'];
        $taille_colis = $_POST['taille_colis'];
        $poid_colis = $_POST['poid_colis'];
        $text_demande = $_POST['text_demande'];
        $date_annonce = date('Y-m-d H:i:s');
        $date_depart = $_POST['from_date'];
        $date_arrive = $_POST['to_date'];
        $adr_depart = $_POST['@_d'];
        $adr_arrive = $_POST['@_a'];
        $ville_d = $_POST['ville_d'];
        $ville_a = $_POST['ville_a'];
        $demande_special = $_POST['text_demande'];
        $etat = "annonce";

        $d = distance($distance[$ville_d]['latitude'], $distance[$ville_d]['longitude'], $distance[$ville_a]['latitude'], $distance[$ville_a]['longitude']);


        $facil = 300;
        $difficil = 1000;

        if ($d <= $facil) $diff = 'facil';
        if (($d > $facil) && ($d < $difficil)) $diff = 'moyen';
        if ($d >= $difficil) $diff = 'difficil';


        $tarifs = include "../tarifs.txt";
        $parkm = $tarifs[0] * $d;
        $parkg = $tarifs[1] * $poid_colis;
        if ($taille_colis == 'petit') $partaille = $tarifs[2];
        if ($taille_colis == 'moyen') $partaille = $tarifs[3];
        if ($taille_colis == 'grand') $partaille = $tarifs[4];
        if ($taille_colis == 'tres grand') $partaille = $tarifs[5];
        if ($diff == 'facil') $pardiff = $tarifs[6];
        if ($diff == 'moyen') $pardiff = $tarifs[7];
        if ($diff == 'difficil') $pardiff = $tarifs[8];
        if ($demande_special) $pards = $tarifs[9]; else $pards = 0;

        $prix = $parkm + $parkg + $partaille + $pardiff + $pards;

        $requet_trajet = "INSERT INTO `trajet`(`date_annonce`, `id_compte`, `lieux_depart`, `lieux_arrive`)
        VALUES (?,?,?,?)";

        $stmt = mysqli_stmt_init($connect);
        mysqli_stmt_prepare($stmt, $requet_trajet);
        mysqli_stmt_bind_param($stmt, "sdss", $date_annonce, $id_compte_e, $ville_d, $ville_a);
        if (mysqli_stmt_execute($stmt)) {
            $id_trajet = mysqli_insert_id($connect);
            $file_Name = $_FILES['photo_colis']['name'];
            $file_Tmp = $_FILES['photo_colis']['tmp_name'];
            $file_size = $_FILES['photo_colis']['size'];
            $file_error = $_FILES['photo_colis']['error'];
            $file_type = $_FILES['photo_colis']['type'];
            $file_ext = explode(".", $file_Name);
            $actual_ext = strtolower(end($file_ext));
            $allowed = array('jpg', 'jpeg', 'png');
            if (in_array($actual_ext, $allowed)) {
                if ($file_error === 0) {
                    if ($file_size < 1000000000) {
                        $actual_file_name = uniqid("", true);
                        $actual_file_name = $actual_file_name . "." . $actual_ext;
                        $file_destination = "../img_colis/" . $actual_file_name;
                        $path = "img_colis/" . $actual_file_name;
                        move_uploaded_file($file_Tmp, $file_destination);
                    }
                }
            }
            $requet_colis = "INSERT INTO `colis`(`date_annonce`, `nom`, `id_compte_e`, `id_trajet`, `date_envoi`, `date_depot`,`adr_depart`,`adr_arrive`, `taille`, `poids`, `demande_spec` , `photo` , `etat`, `tarif`)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($connect);
            mysqli_stmt_prepare($stmt, $requet_colis);
            mysqli_stmt_bind_param($stmt, "ssddsssssssssd", $date_annonce, $nom_colis, $id_compte_e, $id_trajet, $date_depart, $date_arrive, $adr_depart, $adr_arrive, $taille_colis, $poid_colis, $demande_special, $path, $etat, $prix);
            if (mysqli_stmt_execute($stmt)) {
                if (!empty($_POST['id_trajet'])) {
                    header("Location: ../choix_colis.php?id_trajet=" . $_POST['id_trajet'] . "&id_compte=" . $_POST['id_compte_ann'] . "");
                } else {
                    header("Location: ../index.php?annonce=success");
                }
            } else {
                echo "Error: " . $requet_colis . "<br>" . mysqli_error($connect);
            }
        } else {
            echo "Error: " . $requet_trajet . "<br>" . mysqli_error($connect);
        }
    }
    mysqli_close($connect);

}
