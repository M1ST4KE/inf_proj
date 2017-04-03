<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
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
    <script src="js/main.js"></script>
</head>
<?php
session_start();
if (!isset($_SESSION['logged']) && $_SESSION['logged'] == false) {
    header("Location: index.php");
    exit();

}
?>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="session.php"><?php echo($_SESSION['username']); ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right" role="form" method="POST">
                <a class="btn btn-primary" href="php/logout.php" role="button">Wyloguj się</a>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>


<div class="container">
    <?php if (isset($_GET['err']) && $_GET['err'] == 1) { ?>
        <div class="alert alert-danger" role="alert"> Usunięcie użytkownika nie powiodło się -<br>brak wystarczających
            uprawnień.
        </div>
    <?php } ?>
    <?php if (isset($_GET['err']) && $_GET['err'] == 2) { ?>
        <div class="alert alert-danger" role="alert"> Edycja danych użytkownika nie powiodła się -<br>brak
            wystarczających uprawnień.
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-12">
            <table class="table-striped">
                <tbody>
                <tr>
                    <th id="tekstLeft">ID</th>
                    <th id="tekstLeft">Login</th>
                    <th id="tekstLeft">Mail</th>
                    <th id="tekstLeft">Hasło</th>
                    <th id="tekstLeft">Przyw.</th>
                    <th id="tekstLeft">Data dodania</th>
                    <th>Edytuj</th>
                    <th>Usuń</th>
                </tr>
                <?php
                require('php/connect.php');

                $sql = "SELECT * FROM `user` ";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['prev_lvl'] . "</td>";
                        echo "<td>" . $row['reg_date'] . "</td>";
                        $lol = $row['id'];
                        echo "<td id='przycEd'><a class='btn btn-warning' href='php/edit.php?id=$lol'>Edytuj</a></td>"; //edit
                        echo "<td id='przycEd'><a class='btn btn-danger' href='php/delete.php?id=$lol'>Usuń</a></td>";  //del
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td>0 results</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p> &copy; Kamil Owczarz 2017</p>
    </footer>
</div> <!-- /container -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>