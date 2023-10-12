<?php

function setValue($name){
    if(isset($_GET['$name'])){
        echo $_GET['$name'];
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
                <h1>People Registration for Online Vaccination Portal</h1>
            </div>
            
           
      </header>
            
              
            <div class="admin_body">
                <form action="phpScripts.php" method="POST">


                    <div class="field">
                        
                        <div class="data">
                            <input type="hidden" name="user_id" value="">
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="firstName">First Name:</label>
                        </div>
                        <div class="data">
                            <input type="text" name="firstName" value="<?php setValue('firstName') ?>">
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="lastName">Last Name:</label>
                        </div>
                        <div class="data">
                            <input type="text" name="lastName" value="<?php setValue('lastName') ?>">
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="address">Address:</label>
                        </div>
                        <div class="data">
                            <input type="text" name="address" value="<?php setValue('address') ?>">
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="mobile_number">Mobile No:</label>
                        </div>
                        <div class="data">
                            <input type="tel" name="mobile_number" value="<?php setValue('mobile_number') ?>">
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="gender">Gender:</label>
                        </div>
                        <div class="data">
                            <select   name="gender" id="" value="<?php setValue('gender') ?>">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="nic">NIC:</label>
                        </div>
                        <div class="data">
                            <input type="text" name="nic" value="<?php setValue('nic') ?>">
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="dob">Date of Birth:</label>
                        </div>
                        <div class="data">
                            <input type="date" name="dob" value="<?php setValue('dob') ?>">
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="district">District:</label>
                        </div>
                        <div class="data">
                        <select name="district" id="" value="<?php setValue('district') ?>">
                                <option value="colombo">Colombo</option>
                                <option value="gampaha">Gampaha</option>
                                <option value="kalutara">kalutara</option>
                                <option value="galle">Galle</option>
                                <option value="matara">Matara</option>
                                <option value="hambantota">Hambantota</option>
                                <option value="trincomalee">Trincomalee</option>
                                <option value="batticaloa">Batticaloa</option>
                        </select>
                        </div>
                    </div>


                    <div class="field">
                        <div class="label">
                            <label for="moh_id">Name of the MOH:</label>
                        </div>
                        <div class="data">
                        <select name="moh" id="" name="moh" value="<?php setValue('moh') ?>">
                                <option value="moh1">MOH1</option>
                                <option value="moh2">MOH2</option>
                                <option value="moh3">MOH3</option>
                                <option value="moh4">MOH4</option>
                        </select>
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="userName">User Name:</label>
                        </div>
                        <div class="data">
                            <input type="text" name="userName" value="<?php setValue('userName') ?>">
                        </div>
                    </div>

                  

                    <div class="field">
                        <div class="label">
                            <label for="password">Password:</label>
                        </div>
                        <div class="data">
                            <input type="password" name="password" value="<?php setValue('password') ?>">
                        </div>
                    </div>
                    
                    <div class="field">
                        <div class="label">
                            <label for="re_password">Re-Password:</label>
                        </div>
                        <div class="data">
                            <input type="password" name="re_password" value="<?php setValue('re_password') ?>">
                        </div>
                    </div>
                    
                   
                  <center>
                  <div class="field link">
                        <input type="submit" class="button" value = "Update" name="update">
                        <a href="public.php" class="clear">Clear</a>
                    </div>
        
                  </center>
                   
                </form>
            </div>
     
     


</body>
</html>