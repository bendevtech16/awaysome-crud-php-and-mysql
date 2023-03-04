<?php include('./partiels/header.php') ?>

<?php 
    $query= "SELECT * FROM `feedbacks` " ;


    $result = mysqli_query($connect, $query);
    $feedbacks=mysqli_fetch_all($result,MYSQLI_ASSOC);

?>

        <div class="d-flex justify-content-center" >
            <div class="p-5">
                <img src="./images/logo-blanc.jpeg" alt="" width ="400" class="p-5 d-block mx-auto my-5">
                <div class="fs-3 my-5 text-center  " >
                    <p class=" fs-2 text-info">Nous sommes ravis de suivre vos commentaires, n'hésitez pas à en laisser un...</p>
                
                </div>
            </div>
        </div>

        <div class="bg-success mx-5 mb-5 ">
                 <div class="alert alert-success " role="alert">
                     <?php foreach($feedbacks as $feed):?>
                        <h4 class="alert-heading"> Nom : <?php echo $feed['nom'] ?> </h4>
                        <p> email : <?php echo $feed['email'] ?> </p>
                        <p> password : <?php echo $feed['password'] ?> </p>
                        <p class="mb-0"> votre message : <?php echo $feed['message'] ?></p>
                        <small class="d-flex justify-content-end"><?php echo $feed['date'] ?> </small>
                        <hr>
                        <?php endforeach ?>
                        </div>

        </div>


<?php include('./partiels/footer.php') ?>