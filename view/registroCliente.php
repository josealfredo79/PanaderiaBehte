<?php
include '../controllers/controlRegistroUser.php';
?>
<?php 
include 'partials/header.php' 
?>
<nav class="navbar navbar-light" he  style="background-color: #EEEB2B">
        <a href="../index.php"><img id=logo1 src="../img/logo.png"></a>
</nav>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="POST" >
                    <fieldset>
                    <div align="right">
                       <a href="../index.php">Prefiero iniciar sesión</a> 
                    </div>
                     
                        <h3 align="center">Registro de usuarios</h3>

<hr>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Nombre:</label>
                                <input name="name" type="text"  placeholder="Emma" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Apellido paterno:</label>
                                <input name="aPaterno" type="text" placeholder="Harris" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Apellido materno:</label>
                                <input name="aMaterno" type="text"  placeholder="Scott" class="form-control">
                            </div>
                        </div>
                      <!--  <div class="form-group">
                            <div class="col-md-8">
                                <label>Nùmero de telefono:</label>
                                <input  name="phone" type="tel" placeholder="954 000 0000" class="form-control">
                            </div>
                        </div>-->
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Correo electronico:</label>
                                <input  name="email" type="email" placeholder="ejemplo17@gmail.com" class="form-control">
                            </div>
                        </div>
               
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Contraseña:</label>
                                <input  name="password" type="password" placeholder="********" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Escribir de nuevo la contraseña: </label>
                                <input  name="passwordR" type="password" placeholder="********" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 ">
                                <form method="POST">

                                    <button type="submit" name="submit"class="btn btn-primary btn-lg">Crear Cuenta</button>
                                </form>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php'; ?>