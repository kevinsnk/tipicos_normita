<!DOCTYPE HTML>
<html language="en">
<head>
<meta charset="UTF-8">
<title>Tipicos Normita</title>
<meta name="viewport" content="width=device-width,user-scalable=no,inicial-scale =1,maximum-scale=1,minimum-scale=1">
<link rel = "stylesheet" href="logincss/login.css">
</head>
<body class="align">

  <div class="grid">

    <form action="validar.php" method="post" class="form login">

      <header class="login__header">
        <h3 class="login__title">Iniciar Sesión</h3>
      </header>

      <div class="login__body">

        <div class="form__field">
          <input type="text" placeholder="Nombre" name="usuario" required>
        </div>

        <div class="form__field">
          <input type="password" placeholder="Contraseña" name="clave" required>
        </div>

      </div>

      <footer class="login__footer">
        <input type="submit" value="Ingresar">

        <p><span class="icon icon--info"></span><a href="#"></a></p>
      </footer>

    </form>

  </div>
</html>