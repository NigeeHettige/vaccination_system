<?php

if(isset($_GET['password_reset'])){
    password_reset();
} else {
    login();
}

function setValue($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css?=<?php echo time()?>">
</head>
<body>
    <header >
        <div >
            <a href="" class="admin_a "><h1 class="headerBox">Vaccination System</h1></a>
        </div>
    </header>    

    <?php function login(){ ?>
    <div class="admin_body">

            
        <form action="phpScripts.php" method="POST">

            <div class="field">
                <div class="label">
                    <label for="user_name">User Name:</label>
                </div>
                <div class="data">
                    <input type="text" name="user_name">
                </div>
            </div>



            <div class="field">
                <div class="label">
                    <label for="password">Password:</label>
                </div>
                <div class="data">
                    <input type="password" name="password">
                </div>
            </div>

            
            <div class="field link">
                 <a href="?password_reset" class="reset_pwd">Reset password</a>
                        
             </div>            


            <center>
                    <div class="field link">
                        <input type="submit" class="button" name="login" value = "Login">
                    </div>
            </center>


           


            



        </form>
    </div>
    <?php  } ?>
    <?php function password_reset(){ ?>
    <div class="admin_body">

            
        <form action="">

            <div class="field">
                <div class="label">
                    <label for="old_pwd">Old Password:</label>
                </div>
                <div class="data">
                    <input type="password">
                </div>
            </div>



            <div class="field">
                <div class="label">
                    <label for="new_password">New Password:</label>
                </div>
                <div class="data">
                    <input type="password" >
                </div>
            </div>


             <center>
                  <div class="field link">
                        <input type="submit" class="button" value = "Update">
                        <a href="#" class="clear">Clear</a>
                    </div>
        
            </center>

           


            



        </form>
    </div>

    <?php } ?>
</body>
</html>