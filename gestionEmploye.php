<?php
include_once('header.php');
session_start();


?>
    <div class="w3-container w3-black">
		<h1 >GESTION EMPLOYE</h1>
	</div>
<div class="container card_form shadow-lg">
    <form action="" method="post">
       
            <div class="form-row">
            <div class="form-group col-md-4">
                    <label for="nom"></label>
                   
                </div>
                <div class="form-group col-md-4">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom">
                </div>
                    <div class="form-group col-md-4">
                    <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom">
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-4">
                    <label for="nom"></label>
                    
                </div>
                <div class="form-group col-md-4">
                    <label for="date">Date de naissance</label>
                    <input type="date" class="form-control" name="date" >
                </div>
                    <div class="form-group col-md-4">
                    <label for="inputAddress2">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                <div class="form-group col-md-4">
                  
                    <input type="file" class="form-control" name="nom">
                </div>
                    <label for="inputState">Fonction</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                <label for="salaire">Salaire</label>
                <input type="text" class="form-control" name="salaire">
            </div>
        
                
        </div>
        <div class="buttonProfile">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <button type="reset" class="btn btn-danger float-right">Reset</button>
                </div>
 
    </form>

</div>


<?php
  include_once('footer.php');
  ?>