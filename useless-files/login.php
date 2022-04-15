<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx"><img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-135.jpg?w=740"></div>
                <div class="formBx">
                    <form action="">
                        <h2>Sign In</h2>
                        <input type="text" placeholder="Username" name="username" required>
                        <input type="password" placeholder="Password" name="password" required>
                        <button name="login">Login</button>
                        <p class="signup">don't have an account? <a href="#" onclick="toggleForm();">Sign Up</a> </p>
                    </form>
                </div>
            </div>

            <div class="user signupBx">
                <div class="formBx">
                    <form>
                        <h2>Create an account</h2>
                        <input type="text" placeholder="Username" required>
                        <input type="text" placeholder="Email Address" required>
                        <input type="password" placeholder="Create Password" required>
                        <input type="password" placeholder="Confirm Password" required>
                        <button name="signup">Sign Up</button>
                        <p class="signup">Already have an account? <a href="#" onclick="toggleForm();">Sign up</a></p>
                    </form>
                </div>
                <div class="imgBx"><img src="https://img.freepik.com/free-vector/account-concept-illustration_114360-399.jpg?w=740"></div>
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