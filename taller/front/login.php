<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Taller</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">SCA</h1>

            </div>
            <h3>Bienvenido</h3>
         
            <form role="form" method="post" action="../back/controller/persona/PersonaLogin.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="documento" name="documento" placeholder="Cedula" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Iniciar Sesion</button>

               
            </form>
          
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>



</html>
