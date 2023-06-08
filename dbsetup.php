<?php 
  require_once 'core/init.php';
?>


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
    <!-- Toast Notifications -->
    <link rel="stylesheet" href="toastr/toastr.min.css">


</head>
<body>






<?php


 $dbServername ="localhost";
 $dbUsername="root";
 $dbPassword="";
 $dbName="atelis";

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
    $sql = "CREATE DATABASE IF NOT EXISTS atelis ";
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
    $sql = "USE atelis";
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
    $sql = "USE atelis";
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

//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS USERS (
        userid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        firstname varchar(50) NOT null,
                        lastname varchar(50) NOT null,
                        username varchar(50),
                        email varchar(50) NOT null,
                        usertype varchar(50) NOT null,
                        password varchar (300) not null,
                        salt varchar (65) not null,
                        joined date,
                        verified int(2) default '0',
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


//////////////////////////////CREATING COurses TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS COURSES (
        courseid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        coursename varchar(50) NOT null
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "COurses table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating COurses table: " . mysqli_error($conn);

    }



//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS Applications (
        applcationid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        firstname varchar(50) NOT null,
                        lastname varchar(50) NOT null,
                        email varchar(50) NOT null,
                        appliedcourses varchar(50) NOT null,
                        dateapplied date,
                        status varchar(50) NOT null
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "Applications table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating Applications table: " . mysqli_error($conn);

    }

//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS enrollment (
        enrollmentid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        studentID int(13) not null,
                        courseiD int(13) not null,
                        dateenrolled date,
                        FOREIGN KEY (studentID) REFERENCES users(userid),
                        FOREIGN KEY (courseiD) REFERENCES courses(courseiD)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "enrollment table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating enrollment table: " . mysqli_error($conn);

    }

//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS courseinstructor (
        instructionid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        instructorID int(13) not null,
                        courseiD int(13) not null,
                        FOREIGN KEY (instructorID) REFERENCES users(userid),
                        FOREIGN KEY (courseiD) REFERENCES courses(courseiD)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "courseinstructor table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating courseinstructor table: " . mysqli_error($conn);

    }

//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS lessons (
        lessonid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        courseiD int(13) not null,
                        lessonname varchar(100) not null,
                        lessontype varchar(100),
                        description varchar(300) not null,
                        audiodemo varchar(101),
                        visualdemo varchar(101),
                        assignment varchar(200),
                        assignmentdemo varchar(101),
                        FOREIGN KEY (courseiD) REFERENCES courses(courseiD)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "lessons table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating lessons table: " . mysqli_error($conn);

    }


//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS assignmentsubmissions (
        submissionid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        lessoniD int(13) not null,
                        studentiD int(13) not null,
                        subfile varchar(501) not null,
                        subcontent varchar(1000),
                        dos date,
                        assignmentdemo varchar(101),
                        FOREIGN KEY (studentiD) REFERENCES users(useriD),
                        FOREIGN KEY (lessoniD) REFERENCES lessons(lessoniD)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "assignmentsubmissions table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating assignmentsubmissions table: " . mysqli_error($conn);

    }

//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS assignmentsubmissions (
        submissionid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        lessoniD int(13) not null,
                        studentiD int(13) not null,
                        subfile varchar(101) not null,
                        subcontent varchar(300),
                        dos date,
                        assignmentdemo varchar(101),
                        FOREIGN KEY (studentiD) REFERENCES users(useriD),
                        FOREIGN KEY (lessoniD) REFERENCES lessons(lessonsiD)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "assignmentsubmissions table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating assignmentsubmissions table: " . mysqli_error($conn);

    }


//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS songlyrics (
        lyricid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        studentiD int(13) not null,
                        title varchar(200),
                        type varchar(200),
                        lyrics varchar(5000),
                        textformat varchar(2000),
                        datecreated date,
                        FOREIGN KEY (studentiD) REFERENCES users(useriD)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "songlyrics table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating songlyrics table: " . mysqli_error($conn);

    }
    $sql= "CREATE TABLE IF NOT EXISTS songrevisions (
        revisionid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        lyricid int(13),
                        revisor int(13),
                        title varchar(200),
                        type varchar(200),
                        lyrics varchar(5000),
                        textformat varchar(2000),
                        datecreated date,
                        FOREIGN KEY (revisor) REFERENCES users(useriD),
                        FOREIGN KEY (lyricid) REFERENCES songlyrics(lyricid)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "revisions table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating songlyrics table: " . mysqli_error($conn);

    }
    die();


