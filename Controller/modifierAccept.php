<?php

require_once("../model/model.php");
	session_start();
	
	$nomEmploye = trim(ucfirst($_POST['nomEmploye']));
	$prenomEmploye = trim(ucfirst($_POST['prenomEmploye']));
	$dateNaissance = trim(ucfirst($_POST['dateNaissance']));
	$fonction = trim(ucfirst($_POST['fonction']));
	$email = trim(ucfirst($_POST['email']));
	$salaire = trim(ucfirst($_POST['salaire']));
	$idEmploye = $_POST['idEmploye'];
	
	$_SESSION['nomEmploye'] = $nomEmploye;
	$_SESSION['prenomEmploye'] = $prenomEmploye;
	$_SESSION['dateNaissance'] = $dateNaissance;
	$_SESSION['fonction'] = $fonction;
	$_SESSION['email'] = $email;
	$_SESSION['salaire'] = $salaire;
	$_SESSION['idEmploye'] = $idEmploye;
	$_SESSION['msg_erreur'] = "";
	
	//controle si libelle est vide
	if(empty($nomEmploye)){
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "Nom employé non renseigné<br>";
	}
	
	if ( empty($prenomEmploye ) ){
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "Prenom Employé non renseigné<br>";
	} 
	
	if ( empty($dateNaissance )) {
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "Date de naissance Employé non renseignée<br>";
	}
	if ( empty($email) ){
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "email non renseigné<br>";
	}
	if ( empty($fonction )) {
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "Fonction renseignée<br>";
	}
	if (empty($salaire) ){
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "salaire Employé non renseigné<br>";				
	}
	if ( empty($_SESSION['msg_erreur']) ){

		employe_Update( $id, $nomEmploye, $prenomEmploye, $dateNaissance, $email, $fonction, $salaire);

		if ( $_SESSION['msg_erreur'] == "") {
			Header("Location: ../views/listeEmploye.php")	;				
		} else {
			Header("Location: ../views/modifierEmploye.php")	;		
		}
	} else {
		$_SESSION['msg_erreur'] = "Employe non renseigné";
		Header("Location: ../views/modifierEmploye.php")	;		
	} 
	