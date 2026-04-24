<?php
session_start();
$msg_error='';
if(isset($_SESSION['msg']))
{
    $msg_error=$_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css">
    <link rel="stylesheet" href="../css/form-style.css?v=<?php echo time(); ?>">
    <title>ASCMS Admin Login</title>
    <style>
        body.login-bg {
            background: var(--dark-green) !important;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-card {
            background: var(--white);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 450px;
            border-top: 6px solid var(--light-green);
        }
        .login-card h4 {
            color: var(--dark-green);
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 8px;
        }
        .login-card p {
            color: var(--text-light);
            margin-bottom: 30px;
            font-size: 1rem;
        }
        .login-card .input-field input:focus {
            border-bottom: 1px solid var(--light-green) !important;
            box-shadow: 0 1px 0 0 var(--light-green) !important;
        }
        .login-card .input-field input:focus + label {
            color: var(--light-green) !important;
        }
        .login-btn {
            background-color: var(--dark-green) !important;
            height: 54px;
            line-height: 54px;
            font-size: 1.1rem;
            width: 100%;
            margin-top: 10px;
            border-radius: 8px !important;
            text-transform: none !important;
            font-weight: 600 !important;
        }
        .login-btn:hover {
            background-color: var(--mid-green) !important;
        }
    </style>
</head>
<body class="login-bg">

    <div class="login-card animate-up">
        <form action="login-admin.php" method="post">
            <div class="center-align">
                <i class="material-icons large" style="color: var(--dark-green); margin-bottom: 10px;">agriculture</i>
                <h4>ASCMS Admin</h4>
                <p>Supply Chain Management System</p>
            </div>

            <?php
                if(!empty($msg_error)){
                    echo '<div class="card-panel red lighten-4 red-text text-darken-4" style="border-radius: 8px; box-shadow: none; border: 1px solid #ffcdd2; margin-bottom: 25px;">
                                <i class="material-icons left tiny">error</i> <b>'.$msg_error.'</b>
                            </div>';
                }
            ?>

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">email</i>
                    <input name="email" id="email" type="email" class="validate" required>
                    <label for="email">Email Address</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" name="password" type="password" class="validate" required>
                    <label for="password">Password</label>
                </div>
            </div>

            <div class="row" style="margin-top: 10px;">
                <div class="col s12">
                    <button type="submit" class="btn login-btn waves-effect waves-light">
                        Sign In
                    </button>
                </div>
            </div>
            
            <div class="center-align" style="margin-top: 25px;">
                <a href="../" style="color: var(--text-light); display: flex; align-items: center; justify-content: center; transition: 0.3s;" onmouseover="this.style.color='var(--mid-green)'" onmouseout="this.style.color='var(--text-light)'">
                    <i class="material-icons tiny" style="margin-right: 5px;">arrow_back</i> Back to Main Site
                </a>
            </div>

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>
</body>
</html>