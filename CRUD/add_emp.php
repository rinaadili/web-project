<?php
    require '../database/mysql.php';
    include('../functions/session.php');
    $timestamp = date("YmdHis");
    if(!isset($_SESSION['login_user'])){
        header("location: ../login.php"); // Redirecting To Home Page
    }else if($type_session === 'user') {
        header("location: ../index.php");
    }
    $errTitle = $errDescription = $errPhoto = $errName = "";
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $name = mysqli_real_escape_string($conn, $name);
        $title = $_POST['title'];
        $title = mysqli_real_escape_string($conn, $title);
        $description = $_POST['description'];
        $description = mysqli_real_escape_string($conn, $description);

        if(empty($title)) {
            $errTitle = "Title is required!";
        }
        if (empty($description)) {
            $errDescription = "Description is required!";
        }
        if (empty($name)) {
            $errName = "Name is required!";
        }
        if (empty($_FILES["fileToUpload"]["name"])) {
            $errPhoto = "Picture is required!";
        }
        
        if(!empty($title) && !empty($description) && !empty($name) && !empty($_FILES["fileToUpload"]["name"])) {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $errPhoto = "File is not an image.";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $errPhoto = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $query = "INSERT INTO aboutusemp VALUES ('','$name','$title','$description','$target_file')";
                if($conn->query($query) === TRUE) {
                    header('Location: about.php');
                }
                else {
                    echo "Error"; sql . "<br>" ;
                }
            } else {
                $errPhoto = "Sorry, there was an error uploading your photo.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin panel</title>
    <link href="../css/style.css?v=<?php echo $timestamp;?>" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="topbar">
        <a href="#"><img src="../images/logo.png"></a>
        <p><a href="../functions/logout.php">Log Out</a></p>
        <p>Welcome: <?php echo $login_session; ?></p>
    </div>
    <div id="sidebar">
        <ul>
            <li><a href="../adminpanel.php">Dashboard</a></li>
            <li><a href="services.php">Services</a></li>
            <li class="active"><a href="about.php">About us</a></li>
            <li><a href="users.php">Users</a></li>
        </ul>
    </div>
    <div id="mainContent">
        <form name="addEmp" method="post" id="editServices"  enctype="multipart/form-data" onsubmit ="return validate()">
            <label>Name:</label><br>
            <input type="text" name="name" placeholder="Enter name" id="name"><br>
            <span id="namespan" class="error"><?php echo $errName; ?></span>
            <label>Title:</label><br>
            <input type="text" name="title" placeholder="Enter title" id="title"><br>
            <span id="titlespan" class="error"><?php echo $errTitle; ?></span>
            <label>Description:</label><br>
            <textarea name="description" id="text" placeholder="Type your description..."></textarea><br>
            <span id="descspan" class="error"><?php echo $errDescription; ?></span>
            <label>Photo:</label><br>
            <input type="file" name="fileToUpload" accept="image/*" id="photo"><br>
            <span id="photospan" class="error"><?php echo $errPhoto; ?></span>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <script type="text/javascript">
        
        function validate(){
            var fname = document.forms["addEmp"]["name"].value;
            var ftitle = document.forms["addEmp"]["title"].value;
            var fdescription = document.forms["addEmp"]["description"].value;    
            var fileToUpload = document.forms["addEmp"]["fileToUpload"].value;

            var check = true;
            if (fname == "") {
                document.getElementById("namespan").innerHTML = "Name is required!";
                check = false;
            }else {
                document.getElementById("namespan").innerHTML = "";
            }
            if (ftitle == "") {
                document.getElementById("titlespan").innerHTML = "Title is required!";
                check = false;
            }else {
                document.getElementById("titlespan").innerHTML = "";
            }
            if (fdescription == "") {
                document.getElementById("descspan").innerHTML = "Description is required!";
                check = false;
            }else {
                document.getElementById("descspan").innerHTML = "";
            }
            if (fileToUpload == "") {
                document.getElementById("photospan").innerHTML = "Picture is required!";
                check = false;
            }else {
                document.getElementById("photospan").innerHTML = "";
            }
            if (fcreated_date == "") {
                document.getElementById("datespan").innerHTML = "Date is required!";
                check = false;
            }else {
                document.getElementById("datespan").innerHTML = "";
            }
            return check;
        }
</script>
</body>
</html>    