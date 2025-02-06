<?php
 /*   $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
        if(!empty($username) || !empty($password) || !empty($email)) { */
            $host = "localhost";
            $dbUsername = "admin";
            $dbPassword = "admin";
            $dbName = "myrecipe";
            $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
            if (mysqli_connect_error()) {
                die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
            }
        
        //}
            
         /*   else {
                $Select = "SELECT email FROM user WHERE email = ? LIMIT 1";
                $Insert = "INSERT INTO user (username, password, email) values(?, ?, ?)";
                $stmt = $conn->prepare($Select);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->bind_result($resultEmail);
                $stmt->store_result();
                $stmt->fetch();
                $rnum = $stmt->num_rows;
                if ($rnum == 0) {
                    $stmt->close();
                    $stmt = $conn->prepare($Insert);
                    $stmt->bind_param("sss",$username, $password, $email);
                    $stmt->execute();
                    //echo "New record inserted sucessfully.";
                    
                }                        
                else {
                    echo "Someone already registers using this email.";
                }
                $stmt->close();
                $conn->close();
            }
        }
        else {
            echo "All field are required.";
            die();
        } 
        */

        /*if(isset($_POST['user_name']))  {
             $name=$_POST['user_name'];
             $checkdata = "SELECT * FROM user WHERE username='$name'";
             $query=mysql_query($checkdata);
             if(mysql_num_rows($query)>0) {
              echo "Username Already Exists";
             }
             else  {
              echo "Username Available";
            }
            exit(); */
            if(isset($_POST["user_name"])) {
                $username = mysqli_real_escape_string($conn, $_POST["user_name"]);
                $query = "SELECT * FROM user WHERE username = '".$username."'";
                $result = mysqli_query($conn, $query);
                echo mysqli_num_rows($result);
            
        }

?>