//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS feedback (
        feedbackid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        submissioniD int(13) not null,
                        lessoniD int(13) not null,
                        studentiD int(13) not null,
                        comment varchar(2000),
                        grade int(2),
                        datecreated date,
                        FOREIGN KEY (submissioniD) REFERENCES assignmentsubmissions(submissioniD)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "feedback table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating feedback table: " . mysqli_error($conn);

    }

//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS studentvocalranges (
        recordid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        studentiD int(13) not null,
                        lowestnote varchar(13) not null,
                        highestnote varchar(13) not null,
                        rangeclass varchar(13) not null,
                        daterecorded date,
                        FOREIGN KEY (studentiD) REFERENCES users(userid)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "studentvocalranges table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating studentvocalranges table: " . mysqli_error($conn);

    }

//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS collaborations (
        collabid int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        lyriciD int(13) not null,
                        songowner int(13) not null,
                        datecreated date,
                        FOREIGN KEY (lyriciD) REFERENCES songlyrics(lyricid)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "collaborations table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating collaborations table: " . mysqli_error($conn);

    }


//////////////////////////////CREATING USERS TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS collabmembers (
        id int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        collabiD int(13) not null,
                        studentid int(13) not null,
                        FOREIGN KEY (studentiD) REFERENCES users(userid)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "collabmembers table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating collabmembers table: " . mysqli_error($conn);

    }


        //////////////////////////////CREATING NOTIFICATIONS TABLE//////////////////////////////////////
                    
    $sql= "CREATE TABLE IF NOT EXISTS NOTIFICATIONS (
                            notificationID int(13) not null AUTO_INCREMENT PRIMARY KEY,
                            userID int(13) not null,
                            message varchar(500) NOT null,
                            status varchar(10) NOT null,
                            notificationdate date,
                            FOREIGN KEY (userid) REFERENCES users(userid)
                            );";

    if (mysqli_query($conn, $sql))
    {
        //echo'<script>alert("CYCLES table created successfully")</script>';
        echo "NOTIFICATIONS table created successfully"."<br/>";
    }
    else
    {
        $string="Error creating NOTIFICATIONS table: " . mysqli_error($conn);
        //echo'<script>alert("'.$string.'")</script>';
        //die();
        echo $string;
    }

//////////////////////////////CREATING COurses TABLE//////////////////////////////////////

    $sql= "CREATE TABLE IF NOT EXISTS STUDENTLESSONS (
        id int(13) not null AUTO_INCREMENT PRIMARY KEY,
                        studentid int(13) NOT null,
                        courseid int(13) NOT null,
                        lessonid int(13) NOT null,
                        status varchar(20),
                        FOREIGN KEY (studentID) REFERENCES users(userid),
                         FOREIGN KEY (courseID) REFERENCES courses(courseid),
                         FOREIGN KEY (lessonID) REFERENCES lessons(lessonid)
                        );";

    if (mysqli_query($conn, $sql))
    {
    //echo'<script>alert("USERS table created successfully")</script>';
        echo "COurses table created successfully"."<br/>";
    }
    else
    {
        echo"Error creating COurses table: " . mysqli_error($conn);

    }

//////////////////////////////INSERTING MASTER USER IN USERS TABLE//////////////////////////////////////

date_default_timezone_set('America/New_York');

$d=date("y-m-d");
$salt= Hash::salt(32);
$pwd=Hash::make("manager", $salt);
                                //$pwd=password_hash($pwd, PASSWORD_DEFAULT);
$sql = "INSERT INTO Users (firstname, lastname, email, username, usertype, password, salt, joined, verified, locked, attempts)
VALUES ('Kelvin', 'Msiska', 'manager@atelis.com', 'manager', 'Manager', '$pwd', '123', '$d', '1', '0', '0');";

