<nav class="main-nav">
    <a class="glyphicon glyphicon-plus addb-signin" href="#">Add</a>
    <!-- <a class="addb-signup" href="#0">Sign up</a> -->
</nav>

<div class="addb-user-modal"> <!-- this is the entire modal form, including the background -->
    <div class="addb-user-modal-container"> <!-- this is the container wrapper -->
        <ul class="addb-switcher">
            <li><a href="#">Sign in</a></li>
            <li><a href="#">New account</a></li>
        </ul>

        <div id="addb-login"> <!-- log in form -->
            <form class="addb-form" action="login.php" method="post">
                <p class="fieldset">
                    <label class="image-replace addb-email" for="signin-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="signin-email" type="text" placeholder="E-mail" name="username" value="<?php echo htmlentities($username); ?>">
                    <!-- <span class="addb-error-message">Invalid email</span> -->
                </p>

                <p class="fieldset">
                    <label class="image-replace addb-password" for="signin-password">Password</label>
                    <input class="full-width has-padding has-border" id="signin-password" placeholder="Password"  type="password" name="password">
                    <a href="#" class="hide-password">Hide</a>
                    <span class="addb-error-message">Password not strong enough</span>
                </p>

                <p class="fieldset">
                    <input type="checkbox" id="remember-me" checked>
                    <label for="remember-me">Remember me</label>
                </p>

<!--                 <p class="fieldsetFB">
                    <input class="full-width" type="submit" value="Login with Facebook">
                </p> -->

                <p class="fieldset">
                    <input class="full-width" type="submit" name="submit" value="Login">
                </p>
            </form>
            
            <p class="addb-form-bottom-message"><a href="#0">Forgot your password?</a></p>
            <!-- <a href="#0" class="addb-close-form">Close</a> -->
        </div> <!-- addb-login -->

        <div id="addb-signup"> <!-- sign up form -->
            <form class="addb-form" action="register.php" method="post">
                <p class="fieldset">
                    <label class="image-replace addb-username" for="signup-username">Username</label>
                    <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username" name="username">
                    <!-- <span class="addb-error-message">Invalid username</span> -->
                </p>

                <p class="fieldset">
                    <label class="image-replace addb-email" for="signup-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
                    <!-- <span class="addb-error-message">Invalid email</span> -->
                </p>

                <p class="fieldset">
                    <label class="image-replace addb-password" for="signup-password">Password</label>
                    <input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password" type="password" name="password">
<!--                     <a href="#0" class="hide-password">Hide</a>
                    <span class="addb-error-message">Password not strong enough</span> -->
                </p>

                <p class="fieldset">
                    <input type="checkbox" id="accept-terms">
                    <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
                </p>

                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" name="submit" value="Create account">
                </p>
            </form>

            <a href="#0" class="addb-close-form">Close</a>
        </div> <!-- addb-signup -->

        <div id="addb-reset-password"> <!-- reset password form -->
            <p class="addb-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

            <form class="addb-form">
                <p class="fieldset">
                    <label class="image-replace addb-email" for="reset-email">E-mail</label>
                    <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                    <span class="addb-error-message">Error message here!</span>
                </p>

                <p class="fieldset">
                    <input class="full-width has-padding" type="submit" value="Reset password">
                </p>
            </form>

            <p class="addb-form-bottom-message"><a href="#">Back to log-in</a></p>
        </div> <!-- addb-reset-password -->
        <a href="#" class="addb-close-form">Close</a>
    </div> <!-- addb-user-modal-container -->
</div> <!-- addb-user-modal -->
