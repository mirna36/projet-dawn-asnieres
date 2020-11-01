<?php

	require_once("../model/model.php");
	session_start();
	
	$nomEmploye = trim(ucfirst($_POST['nomEmploye']));
	$prenomEmploye = trim($_POST['prenomEmploye']);
	$dateNaissance = trim($_POST['dateNaissance']);
	$email = trim($_POST['email']);
	$fonction = trim($_POST['fonction']);
	$salaire = $_POST['salaire'];
	
	$_SESSION['nomEmploye'] = $nomEmploye;
	$_SESSION['prenomEmploye'] = $prenomEmploye;
	$_SESSION['dateNaissance'] = $dateNaissance;
	$_SESSION['email'] = $email;
	$_SESSION['fonction'] = $fonction;
	$_SESSION['salaire'] = $salaire;
	
	$_SESSION['msg_erreur'] = "";

	
	
	//controle avant insertion
	if ( empty($nomEmploye) ) {
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "Nom employé non renseigné<br>";
	}
	if ( empty($prenomEmploye) ) {
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "Prenom Employé non renseigné<br>";
	} 

	if ( empty($dateNaissance) ) {
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "Date de naissance Employé non renseignée<br>";
	}
	if ( empty($email) ) {
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "email non renseigné<br>";
	} 
	if ( empty($fonction) ) {
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "Fonction renseignée<br>";
	} 
	if ( intval($salaire) == 0 ) {
		$_SESSION['msg_erreur'] = $_SESSION['msg_erreur'] . "salaire Employé non renseigné<br>";				
	}

	if ( empty($_SESSION['msg_erreur']) ) {
		
		employe_Insert( $nomEmploye, $prenomEmploye, $dateNaissance, $email, $fonction, $salaire );

	} 
	Header("Location: ../views/gestionEmploye.php"); 			
	
?>