<?php
// include_once("controladores/funciones.php");
require_once("autoload.php");
$errores=[];
 if ($_POST){
  $tipoConexion = "MYSQL";
 if($tipoConexion=="JSON"){
    $usuario = new Usuario(
      $_POST["email"],
      $_POST["password"],
      $_POST["repassword"],
      $_POST["nombre"],
      $_FILES 
   );
  $errores = $validar->validacionUsuario($usuario, $_POST["repassword"]);
  
  if(count($errores) == 0){
    $usuarioEncontrado = $json->buscarEmail($usuario->getEmail());

    if($usuarioEncontrado != null){
      $errores["email"]="Este usuario ya esté registrado";

    }else{
      $registroUsuario = $registro->armarUsuario($usuario);
     
      $json->guardar($registroUsuario);
     
      redirect ("login.php");
    }
  }
}else{
  $usuario = new Usuario($_POST["email"],$_POST["password"],$_POST["repassword"],$_POST["nombre"],$_FILES );
  $errores = $validar->validacionUsuario($usuario, $_POST["repassword"]);
  if(count($errores)==0){
    $usuarioEncontrado = BaseMYSQL::buscarPorEmail($usuario->getEmail(),$pdo,'users');
    if($usuarioEncontrado != false){
      $errores["email"]= "Este usuario ya está Registrado";
    }else{
      $avatar = $registro->armarAvatar($usuario->getAvatar());
      //guardar los datos del usuario en la base de datos, el objeto PDO, el objeto usuario, la tabla donde se va a guardar los datos y el nombre del archivo de la imagen del usuario.
      BaseMYSQL::guardarUsuario($pdo,$usuario,'users',$avatar);

      redirect ("login.php");
    }
  }
 } 


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <?php
        include_once('parts/head.php');
       ?>
    <title>Queer Cheer - Registrate</title>
</head>
<body>
    <nav class=" navbar navbar-expand-lg navbar-dark bg-dark">
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
              <li class="nav-item active">
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
              <li class="nav-item">
              <a class="nav-link" href="perfil.php">Perfil</a>            
              </li>
              <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>            
              </li>
            <?php endif;?>
          </ul>
        </div>
      </nav>

      <!-- Tabla de errores  -->
      <?php
      if(!empty($errores)):?>
        <ul class="alert alert-danger">
          <?php
          foreach ($errores as $key => $value) :?>
            <li> <?=$value;?> </li>
            <?php endforeach;?>
        </ul>
      <?php endif;?>

  <!-- Formulario  -->
          <div class="login">
        <form class="text-center border border-0 p-5 col-md-4  center_div__ " method="POST" enctype="multipart/form-data" >   
  <!-- <form class="text-center border border-light p-5 col-md-4 col-sm-6 center_div__ "> -->
        <p class="h4 mb-4 text-white">Registrate para empezar a jugar!</p>
  <!-- Usuario -->
        <input class="form-control mb-4" name="nombre" type="text" id="nombre"  value="<?=(isset($errores["nombre"]) )? "" : inputUsuario("nombre");?>" placeholder="Nombre de usuario..." required="required" />
  <!-- E-mail -->
        <input class="form-control mb-4" name="email" type="text" id="email" value="<?=isset($errores["email"])? "":inputUsuario("email") ;?>" placeholder="Correo electrónico" required="required" />
  <!-- No se persiste el password por cuestiones de seguridad"> -->
  <!-- Password -->
        <input class="form-control mb-4" name="password" type="password" id="password" value="" placeholder="Contraseña..." required="required" />
  <!-- RePassword -->
        <input class="form-control mb-4" name="repassword" type="password" id="repassword" value="" placeholder="Rectifique su contraseña" required="required" />
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-white mb-4 ">
          El password debe tener por lo menos 6 caracteres.
        </small>
  <!--imagen -->
        <div class="custom-file">
        <input type="file" class="custom-file-input" id="avatar" name="avatar" >
        <label class="custom-file-label" for="avatar">Elegi una foto</label>
        </div>
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-white mb-4 " accept=".jpg,.jpeg,.bmp,.png">
          Selecciona una imagen de avatar , debe ser jpg o png.
  <!-- Botom -->
        <button class="btn btn-info my-4 btn-block " type="submit">Registrate!</button>
        
        <hr>

  <!--ToS -->
        <p class="text-white">Haciendo click en 
            <em>Registrate</em> estas de acuerdo con nuestros
            <a href="" target="_blank" >Terminos y condiciones</a></p>

    </form>
  </div>
  <!--FOOTER-->
      <?php
        include_once('parts/footer.php');
       ?>  
</body>
</html>