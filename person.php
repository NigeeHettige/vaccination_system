<?php

include('connection.php');
session_start();


if(!isset($_SESSION['username'])){
    header("location: vaccination_system.php");
}

if(isset($_GET["smart_vaccination"])){
    smart_vaccination();
}
else {
    person();
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM user WHERE user_id = '$id'";
    $result = mysqli_query($connection,$query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['row'] = array();
        $_SESSION['row'] = $row;
        $_SESSION['row']['first_name'] = $row['first_name'];
        $_SESSION['row']['last_name'] = $row['last_name'];
        $_SESSION['row']['address'] = $row['address'];
        $_SESSION['row']['gender'] = $row['gender'];
        $_SESSION['row']['nic'] = $row['nic'];
        $_SESSION['row']['dob'] = $row['dob'];
    }

    
}

function setvalue($name){
    if(isset($_POST['Sname'])){
        echo $_POST['$name'];
    }
}




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href ="main.css?=<?php echo time()?>">
</head>
<body>
   
           
    <header>
        <div class="admin_a">
            <a href="?person" class="under"><h1>Person Name</h1></a>
        </div>

        <div class="navLink">
            <nav>
                <ul class="nav_links">
                    <li><a href="?smart_vaccination" class="moh under">Smart Vaccination</a></li>
                    <li class="moh under">Announcement</li>
                    <li><a href="phpScripts.php?action=logout" class="logout">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
          

<div class="sidediv">
<!-- Smart vaccination display -->
<?php function smart_vaccination(){
?>

    <div class="admin_body">

           
                <form action="phpScripts.php" method="POST"  enctype ="multipart/form-data" >

                    <input type="hidden" name ="vac_id">

                    <div class="field">
                        <div class="label">
                            <label for="passport_num">Passport No:</label>
                        </div>
                        <div class="data">
                            <input type="text" name="passport_num" value="<?php setValue('passport_num')?>">
                        </div>
                    </div>

                

                    <div class="field">
                        <div class="label">
                            <label for="full_name">Full Name:</label>
                        </div>
                        <div class="data">
                            <input type="text" name="full_name" value="<?php setValue('full_name') ?>">
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="age">Age:</label>
                        </div>
                        <div class="data">
                            <input type="number" name="age" value="<?php setValue('age') ?>">
                        </div>
                    </div>

                    
                    <div class="field">
                        <div class="label">
                            <label for="email">Email:</label>
                        </div>
                        <div class="data">
                            <input type="email" name="email" value="<?php setValue('email') ?>">
                        </div>
                    </div>

                    <div class="field">
                        <div class="label">
                            <label for="document">Document:</label>
                        </div>
                        
                    </div>

                    
                        <div class="field">
                            <div class="label">
                                <label for="passport_doc">Photocopy of the Passport(Detail Page)</label>
                                
                            </div>
                            <div class="data">
                                <input type="file" name="passport_doc" value="<?php setValue('passport_doc') ?>">
                               
                            </div>
                        </div>
                        <div class="field">
                            <div class="label">
                                <label for="nic_doc">Photocopy of the NIC(Front and Back Page)</label>

                            </div>
                            <div class="data">
                                <input type="file" name="nic_doc" value="<?php setValue('nic_doc') ?>">
                               
                            </div>
                        </div>

                        <div class="field">
                            <div class="label">
                                <label for="vac_card">Photocopy of the Vaccination Card(Front and Back Page)</label>
                            </div>
                            <div class="data">
                                <input type="file" name="vac_card" value="<?php setValue('vac_card') ?>">
                               
                            </div>
                        </div>
                    
                
                <center>
                     <div class="field link">
                        <input type="submit" class="button" name="person_submit">
                        <a href="?smart_vaccination" class="clear">Clear</a>
                    </div>
        
                </center>
                
                </form>
    </div>

<?php
}
?>
<!-- Smart vaccination display ends-->

<!-- Person details display -->
<?php function person(){ ?>

    <div class="admin_body">

            
        <form action="">

            <div class="field">
                <div class="label">
                    <label for="full Name">Full Name:</label>
                </div>
                <div class="data">
                    <input type="text" value="<?php echo $_SESSION['row']['first_name']." ".$_SESSION['row']['last_name'];?>" disabled>
                </div>
            </div>



            <div class="field">
                <div class="label">
                    <label for="address">Address:</label>
                </div>
                <div class="data">
                    <input type="text" value="<?php echo $_SESSION['row']['address'] ?>" disabled>
                </div>
            </div>

            <div class="field">
                <div class="label">
                    <label for="gender">Gender:</label>
                </div>
                <div class="data">
                    <input type="text" value="<?php echo $_SESSION['row']['gender'] ?>" disabled>
                </div>
            </div>

            <div class="field">
                <div class="label">
                    <label for="nic_passport">NIC/Passport:</label>
                </div>
                <div class="data">
                    <input type="text" value ="<?php echo $_SESSION['row']['nic'] ?>" disabled>
                </div>
            </div>

            <div class="field">
                <div class="label">
                    <label for="dob">Date of Birth:</label>
                </div>
                <div class="data">
                    <input type="text" value ="<?php echo $_SESSION['row']['dob'] ?>" disabled>
                </div>
            </div>

            <div class="field">
                <div class="label">
                    <label for="documents">Documents:</label>
                </div>
                <div class="data upload_doc">
                    <table border = 1 >
                        <tr>
                            <th></th>
                            <th colspan ="4">Vaccine Doses</th>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td style = "width:40px">dd-mm-yyyy</td>
                            <td style = "width:40px"></td>
                            <td style = "width:40px"></td>
                            <td style = "width:40px"></td>
                        </tr>
                        <tr>
                            <th>Vaccine Product</th>
                            <td>Pfizer</td>
                            <td style = "width:40px"></td>
                            <td style = "width:40px"></td>
                            <td style = "width:40px"></td>
                        </tr>
                        <tr>
                            <th>Batch Number</th>
                            <td>Pfizer-FJ5782</td>
                            <td style = "width:40px"></td>
                            <td style = "width:40px"></td>
                            <td style = "width:40px"></td>
                        </tr>
                    </table>
                
                </div>
            </div>


            <div class="field">
                <div class="label">
                    <label for="status">Vaccination Status:</label>
                </div>
                <div class="data">
                    <input type="text" value ="1st dose given" disabled>
                </div>
            </div>
            



        </form>
    </div>

<?php    
}
?>




</div>
   
   




    
</body>
</html>