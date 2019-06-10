<?php
require_once("autoload.php");

if($_POST){
  /*
  $errores=validarLogin($_POST);
  if (empty($errores)){
    $usuario=buscarEmail($_POST["UsuarioLogin"]);
    seteoSesion($usuario,$_POST);
    header('Location: index.php');
  }
*/
$usuario = new Usuario($_POST["email"],$_POST["password"]);
  $errores= $validar->validacionLogin($usuario);
  if(count($errores)==0){
  
    $usuarioEncontrado = $json->buscarEmail($usuario->getEmail());
    if($usuarioEncontrado == null){
      $errores["email"]="Usuario no existe";
    }else{
      if(Autenticador::verificarPassword($usuario->getPassword(),$usuarioEncontrado["password"] )!=true){
        $errores["password"]="Error en los datos verifique";
      }else{
        Autenticador::seteoSesion($usuarioEncontrado);
        if(isset($_POST["recordar"])){
          Autenticador::seteoCookie($usuarioEncontrado);
        }
        if(Autenticador::validarUsuario()){
          redirect("perfil.php");
        }else{
          redirect("registro.php");
        }
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
    <title>Queer Cheer -Login</title>
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
              <li class="nav-item active">
                  <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a> 
              </li>
              <li class="nav-item ">
                  <a class="nav-link" href="signup.php">Registrate</a>  
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

      <?php
    if (isset($errores)):?>
        <ul class="alert alert-danger">
        <?php foreach ($errores as $key => $value) :?>
            <li><?=$value;?></li>
        <?php endforeach;?>
        </ul>
    <?php endif;?>

      <!-- Formulario  -->
      <div class="login">
    <form class="text-center border border-0 p-5 col-md-4  center_div__ " method="POST"> 
      <br><br><br>  
        <p class="h4 mb-4 text-white">Inicia Sesión!</p>       
        <!-- Usuario -->
        <input type="email" id="email" class="form-control mb-4" name="email" <?php
        if (empty($_POST["email"])):?> placeholder="E-mail" <?php else:?> value=<?=$_POST["email"];?> <?php endif;?>placeholder="E-mail">
        <!-- Password -->
        <input type="password" id="password" class="form-control mb-4" name="password" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
        <!-- Remember -->
        <input class="form-check-input" type="checkbox" value="" id="recordar" name="recordar">
        <br>
        <label class="form-check-label text-white mb-4" for="defaultCheck1">Remember me!</label>
        <!-- Botom -->
        <button class="btn btn-info my-4 btn-block " type="submit">Logeate!</button>
    </form>
  </div>
<!--FOOTER-->
<?php
        include_once('parts/footer.php');
       ?> 
</body>
</html>