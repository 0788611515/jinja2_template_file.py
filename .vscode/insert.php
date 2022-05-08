<?php
$USERID = $_POST['USERID'];
$NAME = $_POST['NAME'];
$Email = $_POST['EMAIL'];
$LoginID = $_POST['LoginID'];
$Password = $_POST['Password'];
$UserType = $_POST['UserType'];

if (!empty($USERID); !empty($NAME); !empty($EMAIL); 
!empty($LoginID); !empty($Password); !empty($UserType));
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "userstables";
 
    //create connection
    $conn =  new mysql($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connection error('. mysqli_connect_error().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT email Form jinja2 where email = ? Limit 1";
        $INSERT = "INSERT into jinja2 (UserID, Name, Email, LoginID, Password, UserType) values(?, ?, ?, ?, ?, ?)";

        //prepare statement
        
        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $stmt = $stmt->num_rows;

        if ($rnum==0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssii", $userID, $Name, $Email, $LoginID, $Password, $UserType);
            $stmt->execute();
            echo "New record inserted successfully";
        } else {
            echo "Someone already register using this Email";
        }
        $stmt->close();
        $stmt->close();
    }
    else {
    echo "All field are require";
    die();

}

?>