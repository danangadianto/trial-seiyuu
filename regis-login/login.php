<?php 
session_start();

require '../functions/functions.php';

require '../functions/logic-login.php';

require '../functions/logic-regis.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx"><img src="../img/20220519_205907.jpg"></div>
                <div class="formBx">
                    <form action="" method="POST">
                        <h2>Sign In</h2>
                        <?php if( isset($hasNoResult) ) : ?>
                            <p style="color: red; font-style:italic;">Username/password wrong!</p>
                        <?php endif; ?>
                        <input type="text" placeholder="Username" name="username" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <input type="checkbox" name="remember" id="remember" style="width: 10%;"><label for="remember">Remember me</label><br>
                        <button type="submit" name="submit" value="Log in">Login</button>
                        <p class="signup">don't have an account? <a href="#" onclick="toggleForm();">Sign Up</a> </p>
                    </form>
                </div>
            </div>

            <div class="user signupBx">
                <div class="formBx">
                    <form action="" method="POST">
                        <h2>Create an account</h2>
                        <input type="text" placeholder="Username" name="username" required>
                        <input type="password" placeholder="Create Password" name="password" required>
                        <input type="password" placeholder="Confirm Password" name="password2" required>
                        <button type="submit" name="register">Sign Up</button>
                        <p class="signup">Already have an account? <a href="#" onclick="toggleForm();">Sign in</a></p>
                    </form>
                </div>
                <div class="imgBx"><img src="../img/seiyu.jpg"></div>
            </div>
        </div>
    </section>

    <script>
        function toggleForm() {
            section = document.querySelector('section');
            container = document.querySelector('.container');
            section.classList.toggle('active');
            container.classList.toggle('active');
        }
    </script>
</body>
</html>