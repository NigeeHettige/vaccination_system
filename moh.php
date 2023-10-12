<?php


if(isset($_GET['person_history'])){
    person_history();
}
else if(isset($_GET['announcement'])){
    announcement();
}
else if(isset($_GET['reports'])){
    reports();
}else{
    smart_vaccination();
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href = "main.css?<?php echo time()?>">
</head>
<body>

    <header>

       <div class="admin_a">
            <h1>MOH</h1>
       </div>

       <div class="navLink">
            <nav>
                <ul class="nav_links">
                    <li><a href="?smart_vaccination=#" class="moh under">SmartVaccination</a></li>
                    <li><a href="?person_history=#" class="moh under">Person History</a></li>
                    <li><a href="?announcement=#" class="moh under">Announcement</a></li>
                    <li><a href="?reports=#" class="moh under">Reports</a></li>
                    <li><a href="vaccination_system.php" class="logout">Logout</a></li>
                </ul>
            </nav>
       </div>
    </header>
    

    <?php function smart_vaccination(){ ?>
     <!-- smart vaccination starts --> 
    <div class="moh_main">
        
        <div class="moh_table">
            <table border =1  class ="sv_table">
                <thead>
                    <tr>
                        <th>NIC</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Mobile No</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>721345780V</td>
                        <td>Susan</td>
                        <td>Dsouza</td>
                        <td>Colombo</td>
                        <td>+947775566012</td>
                        <td><div ><a href="" class= "sma_vac">view</a></div></td>
                        <td><div class= "sma_vac1"><a href="" class= "sma_vac">Approve</a></div></td>
                        <td><div class= "sma_vac2"><a href="" class= "sma_vac">Reject</a></div></td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
    <!-- smart vaccination ends -->
    <?php } ?>


    <?php function person_history(){ ?>
    <!-- Person history section starts -->

    <div class="admin_body">

                    
        <form action="">

            <div class="field">
                <div class="label">
                    <label for="date">Date:</label>
                </div>
                <div class="data">
                    <input type="date">
                </div>
            </div>



            <div class="field">
                <div class="label">
                    <label for="nic">NIC</label>
                </div>
                <div class="data">
                    <input type="text" >
                </div>
            </div>

            <div class="field">
                <div class="label">
                    <label for="vaccine_product">Vaccine Product</label>
                </div>
                <div class="data">
                    <input type="text" >
                </div>
            </div>
            
            <div class="field">
                <div class="label">
                    <label for="batch_number">Batch Number</label>
                </div>
                <div class="data">
                    <input type="number" >
                </div>
            </div>

            <div class="field">
                <div class="label">
                    <label for="vaccination_status">Vaccination Status</label>
                </div>
                <div class="data">
                    <input type="text" >
                </div>
            </div>

            <center>
                <div class="field link">
                        <input type="submit" class="button" value = "Add">
                        <a href="#" class="clear">Clear</a>
                    </div>

            </center>

        </form>
    </div>
    <!-- Person history section ends -->
    <?php } ?>

    <?php function announcement(){ ?>

    <!-- Announcement section starts -->
    <div class="admin_body">             
        <form action="">

            <div class="field">
                <div class="label">
                    <label for="date">Date:</label>
                </div>
                <div class="data">
                    <input type="date">
                </div>
            </div>



            <div class="field">
                <div class="label">
                    <label for="vaccine">Vaccine</label>
                </div>
                <div class="data">
                    <input type="text" >
                </div>
            </div>

            <div class="field">
                <div class="label">
                    <label for="venue">Venue</label>
                </div>
                <div class="data">
                    <input type="text" >
                </div>
            </div>
            
            <div class="field">
                <div class="label">
                    <label for="age_group">Age group</label>
                </div>
                <div class="data">
                    <input type="text" >
                </div>
            </div>

            <div class="field">
                <div class="label">
                    <label for="no_of_dosage">No.of dosage:</label>
                </div>
                <div class="data">
                    <input type="number" >
                </div>
            </div>

            <center>
                <div class="field link">
                        <input type="submit" class="button" value = "Add">
                        <a href="#" class="clear">Clear</a>
                    </div>

            </center>

        </form>
    </div>

    <!-- Announcement section ends -->
    <?php } ?>


    <?php function reports(){ ?>
    <!-- Reports section starts -->
    <div class="admin_body">

            
        <form action="">

            <div class="field">
                <div class="label">
                    <label for="from_date">From Date:</label>
                </div>
                <div class="data">
                    <input type="date">
                </div>
            </div>



            <div class="field">
                <div class="label">
                    <label for="to_date">To date</label>
                </div>
                <div class="data">
                    <input type="date" >
                </div>
            </div>

            
            <div class="field">
                        <div class="label">
                            <label for="district">District:</label>
                        </div>
                        <div class="data">
                            <select name="" id="">
                                    <option value="">Colombo</option>
                                    <option value="">Gampaha</option>
                                    <option value="">kalutara</option>
                                    <option value="">Galle</option>
                                    <option value="">Matara</option>
                                    <option value="">Hambantota</option>
                                    <option value="">Trincomalee</option>
                                    <option value="">Batticaloa</option>
                            </select>
                        </div>
            </div>

            <div class="field">
                        <div class="label">
                            <label for="moh_id">Name of the MOH:</label>
                        </div>
                        <div class="data">
                            <select name="" id="">
                                    <option value="">MOH1</option>
                                    <option value="">MOH2</option>
                                    <option value="">MOH3</option>
                                    <option value="">MOH4</option>
                            </select>
                        </div>
            </div>


            <center>
                  <div class="field link">
                        <input type="submit" class="button" value = "View">
                        <a href="#" class="clear">Clear</a>
                    </div>
        
            </center>

            <div class="field">
                <div class="label">
                    <label for="documents">Documents:</label>
                </div>
                <div class="data upload_doc">
                    <table border = 1 >
                        <tr>
                            <th>Age group</th>
                            <th>Number of people</th>
                        </tr>
                        <tr>
                            
                            <td style = "width:40px"> <30 years </td>
                            <td style = "width:40px"> 65 </td>
                            
                        </tr>
                       
                    </table>
                
                </div>
            </div>


            



        </form>
    </div>
    <!-- Reports section ends -->
   <?php } ?>
    
</body>
</html>