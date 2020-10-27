<?php
include_once('header.php');
session_start();

		
	
            require_once("model.php");
            
			$_SESSION['listeEmploye'] = employe_findAll();
			
           
         
		$listeEmploye = $_SESSION['listeEmploye'] ;	


?>
    
		<h1 >GESTION EMPLOYE</h1>
	
<div class="container shadow-lg">

    <div class="photo-card" >
            <div class="icon-profile col-md-5 float-left" >
               
                <i class="fas fa-user-alt"style="font-size:230px"></i>
        
                
                <div class="custom-file ">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choisir fichier</label>
</div>
   
            </div>
    </div>

    <div class=form-card>
        <form action="" method="post">
       
                <div class="form-row"> 
                
                        <div class="form-group col-md-6 ">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="nom">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" name="prenom">
                        </div>
                </div> 
     
            
                <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="date">Date de naissance</label>
                            <input type="date" class="form-control" name="date" >
                        </div>
              
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                </div>      
           
                
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Fonction</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="salaire">Salaire</label>
                            <input type="text" class="form-control" name="salaire">
                        </div>    
                </div>
               
        
                <div class="buttonProfile ">
               <button type="submit" class="btn btn-primary ">Enregistrer</button>
               <button type="reset" class="btn btn-danger float-right">Reset</button>
                </div>
 
        </form>
    </div>

</div>


<?php
  include_once('footer.php');
  ?>