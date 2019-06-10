<?php
require_once("autoload.php");
if (!Autenticador::validarUsuario()){
  header('Location: login.php');
};
?>

<!DOCTYPE html>
<html>
<head>
      <?php
         include_once('parts/head.php');
        ?>
    <title>Queer Cheer - Registrate</title>
</head>
<body id="bodyperfil">
    <nav class="estilonav navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand logo_" href="index.php">QC!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <?php if(!isset($_SESSION["email"])):?>
              <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a> 
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="signup.php">Registrate<span class="sr-only">(current)</span></a>  
              </li>
            <?php endif;?>
              <li class="nav-item ">
                  <a class="nav-link" href="preguntas.php">Preguntas Frecuentes</a> 
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="comprar.php">Comprar Ahora</a>  
              </li>
            <?php if(isset($_SESSION["email"])):?>
              <li class="nav-item active">
              <a class="nav-link" href="perfil.php">Perfil</a>            
              </li>
              <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>            
              </li>
            <?php endif;?>
          </ul>
        </div>
      </nav>

    <!---perfill--->
    <div class="containPerfil">
      <section class="row  text-center">
      <article class="perfil col-12 col-xl-6 " > 
    <div class="avatarShape text-center">
           <?php if(!isset($_SESSION['avatar']) || empty($_SESSION['avatar'])): ?>
             <img class="avatarShape" class="rounded" src="img/person-icon.png" alt="Avatar" >
            <?php else: ?>
             <img class="avatarShape" class="rounded" src="img/<?=$_SESSION['avatar'];?>" alt='Avatar' >
             <?php endif; ?> 
    </div>
             <br>
             <h1 class="bienvenida" > <?php if(!isset($_SESSION['nombre']) || empty($_SESSION['nombre'])) {
               echo 'Bienvenido Jugador o Jugadora!';
             } else {
               echo 'Bienvenid@ ' . $_SESSION['nombre'] . '!';
            } ?> 
           </h1>
    </article> 
      <article class="col-12 col-xl-6" >
            <h2 class="bienvenida">  Modificar Perfil
               </h2>
           <form class="text-center border border-0 p-5 col-md-4  center_div__ " method="POST" enctype="multipart/form-data">
       <!-- Usuario -->
       <input class="form-control mb-4" name="nombre" type="text" id="nombre"  value="<?=(isset($errores["nombre"]) )? "" : inputUsuario("nombre");?>" placeholder="Nombre de usuario..."  />
  <!--imagen -->
        <div class="custom-file">
        <input type="file" class="custom-file-input" id="avatar" name="avatar" >
        <label class="custom-file-label" for="avatar">Elegí una foto</label>
        </div>
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-white mb-4 " accept=".jpg,.jpeg,.bmp,.png">
          Selecciona una imagen de avatar , debe ser jpg o png.
  <!-- Botom -->
        <button class="btn btn-info my-4 btn-block " type="submit">Enviar!</button>
            </form>

    </article>
</section>

</div>
</div>
          <!----jugar
          <article class="perfil" >
          <a href="login.php"><button type="button" class="juguemos btn btn btn-primary btn-lg btn-info">JUGUEMOS</button></a> 
          </article>
          ---->
     

        
  <!--FOOTER-->
            <article class="perfil cerrarsesion">
          <a href="logout.php">Cerrar Sesión</a>
       </article> 
       <?php
       include_once('parts/footer.php');
       ?>
</body>
</html>