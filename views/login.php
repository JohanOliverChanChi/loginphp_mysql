<?php

  session_start();

  if (isset($_SESSION['user_id'])) {

  }
  require '../model/database.php';

  if (!empty($_POST['fname']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, fname, password FROM users WHERE fname = :fname');
    $records->bindParam(':fname', $_POST['fname']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $contra = $_POST['password'];
    $contrabd = $results['password'];
    print $contra;
    print $contrabd;

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /php-login");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../estilos/estilosLogin.css">

    </head>

    <body>

     <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

        <div class="container-fluid vh-0" style="margin-top:50px">
            <div class="" style="margin-top:20px">
                <div class="d-flex justify-content-center">
                    <div class=" bg-dark"  id="cuadro">
                        <div class="text-center">
                            <h3 class="text-light">Iniciar Sesion</h3>
                        </div>
                        <form action="login.php" method="POST">
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-danger"><i
                                            class="bi bi-person-plus-fill text-white"></i></span>
                                    <input name="fname" type="text" class="form-control" placeholder="Nombre de usuario">
                                            
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-danger"><i
                                            class="bi bi-key-fill text-white"></i></span>
                                    <input name="password" type="password" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Recordar mi cuenta
                                    </label>
                                </div>
                                <button class="btn btn-danger text-center mt-2" type="submit" value="send">
                                    Ingresar
                                </button>
                                <p class="text-center mt-5">No tienes una cuenta?
                                  <a class = "text-danger" href="registro.php">Crear una</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
