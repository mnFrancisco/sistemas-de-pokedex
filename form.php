<?php

$servername = "localhost";
$username = "root";
$password = "";
$banco = "rpg";

// Create connection
$conn = new mysqli($servername, $username, $password, $banco);

// Check connection
if ($conn->connect_error) {
  die("Erro: " . $conn->connect_error);
}else{
  
  if(isset($_POST['nome']) != null){
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
  

    if($password === '' || $password === null){
      echo 'Senha obrigatória!';
    }else{
      $sql = "INSERT INTO personagem (nome, email, password)
      VALUES ('$nome', '$email', md5('$password'))";

      if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";  
      } else {
        echo "Erro ao cadastrar!";
      }
    }
     
    $conn->close();

    echo '<br /><br /><a href="index.php">Voltar</a>';
 
  }
    
}

?>

<!DOCTYPE html>
<html>
<body>

<?php //echo $msg; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pokemon</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="meu_stilo.css">

    <style>
      .login{
        background-image: url(images/plano-de-fundo/1.jpg);
        background-size: cover;
        color: black;
      }
    </style>

    
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
       

        <div>
          <section class="login_content">

            <form action="form.php" method="post">
              <h1>Criar conta</h1>
              <div>
                <input type="text" class="form-control" name="nome" placeholder="Nome do Personagem" required="" />
              </div>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Senha" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-success">Registrar</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ja tem uma conta?
                  <a href="index.php" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>


