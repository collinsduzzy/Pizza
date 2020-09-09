<?php

    //include database connect file
    include('config/db_connect.php');

    //Declare form fields variables 
    $email = '';
    $name = '';
    $ingredients = '';

    //Create error variable
    $errors = ['email' => '', 'name' => '', 'ingredients' => ''];

    //Action after submit button is clicked
    if(isset($_POST['submit'])){

        //Email Address
        if(empty($_POST['email'])) {
            $errors['email'] = 'email required <br />';
        } else {
                $email = $_POST['email'];
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = 'Must be a valid email address <br />';
                }
        }

        //Pizza Name
        if(empty($_POST['name'])) {
            $errors['name'] = 'name required <br />';
        } else {
            $name = $_POST['name'];
            if(!preg_match('/^[a-zA-z\s]+$/', $name)){
                $errors['name'] = 'Name must be alphabets and spaces only <br />';
            }
        }

        //Pizza Ingredients
        if(empty($_POST['ingredients'])) {
            $errors['ingredients'] = 'enter ingredients <br />';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                $errors['ingredients'] = 'Ingredients must be comma seperated <br />';
            }
        }
        if(array_filter($errors)) {
            //show errors in form
        } else {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            $sql = "INSERT INTO pizzas(name, ingredients, email) VALUES ('$name', '$ingredients', '$email')";
            if(mysqli_query($conn, $sql)){
                header('Location: index.php');
            } else {
                    echo 'query error '.mysqli_error($conn);
                }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include ('templates/header.php'); ?>
    <section class="section container ">
        <div class="center">
            <h4 class="brand-text">Place Your Order</h4>
        </div>
        <form class="white" action="create.php" method="POST" id="new">
            <div class="input-field">
            <svg class="w-6 h-6 prefix icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                <label for="email">Your Email</label>
                <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
                <span class="red-text helper-text"><?php echo $errors['email']; ?></span>
            </div>
            <div class="input-field">
            <svg class="w-6 h-6 prefix icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                <label for="name">Pizza Name</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>">
                <span class="red-text helper-text"><?php echo $errors['name']; ?></span>
            </div>
            <div class="input-field">
            <svg class="w-6 h-6 prefix icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                <label for="ingredients">Ingredients</label>
                <input type="text" name="ingredients" id="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
                <span class="red-text helper-text"><?php echo $errors['ingredients']; ?></span>
            </div>
            <div class="center">
                <button type="submit" name="submit" value="submit" class="brand btn z-depth-0">ORDER</button>
            </div>
        </form>
    </section>
    <?php include ('templates/footer.php'); ?>
</html>
