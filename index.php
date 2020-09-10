<?php 

    //Include Database Connection
    include('config/db_connect.php');

    //Pizza  SQL query
    $sql = 'SELECT name, id FROM pizzas ORDER BY created_at';

    //Get result
    $result = mysqli_query($conn, $sql);

    //Set result as an associative array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //Clear result from cache
    mysqli_free_result($result);

    //Close Database connection
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
    <?php include ('templates/header.php'); ?>

    <section class="section center">
        <div class="container">      
            <div class="row">
                <?php if ($pizzas) {?>
                    <h3 class="brand-text">Today's Orders</h3>
                    <?php foreach ($pizzas as $pizza ) { ?>
                    <div class="col s6 l4">
                        <div class="card small z-depth-0">
                        <div class="card-image">
                            <img src="img/pizzas.png" alt="" class="responsive-img">
                        </div>
                            <div class="card-content grey-text">
                            <div class="card-title center">
                                <h6 class="brand-text brand-text-bold"><?php echo htmlspecialchars($pizza['name']) ?></h6>
                            </div>
                            </div>
                            <div class="card-action right-align">
                                <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">DETAILS</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php } else{?>
                    <h3 class="brand-text">No orders placed yet!</h3>
                    <a class="center brand-text" href="create.php">
                    <svg class="iconl" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    </a>
                <?php }?>
            </div>
        </div>
    </section>
    <?php include ('templates/footer.php'); ?>
    
</html>