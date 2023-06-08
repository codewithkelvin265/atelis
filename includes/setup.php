<!DOCTYPE html>
<html>
<head>
    <title>Database Setup</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Cycle</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">


    <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>

</body>
</html>




<?php


 $dbServername ="localhost";
 $dbUsername="root";
 $dbPassword="";
 $dbName="00183150_e_cycleDB";

    echo'<script>alert("Creating Database Please Wait...")</script>';



    $conn =  mysqli_connect($dbServername, $dbUsername, $dbPassword);

    if (!$conn) {
    $string="Connection failed: " . $conn->connect_error;
    echo'<script>alert("'.$string.'")</script>';
    
    }
    else
    {
        $string= "The Database Connected Successfully"."<br/>";
        //echo'<script>alert("'.$string.'")</script>';
        echo $string;

    }
    $sql = "CREATE DATABASE IF NOT EXISTS 00183150_e_cycleDB ";
    if (mysqli_query($conn, $sql))
    {
       // echo'<script>alert("Database Created Successfully")</script>';
        echo "Database Created Successfully"."<br/>";
    }
    else{
            $string="Error creating database: " . mysqli_error($conn);
            //echo'<script>alert("'.$string.'")</script>';
            echo $string;
    }
    $sql = "USE 00183150_e_cycleDB";
    $conn =  mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    if (mysqli_query($conn, $sql))
    {

        $string= "Database Selected successfully"."<br/>";
        //echo'<script>alert("'.$string.'")</script>';
        echo $string;
    }
    else
    {
        $string= "Error Selecting database: " . mysqli_error($conn);
        //echo'<script>alert("'.$string.'")</script>';
        echo $string;
    }

    if (!$conn) {
                    $string="ReConnection failed: " . $conn->connect_error;
                    //echo'<script>alert("'.$string.'")</script>';
                    echo $string;
    }
    else
    {
        //echo'<script>alert("Reconnection Successful")</script>';
        echo "Reconnection Successful"."<br/>";
    }
    $sql = "USE 00183150_e_cycleDB";
    if (mysqli_query($conn, $sql))
    {
                        $string= "Database ReSelected successfully"."<br/>";
                        //echo'<script>alert("'.$string.'")</script>';
                        echo $string;
    }
    else
    {
                         //echo'<script>alert("Failed To Reselect")</script>';
                         echo "Failed To Reselect";
    }


    $sql= "CREATE TABLE IF NOT EXISTS USERS (
        userID int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        CREATE TABLE `dbAM00183150`.`users` ( `userid` INT NOT NULL AUTO_INCREMENT , `firstname` VARCHAR(30) NOT NULL , `lastname` VARCHAR(30) NOT NULL , `phone` VARCHAR(15) NOT NULL , `password` VARCHAR(30) NOT NULL , `dateregistered` DATE NOT NULL , `usertype` VARCHAR(20) NOT NULL , `locked` BOOLEAN NOT NULL , `attempts` INT(1) NULL , PRIMARY KEY (`userid`(10))) ENGINE = InnoDB;
                        locked int(2) default '0',
                        attempts int(2) default '0'
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "USERS table created successfully"."<br/>";
    }
    else
                    {
                       echo"Error creating USERS table: " . mysqli_error($conn);


                    }

       $sql= "CREATE TABLE IF NOT EXISTS CONTACTS (
       cID int(13) not null AUTO_INCREMENT PRIMARY KEY,
        userID int(13),
                        
        name varchar(100) not null,
         email varchar(100) not null,
         subject varchar (300) not null,
        message varchar (500) not null
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("CONTACTS table created successfully")</script>';
    echo "CONTACTS table created successfully"."<br/>";
    }
    else
                    {
                       echo"Error creating CONTACTS table: " . mysqli_error($conn);
                    }
                    
    $sql= "CREATE TABLE IF NOT EXISTS cycles (
                            cycleID int(13) not null AUTO_INCREMENT PRIMARY KEY,
                            cname varchar(50) NOT null,
                            cprice float(50) NOT null,
                            cquantity INT(5) not null,
                            cimage varchar(400) NOT null,
                            ccategory varchar (300) not null,
                            cdescription varchar (10000) not null
                            );";

    if (mysqli_query($conn, $sql))
                        {
                            //echo'<script>alert("CYCLES table created successfully")</script>';
                            echo "CYCLES table created successfully"."<br/>";
    }
    else
                        {
                            $string="Error creating CYCLES table: " . mysqli_error($conn);
                            //echo'<script>alert("'.$string.'")</script>';
                            //die();
                            echo $string;
                        }
    $sql= "INSERT INTO `00183150_e_cycledb`.`cycles` (`cycleID`, `cname`, `cprice`, `cquantity`, `cimage`, `ccategory`, `cdescription`) VALUES 
    (NULL, 'BMX', '66.99', '7', 'cimg/c12.jpg', 'Best Deals', 'Get the best deal on this BMX electric Bike'), 
    (NULL, 'VW Golf 5 cycle', '998.99', '4', 'cimg/13.jpg', 'Premium Bikes', 'Get this Sports Bike'), 
    (NULL, 'Ferarri X5 cycle', '998.99', '4', 'cimg/c4.jpg', 'Premium Bikes', 'Dont think bikes are cool?'), 
    (NULL, 'MERCEDES Prime Cycle', '998.99', '4', 'cimg/c9.jpg', 'Premium Bikes', 'Get this Sports Bike'), 
    (NULL, 'Bugatti Cruise Cycle', '998.99', '4', 'cimg/c11.jpg', 'Premium Bikes', 'Get this Sports Bike'), 
    (NULL, 'TOYOTA Spiral Cycle', '998.99', '4', 'cimg/c8.jpg', 'Premium Bikes', 'Get this Sports Bike');";

    if (mysqli_query($conn, $sql))
    {
                                //echo'<script>alert("Values Inserted into CYCLES")</script>';
        echo "Values Inserted into CYCLES"."<br/>";
    }
    else
                            {
                                    //echo'<script>alert("Error Inserting into CYCLES")</script>';
                                    //die();
                                echo "Error Inserting into CYCLES";
                            }
