<?php
	require '../database/mysql.php';
    include('../functions/session.php');
     $timestamp = date("YmdHis");
    if(!isset($_SESSION['login_user'])){
        header("location: ../login.php"); // Redirecting To Home Page
    }else if($type_session === 'user') {
        header("location: ../index.php");
    }
    $query = "SELECT * from aboutusemp";
    $result = $conn->query($query);
    $query2 = 'SELECT * from aboutustext';
    $result2 = $conn->query($query2);
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
 	 <?php while($row = $result2->fetch_assoc()) { ?>
     <div id="aboutusrina">
            <label class="lab">Subtext:</label>
            <div id="sub">
			 <p name="message" id="text"><?php echo $row['subtext']; ?></p>
            </div>
			
			<label class="lab">Text:</label>
            <div id="textdiv">
			 <p name="message" id="text"><?php echo $row['text'];?></p>
			</div>
			<label class="lab">Team text:</label>
            <div id="teamtext">
			 <p name="message" id="text"><?php echo $row['teamText']; ?></p>
			</div>
			<a href="edit_abouttext.php?id=<?php echo $row['id']; ?>" class="btnedit"> Edit</a>
        <?php } ?>
    </div>
    <br><br><br><br><br>
            <table id="servicesTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                    <?php while($row = $result->fetch_assoc()) { ?>
                        <tr>   
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo '<img src="' . $row['photo']. '"/>' ?></td>

                            <td><a href="edit_aboutemp.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                            <td><a href="delete_emp.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br><br>
            <a class="btnAdd" href="add_emp.php">Add a new employee</a>
    </div>
</body>
</html>