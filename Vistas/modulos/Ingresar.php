<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="#" />
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="plugins/sweet_alert2/sweetalert2.min.css">
</head>
<body>
    <div id="login">
        <br>
        <!-- <h2 class="text-center text-white display-5">Login SIGEDU</h2> -->
        <div class="container">                        
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                  
                    <div id="login-box" class="col-md-12  bg-light text-dark">
                        <form id="formLogin" class="form" action="" method="post">
                          <h2 class="text-center text-blak display-5">Login SIGEDU</h2>
                          <br>
                            <h4 class="text-center text-dark">Iniciar Sesión</h4>
                            <!-- <div class="form-group">
                                <label for="usuario" class="text-dark">Libreta</label><br>
                                <input type="text" name="libreta" id="usuario" class="form-control">
                            </div> -->
                            <div class="input-group mb-3">
                            <input type="text" name="libreta" id="usuario" class="form-control" placeholder="Usuario o Libreta">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-user"></span>
                                </div>
                            </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            </div>

                            <!-- <div class="form-group">
                                <label for="clave" class="text-dark">Clave</label><br>
                                <input type="password" name="clave" id="clave" class="form-control">
                            </div> -->
                            <div class="form-group text-center">                                
                                <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block" value="Conectar">
                            </div>
                                  <?php
                                     $ingreso = new UsuariosC();
                                     $ingreso -> IniciarSesionC();
                                   ?>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>