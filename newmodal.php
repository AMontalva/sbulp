<?php require_once("session.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("validation_functions.php"); ?>



<nav class="main-nav">
    <a class="cd-signin" href="#">Sign in</a>
    <a class="cd-signup" href="#">Sign up</a>
</nav>


<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
    <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
        <ul class="cd-switcher">
            <li><a href="#">Sign in</a></li>
            <li><a href="#">New account</a></li>
        </ul>

<div id="cd-login"> <!-- log in form -->

<!--     <?php echo message(); ?> 
    <?php echo form_errors($errors); ?> -->
    
    <form class="cd-form" action="login.php" method="post">
        <p class="fieldset">
            <label class="image-replace cd-email" for="signin-email">E-mail</label>
            <input class="full-width has-padding has-border" id="signin-email" type="text" placeholder="E-mail" name="username" value="<?php echo htmlentities($username); ?>" />
            <!-- <span class="cd-error-message">Invalid email</span> -->
        </p>
        <p class="fieldset">
            <label class="image-replace cd-password" for="signin-password">Password</label>
            <input class="full-width has-padding has-border" id="signin-password" placeholder="Password" type="password" name="password" />
        </p>
        <p class="fieldset">
            <input type="checkbox" id="remember-me" checked>
            <label for="remember-me">Remember me</label>
        </p>

<!--         <p class="fieldsetFB">
            <input class="full-width" type="submit" value="Login with Facebook">
        </p> -->

        <p class="fieldset">
            <input class="full-width" type="submit" name="submit" value="Login">
        </p>
    </form>

    
    <!-- <p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p> -->
    <!-- <a href="#0" class="cd-close-form">Close</a> -->
</div> <!-- cd-login -->





        <div id="cd-signup"> <!-- sign up form -->
                
            <form class="cd-form" action="register.php" method="post">
                <p class="fieldset">
                    <label class="image-replace cd-username" for="signup-username">Username</label>    
                    <input class="full-width has-padding has-border" id="signup-username" placeholder="Username" type="text" name="username">    
                </p>

                <p class="fieldset">
                    <label class="image-replace cd-password" for="signup-password">Password</label>
                    <input class="full-width has-padding has-border" id="signup-password" placeholder="Password" type="password" name="password">
                </p>

                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" name="submit" value="Create account">
                </p>        
            </form>

            <!-- <a href="#0" class="cd-close-form">Close</a> -->
        </div> <!-- cd-signup -->






        <div id="cd-reset-password"> <!-- reset password form -->
            <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

            <form class="cd-form">
                <p class="fieldset">
                    <label class="image-replace cd-email" for="reset-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                    <span class="cd-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Reset password">
                </p>
            </form>

            <p class="cd-form-bottom-message"><a href="#">Back to log-in</a></p>
        </div> <!-- cd-reset-password -->
        <a href="#" class="cd-close-form">Close</a>
    </div> <!-- cd-user-modal-container -->
</div> <!-- cd-user-modal -->

