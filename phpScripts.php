<?php

    include('connection.php');
    session_start();



    //password checking
    function validPassword($name){
        $uppercase = preg_match('@[A-Z]@',$name);
        $lowercase = preg_match('@[a-z]@',$name);
        $number = preg_match('@[0-9]@',$name);
        $specialChar = preg_match('@[^\w]@',$name);

        
            if(!$uppercase || !$lowercase || !$number || !$specialChar || strlen($name)<8){
               return False;
            }else{
                return TRUE;
            }
        

    }

    //for the admin signup

    if(isset($_POST['submit'])){

        $mohId = $_POST['moh_id'];
        $moh = $_POST['moh'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $mobileNumber = $_POST['mobile_number'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO admin VALUES('$mohId','$moh','$first_name','$last_name','$address','$mobileNumber','$password')";
        $result = mysqli_query($connection,$query);

        if($result){
            echo "<script>alert('ínsertion success!')</script>";
            header("location: index.php");
            exit;
        } else {
            echo "<script>alert('ínsertion unsuccess!')</script>";
            header("location: admin.php");
            exit;
        }

    } 

    if(isset($_POST['login'])){
        
        $userName = $_POST['user_name'];
        $password = $_POST['password'];

        $query = "SELECT password FROM admin WHERE moh_id = '$userName'";
        $result = mysqli_query($connection,$query);
        $numRows = mysqli_num_rows($result);
        
        if($numRows == 1){
            $row = mysqli_fetch_assoc($result);
            $passwordHash = $row['password'];

            if(password_verify($password,$passwordHash)){
                $_SESSION['username'] = $userName;
                header("location: moh.php?id=".$row['moh_id']);
            }
        }

        $query_user = "SELECT user_id,password FROM user WHERE user_name = '$userName'";
        $result_user = mysqli_query($connection,$query_user);
        $num_rowUser = mysqli_num_rows($result_user); 
        

        if($num_rowUser ==1){
            $row_user = mysqli_fetch_assoc($result_user);
            $passwordEnc = $row_user['password'];

            if(password_verify($password,$passwordEnc)){
                $_SESSION['username'] = $userName;
                header("location: person.php?id=".$row_user['user_id']);
            }
        }
    }


    // for the public signup

    if(isset($_POST['update'])){
        $user_id = $_POST['user_id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $mobileNumber = $_POST['mobile_number'];
        $gender = $_POST['gender'];
        $nic = $_POST['nic'];
        $dob = $_POST['dob'];
        $district = $_POST['district'];
        $moh = $_POST['moh'];
        $userName = $_POST['userName'];

        $query_uName = "SELECT user_name FROM user WHERE user_name ='$userName'";
        $result_uName = mysqli_query($connection,$query_uName);
        $row_uName = mysqli_num_rows($result_uName);

        
        // echo $row_uName;


        if($row_uName > 0){
           
                echo "<script> alert('user name is already exists'); </script>";
            
            
        }else{
                if(validPassword($_POST['password'])){

                    if($_POST['password'] == $_POST['re_password']){
                        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
                    
                        $query = "INSERT INTO `user`(`first_name`, `last_name`, `gender`, `mobile_number`, `address`, `district`, `moh`, `dob`, `nic`, `user_name`, `password`) VALUES ('$firstName','$lastName','$gender','$mobileNumber','$address','$district','$moh','$dob','$nic','$userName','$password')";
                        $result = mysqli_query($connection,$query);
                            if($result){
                                header("location: vaccination_system.php");
                                exit;
                            }else{
                                echo "unsuccessful";
                            }
                    } 

                } else {
                    echo "<script>alert('password should be at least 8 characters in length and should include at least one upper case letter,one lower case letter,one number and one special character');
                    window.location.href = 'public.php';</script>";
                    
                }

                
             


        }
        
      
    }

    if(isset($_GET['action']) && isset($_GET['action']) == 'logout'){
        if($_COOKIE[session_name()]){
            setcookie(session_name(),'',time()-3600,'/');
        }
        session_unset();
        session_destroy();
        header("location: vaccination_system.php");
    }




    //smart_vaccination details in person 

    if(isset($_POST['person_submit'])){

        $passport_num = $_POST['passport_num'];
        $fullName = $_POST['full_name'];
        $age = $_POST['age'];
        $email = $_POST['email'];

        // $passport_doc = $_FILES['passport_doc'];
        // $nic_doc = $_FILES['nic_doc'];
        // $vac_card = $_FILES['vac_card'];
       

       

      

        $file = $_FILES['passport_doc'];
        $filename = $_FILES['passport_doc']['name'];
        $filetempName = $_FILES['passport_doc']['tmp_name'];
        $fileError = $_FILES['passport_doc']['error'];
        $fileType = $_FILES['passport_doc']['type'];
        $fileSize = $_FILES['passport_doc']['size'];

        $file1 = $_FILES['nic_doc'];
        $filename1 = $_FILES['nic_doc']['name'];
        $filetempName1 = $_FILES['nic_doc']['tmp_name'];
        $fileError1 = $_FILES['nic_doc']['error'];
        $fileType1 = $_FILES['nic_doc']['type'];
        $fileSize1 = $_FILES['nic_doc']['size'];


        $file2 = $_FILES['vac_card'];
        $filename2 = $_FILES['vac_card']['name'];
        $filetempName2 = $_FILES['vac_card']['tmp_name'];
        $fileError2 = $_FILES['vac_card']['error'];
        $fileType2 = $_FILES['vac_card']['type'];
        $fileSize2 = $_FILES['vac_card']['size'];


    

        $fileExe = explode(".",$filename);
        $fileExeCorrect = strtolower(end($fileExe));

        $fileExe1 = explode(".",$filename1);
        $fileExeCorrect1 = strtolower(end($fileExe1));

        $fileExe2 = explode(".",$filename2);
        $fileExeCorrect2 = strtolower(end($fileExe2));

        $allow =array('pdf','jpg','png','jpeg');

        if(in_array($fileExeCorrect,$allow) && in_array($fileExeCorrect1,$allow) && in_array($fileExeCorrect2,$allow)){
            if($fileError==0 && $fileError1==0 && $fileError2==0 ){
                if($fileSize<= 1000000 && $fileSize1<= 1000000 && $fileSize2<= 1000000){
                    $fileName = $passport_num.".".$fileExeCorrect;
                    $path ='upload/passport/'.$fileName;

                    $fileName1 = $passport_num.".".$fileExeCorrect1;
                    $path1 ='upload/nic/'.$fileName1;

                    $fileName2 = $passport_num.".".$fileExeCorrect2;
                    $path2 ='upload/vaccination_card/'.$fileName2;

                    move_uploaded_file($filetempName,$path);
                    move_uploaded_file($filetempName1,$path1);
                    move_uploaded_file($filetempName2,$path2);

                    $query = "INSERT INTO smart_vaccination(passport_num,full_name,age,email,passport_doc,nic_doc,vac_card) VALUES ('$passport_num','$fullName','$age','$email','$path','$path1','$path2')";
                    $result = mysqli_query($connection,$query);
                    if($result){
                        echo"success";
                        echo "<script>window.location.href='person.php'</script>";
                    }else{
                        echo "unsuccess";
                        echo "<script>window.location.href='person.php'</script>";
                    }
                }else{
                    echo"too much";
                    echo "<script>window.location.href='person.php'</script>";

                }

            }else{
                echo "uploading fail";
                 echo "<script>window.location.href='person.php'</script>";
            }

        }else{
            echo "type error";
            echo "<script>window.location.href='person.php'</script>";
        }



    }



    




?>
