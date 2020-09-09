<?php
    require "h.php";

session_unset();
session_destroy();

?>



    <main>
    <a class="a" href="header.php">Login</a>
        <div class="wrapper-main">
            <section class="section-default">
                
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == "emptyfields"){
                            echo '<h2 class="signuperror">Fill in all fields!</h2>';
                        } 
                        else if($_GET['error'] == "invaliduidmail"){
                            echo '<h2 class="signuperror">Invalid username and e-mail!</h2>';
                        }
                        else if($_GET['error'] == "invalidmail"){
                            echo '<h2 class="signuperror">Invalid e-mail!</h2>';
                        }
                        else if($_GET['error'] == "passwordcheck"){
                            echo '<h2 class="signuperror">Your passwords must match!</h2>';
                        }
                        else if($_GET['error'] == "usertaken"){
                            echo '<h2 class="signuperror">Username is already taken!</h2>';
                        }
                    }
                    else if($_GET['signup'] == "success"){
                        echo '<h2 class="msg">Signup successful!</h2>';
                    }else{
                        echo '';
                    }
                ?>
                
                <form class="form-signup" action="includes/signup.inc.php" method="post">
                <div class="header-login">
                <div
                
                class="input-group">
                
                    <input type="text" name="uid" placeholder="Username">
                    <br>
                    <input type="text" name="mail" placeholder="Email">
                    <br>
                    <input type="password" name="pwd" placeholder="Password">
                    <br>
                    <input type="password" name="pwd-repeat" placeholder="Repeat Password">
                    <br>
                    <a class="a" href="header.php">Login</a>
                    <button class="btn" type="submit" name="signup-submit">Signup</button>
                    
                </div>
                </div>
                
                </form>
                
            
            </section>
        </div>
        
    </main>

<?php
    require "footer.php";
?>
