<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="#" />
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ADEINVI</title>

        <link rel="stylesheet" href="../login/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../login/estilos.css">
        <link rel="stylesheet" href="../login/plugins/sweetalert2/sweetalert2.min.css">        
        
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
        
    <link rel="stylesheet" href="../public/css/font-awesome.css">
        <!--<link rel="stylesheet" type="text/css" href="../login/fuentes/iconic/css/material-design-iconic-font.min.css">-->
        
    </head>
    
    <body>
      <div class="container-login">
        <div class="wrap-login">
            <form class="login-form validate-form" id="formLogin" action="" method="post">
             
              <div class="login-logo" style="text-align: center;font-size: 38px;"> 
            <a href="login.php" style="color:black;"><b>ADEINVI</b> CB</a>
                <div id="cont" style="width: 50%;left: 25%;position: relative;">
                 <img src="../public/images/pngwing.png"  width="100%" >
                 </div>
                </div>
                <div class="wrap-input100" data-validate = "Usuario incorrecto">
                    <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
                    <span class="focus-efecto"></span>
                </div>
                <div class="wrap-input100" data-validate="Password incorrecto">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-efecto"></span>
                </div>
                
                <div class="container-login-form-btn">
                    <div class="wrap-login-form-btn">
                        <div class="login-form-bgbtn"></div>
                       <button type="submit" name="submit" class="login-form-btn">CONECTAR</button>
                  
                    </div>
                </div>
            </form>
        </div>
    </div>     
        

     
 
        
     <script src="../login/jquery/jquery-3.3.1.min.js"></script>    
     <script src="../login/bootstrap/js/bootstrap.min.js"></script>    
     <script src="../login/popper/popper.min.js"></script>     
     <script src="../login/plugins/sweetalert2/sweetalert2.all.min.js"></script>    
     <!--<script src="../login/codigo.js"></script>    -->
     <script type="text/javascript" src="scripts/login.js"></script>
    </body>
</html>