$sql="CREATE TABLE IF NOT EXISTS `00183150_e_cycledb`.`sales` (
`saleID` INT(13) NOT NULL ,
`userID` VARCHAR(50)  ,
`dos` DATE NOT NULL ,
`sAmount` FLOAT NOT NULL ,
`cycle_bought` VARCHAR(300) NOT NULL); ";

if (mysqli_query($conn, $sql))
                        {
                            //echo'<script>alert("sales table created successfully")</script>';
                            echo "sales table created successfully"."<br/>";
    }
    else
                        {
                            $string="Error creating Sales table: ";
                            //echo'<script>alert("'.$string.mysqli_error($conn).'")</script>';
                            //die();
                            echo $string;
                        }


                                date_default_timezone_set('America/New_York');

                                $d=date("y-m-d");

                                $pwd="admin";
                                //$pwd=password_hash($pwd, PASSWORD_DEFAULT);
                                $sql = "INSERT INTO Users (fname, lname, email, uname, pwd, dob, gender, p_address, p_code)
                                VALUES ('Kelvin', 'Msiska', 'kelx@example.com', 'admin','$pwd', '$d', 'male', 'unknown', 'unknown');";

                                if (mysqli_query($conn, $sql))
                                {
                                    //echo "<script>alert('New record in Users created successfully')</script>";
                                    echo "New record in Users created successfully"."<br/>";
                                                              $conn =  mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
                                echo "<script>alert('Database Ready!')</script>";
                                                              //echo "Database Ready!";
                                                            echo '<center><a class="btn btn-more" href="home.php">Go To Home Page</a></center>';

                                //echo "<script>window.open('home.php','_self')</script>";
                                }
                                else {

                                     //echo "<script>alert('Database Failure')</script>";
                                     echo("Error: " . $sql . "<br>" . mysqli_error($conn));
                                }








     /*$sql = "INSERT INTO `00183150_e_cycledb`.`faq` (`question`, `answer`) VALUES ('What is An E-cycle?', 'It is a bicycle with an electric mechanism to help with pedaling.'), ('What is your goal?', 'To provide the highest quality bikes for a cheap price.');";

        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);*/




?>















CREATE TABLE `dbAM00183150`.`groups` ( `id` INT NOT NULL AUTO_INCREMENT , `usertype` VARCHAR(30) NOT NULL , `permissions` TEXT NOT NULL , `accountid` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;