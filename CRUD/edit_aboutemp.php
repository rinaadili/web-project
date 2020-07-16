<?php 
	require '../database/mysql.php';
    include('../functions/session.php');
    $timestamp = date("YmdHis");
    if(!isset($_SESSION['login_user'])){
        header("location: ../login.php"); // Redirecting To Home Page
    }else if($type_session === 'user') {
        header("location: ../index.php");
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $errTitle = $errDescription = $errPhoto = $errName = "";

    $query = "SELECT * from aboutusemp where id=?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($id,$name,$title,$description,$photo);
    $stmt->store_result();
    $user = $stmt->fetch();
    if(isset($_POST['submit'])){
        $name2 = $_POST['name'];
        $name2 = mysqli_real_escape_string($conn, $name2);
        $title2 = $_POST['title'];
        $title2 = mysqli_real_escape_string($conn, $title2);
        $description2 = $_POST['description'];
        $description2 = mysqli_real_escape_string($conn, $description2);
        if (empty($name2)) {
            $errName = "Name is required!";
        }
        if(empty($title2)) {
            $errTitle = "Title is required!";
        }
        if (empty($description2)) {
            $errDescription = "Description is required!";
        }

        if(!empty($title2) && !empty($description2) && !empty($name2)){

        if ($_FILES['fileToUpload']['name'] != '') {
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
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $errPhoto = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $photo2 = $target_file;
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $photo2 = $photo;
        }

         
            $sql = "UPDATE aboutusemp SET name = '$name2', title = '$title2', description = '$description2', photo = '$photo2' WHERE id = '$id'";
            if($conn->query($sql) === TRUE) {
                header('Location: about.php');
            }
            else {
                echo "Error"; sql . "<br>" ;
            }
}  
}
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
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
        <form id="editAboutEmp" method="post" id="editServices" enctype="multipart/form-data" onsubmit ="return validate()">
            <label>Name:</label><br>
            <input type="text" name="name" value="<?php echo $name ?>" placeholder="Enter name"><br>
            <span id="namespan" class="error"><?php echo $errName; ?></span>
            <label>Title:</label><br>
            <input type="text" name="title" value="<?php echo $title ?>" placeholder="Enter title"><br>
            <span id="titlespan" class="error"><?php echo $errTitle; ?></span>
            <label>Description:</label><br>
            <textarea name="description" id="text" placeholder="Type your description..."><?php echo $description; ?></textarea><br>
            <span id="descspan" class="error"><?php echo $errDescription; ?></span>
            <label>Photo:</label><br>
            <input type="file" name="fileToUpload" accept="image/*" id="photo"><br>
            <span id="photospan" class="error"><?php echo $errPhoto; ?></span>
            <input type="submit" name="submit" value="Submit" class="btnedit"> 
        </form>
    </div>
    <script type="text/javascript">       
        function validate(){
            var fname = document.forms["editAboutEmp"]["name"].value;
            var ftitle = document.forms["editAboutEmp"]["title"].value;
            var fdescription = document.forms["editAboutEmp"]["description"].value;    
            var fileToUpload = document.forms["editAboutEmp"]["fileToUpload"].value;


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

            return check;
        }
</script>
</body>
</html>