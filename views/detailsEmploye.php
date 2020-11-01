<?php
include_once('header.php');
session_start();

		
	
require_once("../model/model.php");
            
$employe=$_SESSION['employe'];

$listeFonction = fonction_findAll();
foreach($listeFonction as $fonction)

		
	?>

<main>
        <h1 >Détails EMPLOYE</h1>
    

    <div class="card-profile shadow-lg  mb-3 bg-white rounded">
        <div class="card-photo p-3">
                <div class="icon-profile col-md-10 float-right" >
               
                        <i class="fas fa-user-alt"style="font-size:200px"></i>
                    <br><br>
                    <div class="custom-file ">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choisir fichier</label>
                    </div>
                </div>
        </div>
    
        <div class="card-form p-5">
            <h3><?php echo $employe['nom_employe']; ?> <?php echo $employe['prenom_employe']; ?></h3>
            <p><?php echo $fonction['libelle_poste']; ?> de l'entreprise</p>
            <p>Contact: <?php echo $employe['email']; ?> </p>
    

    
        </div>    
    </div>
</main>


  

<?php
  include_once('footer.php');
  ?>