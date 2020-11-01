<?php


	require_once("../model/model.php");
	session_start();

	//récupération de l'id employe à chercher
	$id = $_GET['idEmploye'];
	$traitement = $_GET['traitement'];

	$_SESSION['idEmploye'] = $id;
	//récupération de l'employe
	$employe = employe_Find( $id );
	
	//on passe $employe en variable de session
	$_SESSION['employe'] = $employe;
	
	
		if ( $traitement == 1 ) {
			Header("Location: ../views/modifierEmploye.php");
		}else {
		if ($traitement == 2){
			Header("Location: ../views/supprimerEmploye.php");
			}else{ 
				if($traitement == 3){
			Header("Location: ../views/detailsEmploye.php");
				}
			}
		}
		
			
		
?>
