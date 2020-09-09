<?php
    require "h.php";
?>
    <main>
        <body>

        <div class="wrapper-main">
            <section class="selection-default">
                <?php
                    if(isset($_SESSION['userId'])){
                        echo '<p3 class="login-status">You are logged in</p>';
                    } else{
                        echo '<p3 class="login-status">You are logged out</p>'; 
                    }
                ?>
            </section>
        </div>
                </body>
    </main>

    <?php
    require "footer.php";
?>


