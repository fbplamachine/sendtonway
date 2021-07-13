<?php

	function nb_coli ($i) // annonce colis ajourd'hui
	{
  		$conn=mysqli_connect("localhost","root","","projet2cp");
  		$sql="SELECT * FROM colis where date_annonce='$i' AND supp=0 ";
  		$rs=mysqli_query($conn,$sql);
  		if ($rs)
  		{
  			$result = mysqli_num_rows($rs);
  			return $result;
  		}
	}

	function nb_trajet ($i)
	{
  		$conn=mysqli_connect("localhost","root","","projet2cp");
  		$sql="SELECT * FROM trajet where date_annonce='$i' AND poids_max != 0 AND supp=0 ";
  		$rs=mysqli_query($conn,$sql);
  		if ($rs)
  		{
  			$result = mysqli_num_rows($rs);
  			return $result;
  		}
	}

	function nb_ins ($i){
		$conn=mysqli_connect("localhost","root","","projet2cp");
		$sql="SELECT * FROM compte where date_insc='$i' AND supp=0 AND desactiver=0 ";
		$rs=mysqli_query($conn,$sql);
		if ($rs)
		{
			$result = mysqli_num_rows($rs);
			return $result;
		}
	}

	function monsc($i,$x){
		$conn=mysqli_connect("localhost","root","","projet2cp");
		$sql="SELECT * FROM compte where MONTH(date_insc)='$i' and YEAR(date_insc)='$x' AND supp=0 AND desactiver=0 ";
		$rs=mysqli_query($conn,$sql);
		if ($rs)
		{
			$result = mysqli_num_rows($rs);
			return $result;
		}
	}

	function moncol($i,$x){
		$conn=mysqli_connect("localhost","root","","projet2cp");
		$sql="SELECT * FROM colis where MONTH(date_annonce)='$i' and YEAR(date_annonce)='$x' AND supp=0 ";
		$rs=mysqli_query($conn,$sql);
		if ($rs)
		{
			$result = mysqli_num_rows($rs);
			return $result;
		}
	}

	function montrj($i,$x){
		$conn=mysqli_connect("localhost","root","","projet2cp");
		$sql="SELECT * FROM trajet where MONTH(date_annonce)='$i' and YEAR(date_annonce)='$x' AND supp=0 AND poids_max != 0 ";
		$rs=mysqli_query($conn,$sql);
		if ($rs)
		{
			$result = mysqli_num_rows($rs);
			return $result;
		}
	}

	function wlytrj($i)
	{
		$conn=mysqli_connect("localhost","root","","projet2cp");

		switch ($i) {
		case '1':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Douala' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Douala' AND ( poids_max != 0 ) " ;
			break;

		case '2':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Yaoundé' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Yaoundé' AND ( poids_max != 0 ) " ;
			break;

		case '3':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Garoua' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Garoua' AND ( poids_max != 0 ) " ;
			break;

		case '4':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bamenda' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bamenda' AND ( poids_max != 0 ) " ;
			break;

		case '5':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Maroua' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Maroua' AND ( poids_max != 0 ) " ;
			break;

		case '6':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Nkongsamba' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Nkongsamba' AND ( poids_max != 0 ) " ;
			break;

		case '7':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bafoussam' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bafoussam' AND ( poids_max != 0 ) " ;
			break;

		case '8':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Ngaoundéré' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Ngaoundéré' AND ( poids_max != 0 ) " ;
			break;

		case '9':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bertoua' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bertoua' AND ( poids_max != 0 ) " ;
			break;

		case '10':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Loum' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Loum' AND ( poids_max != 0 ) " ;
			break;

		case '11':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Kumba' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Kumba' AND ( poids_max != 0 ) " ;
			break;

		case '12':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Edéa' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Edéa' AND ( poids_max != 0 ) " ;
			break;

		case '13':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Kumbo' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Kumbo' AND ( poids_max != 0 ) " ;
			break;

		case '14':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Foumban' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Foumban' AND ( poids_max != 0 ) " ;
			break;

		case '15':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Mbouda' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Mbouda' AND ( poids_max != 0 ) " ;
			break;

		case '16':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Dschang' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Dschang' AND ( poids_max != 0 ) " ;
			break;

		case '17':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Limbé' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Limbé' AND ( poids_max != 0 ) " ;
			break;

		case '18':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Ebolowa' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Ebolowa' AND ( poids_max != 0 ) " ;
			break;

		case '19':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Kousséri' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Kousséri' AND ( poids_max != 0 ) " ;
			break;

		case '20':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Guider' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Guider' AND ( poids_max != 0 ) " ;
			break;

		case '21':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Meiganga' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Meiganga' AND ( poids_max != 0 ) " ;
			break;

		case '22':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Yagoua' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Yagoua' AND ( poids_max != 0 ) " ;
			break;

		case '23':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Mbalmayo' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Mbalmayo' AND ( poids_max != 0 ) " ;
			break;

		case '24':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bafang' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bafang' AND ( poids_max != 0 ) " ;
			break;

		case '25':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Tiko' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Tiko' AND ( poids_max != 0 ) " ;
			break;

		case '26':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bafia' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bafia' AND ( poids_max != 0 ) " ;
			break;

		case '27':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Wum' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Wum' AND ( poids_max != 0 ) " ;
			break;

		case '28':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Kribi' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Kribi' AND ( poids_max != 0 ) " ;
			break;

		case '29':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Buea' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Buea' AND ( poids_max != 0 ) " ;
			break;

		case '30':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Sangmélima' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Sangmélima' AND ( poids_max != 0 ) " ;
			break;

		case '31':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Foumbot' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Foumbot' AND ( poids_max != 0 ) " ;
			break;

		case '32':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bangangté' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bangangté' AND ( poids_max != 0 ) " ;
			break;

		case '33':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Banyo' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Banyo' AND ( poids_max != 0 ) " ;
			break;

		case '34':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Mokolo' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Mokolo' AND ( poids_max != 0 ) " ;
			break;

		case '35':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Garoua-Boulaï' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Garoua-Boulaï' AND ( poids_max != 0 ) " ;
			break;

		case '36':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Mora' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Mora' AND ( poids_max != 0 ) " ;
			break;

		case '37':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Kaélé' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Kaélé' AND ( poids_max != 0 ) " ;
			break;

		case '38':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Tibati' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Tibati' AND ( poids_max != 0 ) " ;
			break;

		case '39':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Ndop' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Ndop' AND ( poids_max != 0 ) " ;
			break;

		case '40':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Akonolinga' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Akonolinga' AND ( poids_max != 0 ) " ;
			break;

		case '41':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Eséka' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Eséka' AND ( poids_max != 0 ) " ;
			break;

		case '42':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Obala' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Obala' AND ( poids_max != 0 ) " ;
			break;

		case '43':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Koutaba' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Koutaba' AND ( poids_max != 0 ) " ;
			break;

		case '44':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Guidiguis' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Guidiguis' AND ( poids_max != 0 ) " ;
			break;

		case '45':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Figuil' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Figuil' AND ( poids_max != 0 ) " ;
			break;

		case '46':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Makénéné' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Makénéné' AND ( poids_max != 0 ) " ;
			break;

		case '47':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Gazawa' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Gazawa' AND ( poids_max != 0 ) " ;
			break;

		case '48':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Tcholliré' AND ( poids_max != 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Tcholliré' AND ( poids_max != 0 ) " ;
			break;

		}

		$resultat_1 = mysqli_query($conn,$requete_1) or die();
		$nombre_1   = mysqli_num_rows($resultat_1);
		$resultat_2 = mysqli_query($conn,$requete_2) or die();
    	$nombre_1   += mysqli_num_rows($resultat_2);
		return $nombre_1;

	}

	function wlycol($i)
	{
		$conn=mysqli_connect("localhost","root","","projet2cp");
		switch ($i) {
		case '1':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Douala' AND ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Douala' AND ( poids_max = 0 ) " ;
			break;

		case '2':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Yaoundé' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Yaoundé' And ( poids_max = 0 ) " ;
			break;

		case '3':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Garoua' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Garoua' And ( poids_max = 0 ) " ;
			break;

		case '4':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bamenda' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bamenda' And ( poids_max = 0 ) " ;
			break;

		case '5':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Maroua' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Maroua' And ( poids_max = 0 ) " ;
			break;

		case '6':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Nkongsamba' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Nkongsamba' And ( poids_max = 0 ) " ;
			break;

		case '7':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bafoussam' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bafoussam' And ( poids_max = 0 ) " ;
			break;

		case '8':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Ngaoundéré' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Ngaoundéré' And ( poids_max = 0 ) " ;
			break;

		case '9':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bertoua' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bertoua' And ( poids_max = 0 ) " ;
			break;

		case '10':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Loum' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Loum' And ( poids_max = 0 ) " ;
			break;

		case '11':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Kumba' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Kumba' And ( poids_max = 0 ) " ;
			break;

		case '12':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Edéa' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Edéa' And ( poids_max = 0 ) " ;
			break;

		case '13':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Kumbo' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Kumbo' And ( poids_max = 0 ) " ;
			break;

		case '14':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Foumban' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Foumban' And ( poids_max = 0 ) " ;
			break;

		case '15':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Mbouda' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Mbouda' And ( poids_max = 0 ) " ;
			break;

		case '16':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Dschang' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Dschang' And ( poids_max = 0 ) " ;
			break;

		case '17':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Limbé' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Limbé' And ( poids_max = 0 ) " ;
			break;

		case '18':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Ebolowa' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Ebolowa' And ( poids_max = 0 ) " ;
			break;

		case '19':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Kousséri' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Kousséri' And ( poids_max = 0 ) " ;
			break;

		case '20':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Guider' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Guider' And ( poids_max = 0 ) " ;
			break;

		case '21':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Meiganga' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Meiganga' And ( poids_max = 0 ) " ;
			break;

		case '22':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Yagoua' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Yagoua' And ( poids_max = 0 ) " ;
			break;

		case '23':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Mbalmayo' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Mbalmayo' And ( poids_max = 0 ) " ;
			break;

		case '24':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bafang' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bafang' And ( poids_max = 0 ) " ;
			break;

		case '25':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Tiko' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Tiko' And ( poids_max = 0 ) " ;
			break;

		case '26':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bafia' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bafia' And ( poids_max = 0 ) " ;
			break;

		case '27':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Wum' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Wum' And ( poids_max = 0 ) " ;
			break;

		case '28':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Kribi' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Kribi' And ( poids_max = 0 ) " ;
			break;

		case '29':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Buea' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Buea' And ( poids_max = 0 ) " ;
			break;

		case '30':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Sangmélima' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Sangmélima' And ( poids_max = 0 ) " ;
			break;

		case '31':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Foumbot' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Foumbot' And ( poids_max = 0 ) " ;
			break;

		case '32':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Bangangté' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Bangangté' And ( poids_max = 0 ) " ;
			break;

		case '33':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Banyo' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Banyo' And ( poids_max = 0 ) " ;
			break;

		case '34':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Mokolo' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Mokolo' And ( poids_max = 0 ) " ;
			break;

		case '35':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Garoua-Boulaï' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Garoua-Boulaï' And ( poids_max = 0 ) " ;
			break;

		case '36':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Mora' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Mora' And ( poids_max = 0 ) " ;
			break;

		case '37':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Kaélé' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Kaélé' And ( poids_max = 0 ) " ;
			break;

		case '38':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Tibati' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Tibati' And ( poids_max = 0 ) " ;
			break;

		case '39':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Ndop' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Ndop' And ( poids_max = 0 ) " ;
			break;

		case '40':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Akonolinga' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Akonolinga' And ( poids_max = 0 ) " ;
			break;

		case '41':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Eséka' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Eséka' And ( poids_max = 0 ) " ;
			break;

		case '42':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Obala' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Obala' And ( poids_max = 0 ) " ;
			break;

		case '43':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Koutaba' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Koutaba' And ( poids_max = 0 ) " ;
			break;

		case '44':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Guidiguis' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Guidiguis' And ( poids_max = 0 ) " ;
			break;

		case '45':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Figuil' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Figuil' And ( poids_max = 0 ) " ;
			break;

		case '46':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Makénéné' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Makénéné' And ( poids_max = 0 ) " ;
			break;

		case '47':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Gazawa' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Gazawa' And ( poids_max = 0 ) " ;
			break;

		case '48':
			$requete_1 = "SELECT * FROM trajet where lieux_arrive='Tcholliré' And ( poids_max = 0 ) " ;
			$requete_2 = "SELECT * FROM trajet where lieux_depart='Tcholliré' And ( poids_max = 0 ) " ;
			break;

		}


		$resultat_1 = mysqli_query($conn,$requete_1) or die();
		$nombre_1   = mysqli_num_rows($resultat_1);
		$resultat_2 = mysqli_query($conn,$requete_2) or die();
    	$nombre_1   += mysqli_num_rows($resultat_2);
		return $nombre_1;

	}

	function totalwly($i){
		$a=wlycol($i)+wlytrj($i);
		return $a;
	}

?>
