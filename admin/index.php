<?php

session_start();
include_once('../includes/connection.php');

    #checks if user is loged in
if (isset($_SESSION['logged_in'])) {
    # display index
}else {
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password =md5($_POST['password']);
        
        # check if the user has typed aanything in the fields
        if (empty($username) or empty($password)) {
            $error = 'All fields are requiered';
        } else {
            $query = $pdo->prepare("SELECT * FROM users WHERE user_names = ? AND user_password = ?");

            $query->bindValue(1, $username);
            $query->bindValue(2, $password);

            $query->execute();

            $num = $query->rowCount();

            if ($num == 1) {
                # user entered corect details
                $_SESSION['logged_in']= true;

                header('Location: index.php');
                exit();
            } else{
                # user entered false details
                $error= 'Incorrect details!';
            }
        }
    }

    ?>

<html>
	<head>
		<title>CMS Tutorial</title>
		<link rel="stylesheet" href="../assets/style.css" /> 
	</head>
	<body>
		<div class="container">
            <a href="index.php" id="logo">CMS</a>

            <br><br>

            <?php if (isset($error)) { ?>
                <small style="color:#aa0000;"><?php echo $error;?></small>
                <br><br>
            <?php } ?>

            <form action="index.php" method="post" autocomplete="off">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Login">
            </form>
		</div>
	</body>
</html>

    <?php
}
?>