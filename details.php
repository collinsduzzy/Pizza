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

            <div class="container center">
                <div class="center container responsive-img">
                    <img src="img/pizzas.png" alt="" class="responsive-img">
                </div>
                <h2 class="brand-text"> <?php echo htmlspecialchars($pizza['name']); ?> </h2>
                <h4>Order placed by <?php echo htmlspecialchars($pizza['email'])?></h6>
                <h5>Time: <?php echo htmlspecialchars($pizza['created_at'])?></h5>
                <h4 class="brand-text">Ingredients</h4>
                <h5><?php echo htmlspecialchars($pizza['ingredients'])?></h5>
            </div>
            <br>
            <form action="details.php" method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $pizza['id']?>">
                <input type="submit" value="Delete Order" name="delete" class="btn-large z-depth-0 brand">
            </form>

        <?php } else {?>

            <div class="container center brand-text">
                <h3>There are no pizzas!</h3>
            </div>

        <?php }?>
    </section>

    <?php include ('templates/footer.php'); ?>
</html>