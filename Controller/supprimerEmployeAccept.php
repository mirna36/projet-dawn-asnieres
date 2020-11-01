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
	
	
		employe_Delete($id);
	if ( $_SESSION['msg_erreur'] == "") {
		Header("Location:../views/listeEmploye.php")	;				
	} else {
		Header("Location: ../views/supprimerEmploye.php")	;		
	}

	
?>