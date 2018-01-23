<?php

if($_SESSION['login']){
echo '<div class="wrapper-two" style="display:none">
 
           <div class="pop-up-two">
               <div class="pop-up-text">
                  <div class="container-fluid">
                   <div class="formumu">
            <h1 class="formy-title">New article</h1>
           
                <form  method="POST" action="./article.php">
                  <div class="form-block"> <!-- 1 --> 
                    <input id="titre" name="titre" class="form-element" type="text" placeholder="Taper le titre de votre article ici ... ">
                  </div> <!-- ./form-block1 -->       
           
                  <div class="form-block"> <!-- 2 --> 
                    <textarea class="form-element" id="contenu" name="contenu" rows="3" placeholder="Taper le contenu de votre article ici .. "></textarea>
                  </div>  <!-- ./ form-block 2 --> 
                 
            
     
                 <div class="form-block"> <!-- 4 --> 
                    <input name="categorie[]" value="1" class="form-checkbox" id="cuisine" type="checkbox">
                    <label for="checkbox"> Cuisine </label>
                      <input  name="categorie[]" value="2" class="form-checkbox" id="mode" type="checkbox">
                    <label for="checkbox"> Mode </label>
                      <input  name="categorie[]" value="3"  class="form-checkbox" id="actu" type="checkbox">
                    <label   for="checkbox"> Actu </label>
                 </div>  <!-- ./ form-block4 --> 
                   
                 <div class="form-block"> <!-- 5 --> 
                    <button id="button"> ENVOYER</button>
                    </div> <!-- ./form-element-inline 2 --> 
                    </div> <!-- ./form-block 5 --> 
                     </form>
                     </div> <!-- ./formumu -->
                     </div> <!-- ./ container-fluid --> 
                     </div> <!-- ./ pop-up text -->
                     </div> <!-- ./ pop-up two --> 
                     </div> <!-- ./wrapper-two --> ;';

} else {
    echo ' <div class="wrapper-two" style="display:none">
 
           <div class="pop-up-two">
               <div class="pop-up-text">
                   <div class="container-fluid">
                       <form id="form" class="clam" method="POST" action="./signup.php">

                           <input class="col-xs-12" name=pseudo id="pseudo" type="text" placeholder="PSEUDO">
                           <input class="col-xs-12" name=email id="email" type="text" placeholder="E-MAIL">
                           <input class="col-xs-12" name=mdp id="PASSWORD" type="text" placeholder="PASSWORD">
                           <input class="col-xs-12" id="submit" type="submit" value="REGISTER">

                        </form>
                    </div>
                </div>
            </div>
       </div>';
}
?>