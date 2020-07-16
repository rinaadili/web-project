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

    $errName = $errSurname = $errEmail = $errPassword = $errType = "";

    $query = "SELECT * from user where id=?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($id,$name,$surname,$email,$password,$type);
    $stmt->store_result();
    $user = $stmt->fetch();
    if(isset($_POST['submit'])){
        $name2 = $_POST['name'];
        $name2 = mysqli_real_escape_string($conn, $name2);
        $surname2 = $_POST['surname'];
        $surname2 = mysqli_real_escape_string($conn, $surname2);
        $email2 = $_POST['email'];
        $email2 = mysqli_real_escape_string($conn, $email2);
        $password2 = $_POST['password'];
        $hashed_password = password_hash($password2,PASSWORD_DEFAULT);
        $type2 = $_POST['type'];
        $type2 = mysqli_real_escape_string($conn, $type2);

        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        $nameTest = test_input($name2);
        $surnameTest = test_input($surname2);
        $emailTest = test_input($email2);

        if(empty($name2)) {
             $errName = "First name is required!";
        }
        if (empty($surname2)) {
            $errSurname = "Last name is required!";
        }
        if (empty($email2)) {
            $errEmail = "Email is required!";
        }
        if (empty($type2)) {
            $errType = "Type is required!";
        }
        if(!filter_var($email2, FILTER_VALIDATE_EMAIL)){
            $errEmail = "Email is not valid!";
        }
        if(!preg_match("/^[a-zA-Z ]*$/",$nameTest)){
            $errName = "Name can contain only letters!";
        }

        if(!filter_var($emailTest, FILTER_VALIDATE_EMAIL)){
            $errEmail = "Email is not valid!";
        }

        if(empty($errName) && empty($errSurname) && empty($errEmail)&& empty($errPassword) && empty($errType)){
            if(!empty($password2)) {
                $sql = "UPDATE user SET name = '$name2', surname = '$surname2', email = '$email2', password = 
                '$hashed_password', type = '$type2' WHERE id = '$id'";
            }else {
                $sql = "UPDATE user SET name = '$name2', surname = '$surname2', email = '$email2', type = '$type2' WHERE id = '$id'";
            }
            if($conn->query($sql) === TRUE) {
                header('Location: users.php');
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
    <title>Users</title>
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
            <li><a href="#"> Dashboard</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="about.php">About us</a></li>
            <li class="active"><a href="users.php">Users</a></li>
        </ul>
    </div>
    <div id="mainContent">
        <form id="editUsers" method="post" id="editServices" enctype="multipart/form-data" onsubmit ="return validate()">
            <label>First Name:</label><br>
            <input type="text" name="name" value="<?php echo $name ?>" placeholder="Enter name" id="name"><br>
            <span id="namespan" class="error"><?php echo $errName; ?></span>
            <label>Last Name:</label><br>
            <input type="text" name="surname" value="<?php echo $surname ?>" placeholder="Enter last name" id="surname"><br>
            <span id="surnamespan" class="error"><?php echo $errSurname; ?></span>
            <label>Email:</label><br>
            <input type="email" name="email" id="email" placeholder="Enter email" value="<?php echo $email ?>"><br>
            <span id="emailspan" class="error"><?php echo $errEmail; ?></span>
            <label>Password:</label><br>
            <input type="password" name="password" id="password" placeholder="Enter password"></textarea><br>
            <span id="passwordspan" class="error"><?php echo $errPassword; ?></span>      
            <label>Type:</label><br>
            <input type="radio" name="type" value="admin" id="admin"> Admin<br>
            <input type="radio" name="type" value="user" id="user" checked> User<br>
            <span id="typespan" class="error"><?php echo $errType; ?></span>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    <script type="text/javascript">
        
        function validate(){
            var fname = document.forms["editUsers"]["name"].value;
            var fsurname = document.forms["editUsers"]["surname"].value;    
            var femail = document.forms["editUsers"]["email"].value;

            var check = true;
            if (fname == "") {
                document.getElementById("namespan").innerHTML = "Name is required!";
                check = false;
            }else {
                document.getElementById("namespan").innerHTML = "";
            }
            if (fsurname == "") {
                document.getElementById("surnamespan").innerHTML = "Surname is required!";
                check = false;
            }else {
                document.getElementById("surnamespan").innerHTML = "";
            }
            if (femail == "") {
                document.getElementById("emailspan").innerHTML = "Email is required!";
                check = false;
            }else {
                document.getElementById("emailspan").innerHTML = "";
            }

            var user = document.getElementById("user").checked;
            var admin = document.getElementById("admin").checked;
            if(user==false && admin==false){
                document.getElementById("typespan").innerHTML = "Type is required!";
                check = false;
            }else{
                document.getElementById("admin").innerHTML = "";
            }

            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            if(re.test(femail)==false && femail != ""){
                document.getElementById("emailspan").innerHTML = "Email is not valid!";
                check = false;
            }

            return check;
        }
</script>
</body>
</html>