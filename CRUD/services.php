<?php
	require '../database/mysql.php';
    include('../functions/session.php');
    $timestamp = date("YmdHis");
    if(!isset($_SESSION['login_user'])){
        header("location: ../login.php"); // Redirecting To Home Page
    }else if($type_session === 'user') {
        header("location: ../index.php");
    }
    $query = "SELECT * from services";
    $result = $conn->query($query);
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
            <li><a href="../admin/index.php">Dashboard</a></li>
            <li class="active"><a href="services.php">Services</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="users.php">Users</a></li>
        </ul>
    </div>
    <div id="mainContent">
            <table id="servicesTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created Date</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                    <?php while($row = $result->fetch_assoc()) { ?>
                        <tr>   
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo '<img src="' . $row['photo']. '"/>' ?></td>
                            <td><?php echo $row['created_date']; ?></td>

                            <td><a href="edit_services.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                            <td><a href="delete_services.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br><br>
            <a class="btnAdd" href="add_services.php">Add a new service</a>
    </div>
</body>
</html>