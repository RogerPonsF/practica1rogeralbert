<?php
    require('./bdUsuaris.php');
    $error=false;
    if($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        $nom=$_POST["username"];
        $clau=$_POST["contra"];
        $error=verificaUsuari($nom, $clau);

        if($error==false){
            
            $inicisessio=getdate();
            session_start();
            updatesessio($inicisessio,$nom);
            $_SESSION['usuari']=$nom;
            header("Location: main.php");
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="./css/login.css"
            rel="stylesheet" type="text/css">
            <script src="./java.js"></script>
        <!------ Include the above in your HEAD tag ---------->

    </head>
    <body>
        <div id="login">
            <h3 class="cinetics">CINETICS</h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <h3 class="text-center text-info">Login</h3>
                                        <?php
                                            if($error == TRUE){
                                            echo '<p class="error">Revisa l'. "'". 'adreça de correu i/o la contrasenya</p>';
                                                }
                                        ?>
                                <div class="form-group">
                                    <label for="username" class="text-info">Username:</label><br>
                                    <input type="text" name="username" id="username" class="form-control"  placeholder="user/mail" aria-describedby="sizing-addon1" required>
                                </div>
                                <label for="password" class="text-info">Password:</label>
                                <div class="input-group">
                                    <input ID="txtPassword" name="contra" type="password" Class="form-control" aria-describedby="sizing-addon1" required>
                                        <div class="input-group-append">
                                            <button id="show_password" class="btn btn-primary" type="button"  onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                                        </div>
                                </div>
                                <div class="form-group">
                                <br><input type="submit" name="submit" class="btn btn-info btn-md" value="Sign In"><br>
                                <a href="./home/home.php" class="text-info">Forgot Password?</a>
                                </div>
                                <div id="register-link" class="text-right">
                                    <a>Dont have an account?</a>
                                    <br><a href="./registrar/singup.php" class="text-info">Sign Up</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>