if (mysqli_query($conn, $sql))
{
    //echo "<script>alert('New record in Users created successfully')</script>";
    echo "Manager record in Users created successfully"."<br/>";
    $conn =  mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    

                                //echo "<script>window.open('home.php','_self')</script>";
}
else 
{

    //echo "<script>alert('Database Failure')</script>";
    echo("Error: " . $sql . "<br>" . mysqli_error($conn));
}

$pwd=Hash::make("student", $salt);
                                //$pwd=password_hash($pwd, PASSWORD_DEFAULT);
$sql = "INSERT INTO Users (firstname, lastname, email, username, usertype, password, salt, joined, verified, locked, attempts)
VALUES ('John', 'Doe', 'student@atelis.com', 'student', 'Student', '$pwd', '123', '$d', '1', '0', '0');";

if (mysqli_query($conn, $sql))
{
    //echo "<script>alert('New record in Users created successfully')</script>";
    echo "student record in Users created successfully"."<br/>";
    $conn =  mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    

                                //echo "<script>window.open('home.php','_self')</script>";
}
else 
{

    //echo "<script>alert('Database Failure')</script>";
    echo("Error: " . $sql . "<br>" . mysqli_error($conn));
}

$pwd=Hash::make("student1", $salt);
                                //$pwd=password_hash($pwd, PASSWORD_DEFAULT);
$sql = "INSERT INTO Users (firstname, lastname, email, username, usertype, password, salt, joined, verified, locked, attempts)
VALUES ('John', 'Doe', 'student1@atelis.com', 'student1', 'Student', '$pwd', '123', '$d', '1', '0', '0');";

if (mysqli_query($conn, $sql))
{
    //echo "<script>alert('New record in Users created successfully')</script>";
    echo "student1 record in Users created successfully"."<br/>";
    $conn =  mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    

                                //echo "<script>window.open('home.php','_self')</script>";
}
else 
{

    //echo "<script>alert('Database Failure')</script>";
    echo("Error: " . $sql . "<br>" . mysqli_error($conn));
}


$pwd=Hash::make("instructor", $salt);
                                //$pwd=password_hash($pwd, PASSWORD_DEFAULT);
$sql = "INSERT INTO Users (firstname, lastname, email, username, usertype, password, salt, joined, verified, locked, attempts)
VALUES ('Linda', 'Hewwit', 'instructor@atelis.com', 'instructor', 'Instructor', '$pwd', '123', '$d', '1', '0', '0');";

if (mysqli_query($conn, $sql))
{
    //echo "<script>alert('New record in Users created successfully')</script>";
    echo "INstructor record in Users created successfully"."<br/>";
    $conn =  mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    

                                //echo "<script>window.open('home.php','_self')</script>";
}
else 
{

    //echo "<script>alert('Database Failure')</script>";
    echo("Error: " . $sql . "<br>" . mysqli_error($conn));
}




//////////////////////////////CREATING ADMIN ACCOUNT//////////////////////////////////////
        try
        {
            $db=database::getInstance();

            $fields=array(
            'coursename'      => 'Singing'
          );

            if (!$db->insert('courses', $fields)) 
            {
                throw new Exception("Singing err");
            }
            else
            {
                
            }

        }
        catch(Exception $e)
        {

          die($e->getMessage());
        }
                try
        {
            $db=database::getInstance();

            $fields=array(
            'coursename'      => 'Guitar'
          );

            if (!$db->insert('courses', $fields)) 
            {
                throw new Exception("Guitar err");
            }
            else
            {
                
            }

        }
        catch(Exception $e)
        {

          die($e->getMessage());
        }
                try
        {
            $db=database::getInstance();

            $fields=array(
            'coursename'      => 'Songwriting'
          );

            if (!$db->insert('courses', $fields)) 
            {
                throw new Exception("songwriting err");
            }
            else
            {
                
            }

        }
        catch(Exception $e)
        {

          die($e->getMessage());
        }

