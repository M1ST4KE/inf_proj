<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[favicons]-->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="img/favicons/manifest.json">
    <link rel="mask-icon" href="img/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <!--[favicons end]-->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Kamil Owczarz</a>

        </div>
    </div>
</nav>

<?php
require('connect.php');
// If the values are posted, insert them into the database.
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $smsg = "Rejestracja zakończona powodzeniem";
    } else {
        $fmsg = "Rejestracja zakończona niepowodzeniem";
    }
}
?>

<div id="container">
    <div id="login">
        <div id="loginForm">
            <form class="form-signin" method="POST">
                <?php if (isset($smsg)) { ?>
                    <div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                <?php if (isset($fmsg)) { ?>
                    <div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
                <h2 class="form-signin-heading">Please Register</h2>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input type="text" name="username" class="form-control" placeholder="Nazwa użytkownika" required>
                </div>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Adres email" required
                       autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Podaj hasło"
                       required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; Kamil Owczarz 2017</p>
    </footer>

</div> <!-- end of container-->
</body>
</html>