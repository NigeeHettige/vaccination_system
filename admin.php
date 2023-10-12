<?php

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
    <link rel = "stylesheet" href = "main.css?<?php echo time() ?>">
</head>
<body>

      <header>
            <div class="admin_a">
                <a href="#" class="admin">Admin</a>
            </div>
            
            <div class="navLink">
                <nav>
                    <ul class="nav_links">
                        <li><a href="vaccination_system.php" class="moh">MOH</a></li>
                        <li><a href="vaccination_system.php" class="logout">Logout</a></li> 
                    </ul>
                
                </nav>
            </div>
      </header>
            
              
            <div class="admin_body">
                <form action="phpScripts.php" method="POST">

                    <div class="field">
                        <div class="label">
                            <label for="moh_id">MOH id:</label>
                        </div>
                        <div class="data">
                            <input type="text" name="moh_id" value=<?php if(isset($_GET['clear'])){ echo "";} else {setValue('moh_id');}?>>
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="moh">Name of the MOH:</label>
                        </div>
                        <div class="data">
                        <select name="moh" id="" value=<?php setValue('moh')?>>
                                <option value="MOH1">MOH1</option>
                                <option value="MOH2">MOH2</option>
                                <option value="MOH3">MOH3</option>
                                <option value="MOH4">MOH4</option>
                        </select>
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="first_name">First Name:</label>
                        </div>
                        <div class="data">
                            <input type="text" name="first_name"  value=<?php setValue('first_name')?>>
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="last_name">Last Name:</label>
                        </div>
                        <div class="data">
                            <input type="text" name="last_name" value=<?php setValue('last_name')?>>
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="address">Address:</label>
                        </div>
                        <div class="data">
                            <input type="text" name="address" value=<?php setValue('address')?>>
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="mobile_number">Mobile No:</label>
                        </div>
                        <div class="data">
                            <input type="tel" name="mobile_number" value=<?php setValue('mobile_number')?>>
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="password">Password:</label>
                        </div>
                        <div class="data">
                            <input type="password" name="password" value=<?php setValue('password')?>>
                        </div>
                    </div>
                    
                   
                  <center>
                  <div class="field link">
                        <input type="submit" class="button" value="Add" name='submit'>
                        <a href="admin.php" class="clear" name="clear">Clear</a>
                    </div>
        
                  </center>
                   
                </form>
            </div>
     
     


</body>
</html>