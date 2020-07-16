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

    $errSubtext = $errText = $errTeamText = "";

    $query = "SELECT * from aboutustext where id=?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($id,$subtext,$text,$teamText);
    $stmt->store_result();
    $user = $stmt->fetch();

        if(isset($_POST['submit'])){
        $subtext2 = $_POST['subtext'];
        $subtext2 = mysqli_real_escape_string($conn, $subtext2);
        $text2 = $_POST['text'];
        $text2 = mysqli_real_escape_string($conn, $text2);
        $teamText2 = $_POST['teamText'];
        $teamText2 = mysqli_real_escape_string($conn, $teamText2);

        if(empty($subtext2)) {
            $errSubtext = "Subtext is required!";
        }
        if (empty($text2)) {
            $errText = "Text is required!";
        }
        if (empty($teamText2)) {
            $errTeamText = "Team text is required!";
        }
        if(!empty($subtext2) && !empty($text2) && !empty($teamText2)) {
            $sql = "UPDATE aboutustext SET subtext = '$subtext2', text = '$text2', teamText = '$teamText2' WHERE id = '$id' ";
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
	<title>Edit</title>
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
        <form id="editAboutText" method="post" id="editAboutText" enctype="multipart/form-data" onsubmit ="return validate()">           
            <label class="lab">Subtext:</label><br>
            <div id="subarea">
                <textarea name="subtext" id="subtext"><?php echo $subtext; ?></textarea>
            </div>
            <span id="subtextspan" class="error"><?php echo $errSubtext; ?></span>
            <label class="lab">Text:</label>
            <div id="textdivarea">
			     <textarea name="text" id="text"><?php echo $text; ?></textarea>
            </div>
            <span id="textspan" class="error"><?php echo $errText; ?></span>
            <label class="lab">Team text:</label>
            <div id="teamtextarea">
			     <textarea name="teamText" id="teamText"><?php echo $teamText; ?></textarea>
            </div>
            <span id="teamtextspan" class="error"><?php echo $errTeamText; ?></span>
            <input type="submit" name="submit" value="Submit" class="btnedit">
        </form>
    </div>
     <script type="text/javascript">
        function validate(){
            var subtext = document.forms["editAboutText"]["subtext"].value;
            var text = document.forms["editAboutText"]["text"].value;    
            var teamtext = document.forms["editAboutText"]["teamText"].value;

            var check = true;
            if (subtext == "") {
                document.getElementById("subtextspan").innerHTML = "Subtext is required!";
                check = false;
            }else {
                document.getElementById("subtextspan").innerHTML = "";
            }
            if (text == "") {
                document.getElementById("textspan").innerHTML = "Text is required!";
                check = false;
            }else {
                document.getElementById("textspan").innerHTML = "";
            }
            if (teamtext == "") {
                document.getElementById("teamtextspan").innerHTML = "Team text is required!";
                check = false;
            }else {
                document.getElementById("teamtextspan").innerHTML = "";
            }
            return check;
        }
</script>
</body>
</html>

