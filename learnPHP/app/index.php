<?php include('./partiels/header.php') ?>

<?php 
    if(isset($_POST['submit'])){
        $userName =$email = $password = $textarea = '';
        $userNameError = $emailError = $passwordError = $textareaError = '';

        //data validation

        if(empty($_POST['userName']))
        {
            $userNameError ='le nom est obligatoire!';
        
        }

        if(empty($_POST['email']))
       
           {$emailError ='l\'email est obligatoire!';
        
        }

        if(empty($_POST['password']))
        {
            $passwordError ='le mot de passe est obligatoire!';
        
        }

        if(empty($_POST['textarea']))
        {
            $textareaError ='le message est obligatoire!';
        
        }

        if(empty($userNameError ) && empty($emailError) && empty( $passwordError) && empty($textareaError))
          {

           $userName = filter_input(INPUT_POST, 'userName',FILTER_SANITIZE_SPECIAL_CHARS);
           $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_SPECIAL_EMAIL);
           $password = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_SPECIAL_CHARS);
           $textarea = filter_input(INPUT_POST, 'textarea',FILTER_SANITIZE_SPECIAL_CHARS);

            $query = "INSERT INTO `feedbacks` (`nom`, `email`, `password`, `message`) VALUES (  '$userName', '$email', '$password', '$textarea' )";
            if(mysqli_query($connect,$query)){
                header('Location: /learnPHP/app/feedback.php');
            }
            else{
                 echo " une erreur est survenue lors des insertions des données dans la bd." . $mysqli_error($connect);
            }
       }

    }
    
    //$data = " INSERT INTO ``feedbacks`(id`, `nom`, `email`, `password`, `message`, `date`) VALUES (NULL,'' ,'' ,'' ,'' , CURRENT_TIMESTAMP )";
?>

        <div class="d-flex justify-content-center" >
            <div class="p-5">
                <img src="./images/logo-blanc.jpeg" alt="" width ="400" class="p-5 d-block mx-auto my-5">
                <div class="fs-3 my-5 text-center  " >
                    <p>laissez votre feedback pour bogenie...</p>
                </div>
            </div>
        </div>
           <hr>

           <div class="mr-5 ml-5 bg-light">
                <form class="d-flex flex-column mb-3 mx-5 " methode ="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                      
                    <div class="mb-3">
                        <label for="userName" class="form-label">User name</label>
                        <input type="text" class="form-control <?php echo empty($userNameError) ? 'null': 'is-invalid';?>" id="userName" name = "userName" require placeholder =" ex: bendev tech">
                        <small class = "invalid-feedback"> <?php echo $userNameError; ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control <?php echo empty($emailError) ? 'null': 'is-invalid';?>" id="exampleInputEmail1" aria-describedby="emailHelp" require placeholder="ex: bendevtech@gmail.com" name="email">
                        <small class = "invalid-feedback"> <?php echo $emailError; ?></small>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control <?php echo empty($passwordError) ? 'null': 'is-invalid';?>" id="exampleInputPassword1" require name =password>
                        <small class = "invalid-feedback"> <?php echo $passwordError; ?></small>
                    </div>
                    
                    <div class="mb-3">
                    <label for="textarea" class="form-label">votre feedback</label>
                        <textarea name="textarea" id="textarea" cols="30" rows="10" class="form-control <?php echo empty($textareaError) ? 'null': 'is-invalid';?>" placeholder="votre feedback"></textarea>
                        <small class = "invalid-feedback"> <?php echo $textareaError; ?></small>
                    </div>

                    <button type="submit" class="btn btn-primary " namespace= "submit"> Soummettre</button>
                </form>
           </div>
           
          
           <?php include('./partiels/footer.php') ?>
      