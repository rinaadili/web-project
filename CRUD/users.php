<?php
	require '../database/mysql.php';
    include('../functions/session.php');
    $timestamp = date("YmdHis");
    if(!isset($_SESSION['login_user'])){
        header("location: ../login.php"); // Redirecting To Home Page
    }else if($type_session === 'user') {
        header("location: ../index.php");
    }
    $query = "SELECT * from user";
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
            <li><a href="services.php">Services</a></li>
            <li><a href="about.php">About us</a></li>
            <li class="active"><a href="users.php">Users</a></li>

        </ul>
    </div>
    <div id="mainContent">
            <table id="servicesTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Type</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                    <?php while($row = $result->fetch_assoc()) { ?>
                        <tr>   
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['surname']; ?></td>
                             <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                             <td><?php echo $row['type']; ?></td>

                            <td><a href="edit_users.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                            <td><a href="delete_users.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br><br>
    </div>
</body>
</html>