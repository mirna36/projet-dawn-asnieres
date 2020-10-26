<?php
	
	session_start();
	$_SESSION['msg_erreur'] = "";

	switch ($_FILES['imageMonument']['error']) {
		case 0:		
			if( is_uploaded_file($_FILES['imageMonument']['tmp_name']) ) {
				$ext = strstr($_FILES['imageMonument']['name'],".");
				if	(  $ext == ".jpg" || $ext == ".jpeg" || $ext == ".gif" || $ext == ".gif" || $ext == ".png" ) {
					$destination = "../../images/monument/monument_" . $_SESSION['idMonument'] . ".png"; 
					$retour = copy($_FILES['imageMonument']['tmp_name'], $destination );
					if ( $retour ) {
						header("Location: ../../controllers/monument/MonumentListerAccept.php");
					} else {
						$_SESSION['msg_erreur'] = "Erreur fatale ! Le téléchargement à échoué";						
					}
				} else {		
					$_SESSION['msg_erreur'] = "Le fichier téléchargé n'est pas une image ou est au format non autorisé";			
				}				
			} else {
				$_SESSION['msg_erreur'] = "Erreur fatale ! Le fichier est introuvable sur le serveur";
			}
			break;
		case 1:	
			$_SESSION['msg_erreur'] = "Le fichier excède le poids autorisé par la directive upload_max_filesize de php.ini";
			header("Location: ../../views/monument/frmUpload.php");
			break;
		case 2:		
			$_SESSION['msg_erreur'] = "Le fichier excède le poids autorisé par le champ MAX_FILE_SIZE s'il a été donné";
			header("Location: ../../views/monument/frmUpload.php");
			break;
		case 3:		
			$_SESSION['msg_erreur'] = "Le fichier n'a été uploadé que partiellement";
			header("Location: ../../views/monument/frmUpload.php");
			break;
		case 4:		
			$_SESSION['msg_erreur'] = "Aucun fichier n'a été uploadé";
			header("Location: ../../views/monument/frmUpload.php");
			break;			
		default:
			$_SESSION['msg_erreur'] = "Erreur fatale ! Incompréhensible";
			header("Location: ../../views/monument/frmUpload.php");
			
	}

?>