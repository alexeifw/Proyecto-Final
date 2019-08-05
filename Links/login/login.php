<?php

  session_start();

  if (isset($_SESSION['id_usuario'])) {
    header('Location:/Proyecto Final/index.html');
  }
  require 'conexion.php';

  if (!empty($_POST['dniUser']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id_usuario, dni_Usuario, password FROM usuarios WHERE dni_Usuario = :dniUser');
    $records->bindParam(':dni_Usuario', $_POST['dniUser']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password_Usuario'])) {
      $_SESSION['id_usuario'] = $results['id_usuario'];
      header("Location: /Proyecto Final/index.html");
      $message = 'EXITO';
    } else {
      $message = 'ERROR';
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <style>
        body{
            display: block;
            
        }
        </style>     
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Empresa Fiber" content="Tarea de programar un sitio web sencillo para la empresa de hosting Fiber">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="stylesheet" href="../../styles.css">
       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Ingresar</title>     
</head>
<body>   
 

    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="barra_navegacion_superior">          
            <a id="icono" class="navbar-brand" href="../../index.html"><img  src="../../Img/logo.png" alt="Logotipo de la empresa SanFrA" usemap="#workmap">
            </a>
    
            <button id="boton" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse"  id="navbarSupportedContent">        
                <ul class="navbar-nav mr-auto">                  
                    
                    <li class="nav-item active"> 
                        <a id="ej" class="nav-link" href="login.html">Ingresar</a>
                    </li>   

                    <li class="nav-item active"> 
                        <a id="ej" class="nav-link" href="../registrarse/registrarse.html">Registrarse</a>
                    </li>
                    
                    <li class="nav-item active"> 
                        <a id="ej" class="nav-link" href="../cuadernoDeCampo/cuadernoDeCampo.html">Cuaderno de Campo</a>
                    </li>  

                    <li class="nav-item active">     
                        <a class="nav-link" href="../Informacion/Informacion.html">Informacion</a>
                    </li>     
            
                    <li class="nav-item active">     
                        <a class="nav-link" href="../Contacto/Contacto.html">Contacto</a>                                 
                    </li> 
                </ul>
            </div>
    </nav>
    
    <section>
        <div id="content">
        <h1>Iniciar Sesion</h1>
        
        <form action="login.php" method="POST">
            <table border="1">
                          
                <tr>
                    <td><label> DNI:</label></td>
                    <td><input   name="dniUser" placeholder="DNI" required/></td>
                </tr>
         
                        
                <tr>
                    <td><label> Contraseña:</label></td>
                    <td><input type="password" name="password" placeholder="****************" required/></td>
                </tr>
                 
                <tr>
                    <td>
                        <button type="reset" onclick="">Restablecer</button>    
                    </td>
                    
                    <td>
                        <button type="submit" onclick="">Entrar</button>                         
                    </td>
                </tr>

            </table> 

        </form>
        
        <?php if(!empty($message)): ?>
            <p> <?= $message ?></p>
        <?php endif; ?>

        </div>
    </section>




    <footer>
            <address>
                    <p>SanFrA Argentina S.A.</p> 
                    <p>Uruguay 1037, piso 1°, Buenos Aires, República Argentina</p>
                    <p>Teléfono (005411) 4811-0556 / Fax (005411) 4815-4742</p>
            </address>        
            <a href="../../index.html">http:/www.sanfra.com.ar</a><br>        
            <small>Alexei FW Derechos Reservados &copy; 2019</small>           
    </footer> 
          
</body>
</html>