//////////////////////////////CREATING CUSTOMER ACCOUNT//////////////////////////////////////
        try
        {
            for ($i=1; $i < 11; $i++) 
            { 
                $db=database::getInstance();

                $auddemolink = mysqli_escape_string($conn, urlencode('assets/aud/singing'.$i.'.mp3') ); 
                //$kaya=urldecode($auddemolink);
                //print_r($kaya);
                $visdemolink = mysqli_real_escape_string($conn, urlencode('assets/vid/singing'.$i.'.mp4') ); 
                $assdemolink = mysqli_real_escape_string($conn, urlencode('assets/aud/singing'.$i.'ass.mp3') ); 

                $fields=array(
                'courseid'      => '1',
                'lessonname'        => 'TENOR LESSON '.$i,
                'lessontype'            => 'Tenor',
                'description'     => 'This is a tenor lesson',
                'audiodemo'        => $auddemolink,
                'assignment'        => 'Record yourself attempting what you have learnt from this lesson as done in the audio demonstration below.',
                'assignmentdemo'        => $assdemolink,
                'visualdemo'    => $visdemolink
                );

                if (!$db->insert('lessons', $fields)) 
                {
                    throw new Exception("lessons1 err");
                }
                else
                {
                
                }

            }
        }
        catch(Exception $e)
        {

          die($e->getMessage());
        }



//////////////////////////////CREATING CUSTOMER ACCOUNT//////////////////////////////////////
        try
        {
            for ($i=1; $i < 11; $i++) 
            { 
                $db=database::getInstance();

                $auddemolink = mysqli_escape_string($conn, urlencode('assets/aud/guitar'.$i.'.mp3') ); 
                //$kaya=urldecode($auddemolink);
                //print_r($kaya);
                $visdemolink = mysqli_real_escape_string($conn, urlencode('assets/vid/guitar'.$i.'.mp4') ); 
                $assdemolink = mysqli_real_escape_string($conn, urlencode('assets/aud/guitar'.$i.'ass.mp3') ); 

                $fields=array(
                'courseid'      => '2',
                'lessonname'        => 'GUITAR LESSON '.$i,
                'lessontype'            => 'Guitar',
                'description'     => 'This is a beginner guitar lesson',
                'audiodemo'        => $auddemolink,
                'assignment'        => 'Record yourself attempting what you have learnt from this lesson as done in the audio demonstration below.',
                'assignmentdemo'        => $assdemolink,
                'visualdemo'    => $visdemolink
                );

                if (!$db->insert('lessons', $fields)) 
                {
                    throw new Exception("guitar lessons err");
                }
                else
                {
                
                }

            }
        }
        catch(Exception $e)
        {

          die($e->getMessage());
        }




//////////////////////////////CREATING CUSTOMER ACCOUNT//////////////////////////////////////
        try
        {
            for ($i=1; $i < 11; $i++) 
            { 
                $db=database::getInstance();

                $auddemolink = mysqli_escape_string($conn, urlencode('assets/aud/songwriting'.$i.'.mp3') ); 
                //$kaya=urldecode($auddemolink);
                //print_r($kaya);
                $visdemolink = mysqli_real_escape_string($conn, urlencode('assets/vid/songwriting'.$i.'.mp4') ); 
                $assdemolink = mysqli_real_escape_string($conn, urlencode('assets/aud/songwriting'.$i.'ass.mp3') ); 

                $fields=array(
                'courseid'      => '3',
                'lessonname'        => 'SONGWRITING LESSON '.$i,
                'lessontype'            => 'Songwriting',
                'description'     => 'This is a songwriting lesson',
                'audiodemo'        => $auddemolink,
                'assignment'        => 'Write a song based on what you have learnt then submit.',
                'assignmentdemo'        => $assdemolink,
                'visualdemo'    => $visdemolink
                );

                if (!$db->insert('lessons', $fields)) 
                {
                    throw new Exception("songwriting");
                }
                else
                {
                
                }

            }
        }
        catch(Exception $e)
        {

          die($e->getMessage());
        }




        
//////////////////////////////CREATING AGENT ACCOUNT//////////////////////////////////////
       

     /*$sql = "INSERT INTO `00183150_e_cycledb`.`faq` (`question`, `answer`) VALUES ('What is An E-cycle?', 'It is a bicycle with an electric mechanism to help with pedaling.'), ('What is your goal?', 'To provide the highest quality bikes for a cheap price.');";

        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);*/




?>

<script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script src="js/custom.js"></script>
  <!-- Main Javascript -->
  <script src="js/main.js"></script>
  <!-- Toast Notification -->
  <script src="toastr/toastr.min.js"></script>
</body>
</html>