<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="./css/main.css" rel="stylesheet" type="text/css">
<body>
    <div id="login">
        <h3 class="cinetics">CINETICS</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h1 class="text-center text-info">BENVINGUT A CINETICS <?php echo $_SESSION["usuari"]; ?>!!!</h1>
                            <br><a href="./logout.php" class="tornar"><b>LOGOUT</b></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>