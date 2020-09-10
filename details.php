<?php 
    // Include Database Connection
    include('config/db_connect.php');

    //Delete Pizza from Database
    if(isset($_POST['delete'])) {
        //Get the pizza id
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

        //Delete pizza query
        $sql = "DELETE FROM pizzas WHERE id = $delete_id";

        //Check connection and query
        if(mysqli_query($conn, $sql)) {
            //if successful
            header('Location: index.php');
        } {
            //if there are errors
            echo 'Connection error' . mysqli_error($conn);
        }

    }

        //get pizza details using id
    if(isset($_GET['id'])) {
        //Get the pizza id
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        //pizza details query
        $sql = "SELECT * FROM pizzas WHERE id = $id";

        //get result
        $result = mysqli_query($conn, $sql);

        //set the result as a single associative array
        $pizza = mysqli_fetch_assoc($result);

        //Clear result from memory
        mysqli_free_result($result);

        //Close database connection
        mysqli_close($conn);
    }

?>

<html>

    <?php include ('templates/header.php'); ?>

    <section class="section center">
        <?php if($pizza) { ?>

            <div class="container center white" id="new">
                <div class="center container white responsive-img">
                    <img src="img/pizzas.png" alt="" class="responsive-img">
                </div>
                <h3 class="brand-text brand-text-bold"> <?php echo htmlspecialchars($pizza['name']); ?> </h3>
                <div class="icon-box">
                    <svg class="icon-fix" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                    <h5><?php echo htmlspecialchars($pizza['email'])?></h5>
                </div>
                <div class="icon-box">
                    <svg class="icon-fix" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    <h5><?php echo htmlspecialchars($pizza['created_at'])?></h5>
                </div>
                <div class="icon-box">
                    <svg class="icon-fix" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                    <h5><?php echo htmlspecialchars($pizza['ingredients'])?></h5>
                </div>
                <br><br>
                <form action="details.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $pizza['id']?>">
                    <input type="submit" value="Delete Order" name="delete" class="btn z-depth-0 brand">
                </form>
            </div>

        <?php } else {?>

            <div class="container center brand-text">
                <h3>There are no pizzas!</h3>
            </div>

        <?php }?>
    </section>

    <?php include ('templates/footer.php'); ?>
</html>