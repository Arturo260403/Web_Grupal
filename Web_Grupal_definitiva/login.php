<!DOCTYPE html>
<html lang="es">
	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	    <title>Login</title>
  	</head>
	<body class="text-center">
        <div class="container mt-5">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form method="POST" action="login2.php">
                        <h1 class="h3 mb-3">Login</h1>
                        <div class="form-floating">
                            <input type="text" class="form-control my-2" id="Usuario" name="usuario" placeholder="Usuario">
                            <label for="Usuario">Usuario</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control my-2" id="Password" name="password" placeholder="Contraseña">
                            <label for="Password">Contraseña</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
                    </form>
                </div>
            </div>
        </div>        
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  	</body>
</html>