<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Website CSS style -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/register.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Register</title>
	</head>
	<body>
	<?php
	
	// Assurez-vous de mettre les informations de connexion correctes
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mot_mystere_Adeline";
	
	// Créer une connexion à la base de données
	$conn = new mysqli($servername, $username, $password, $dbname);
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $conn = new mysqli("localhost", "root", "root", "mot_mystere_Adeline");

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Récupérer les données du formulaire
    $first_name = isset($_POST["name"]) ? $_POST["name"] : "";
	$last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
	$email = isset($_POST["email"]) ? $_POST["email"] : "";
	$password = isset($_POST["password"]) ? password_hash($_POST["password"], PASSWORD_DEFAULT) : "";


    // Insérer l'utilisateur dans la base de données
    $sql = "INSERT INTO User (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        // Fermer la connexion
        $conn->close();

        // Redirection vers la page de connexion
        header("Location: login.php");
        exit();
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
		<section class="container">
			<article class="row main">
				<div class="main-login main-center">
				<h5>Sign up once and watch any of our free demos.</h5>
					<form class="" method="post" action="#">
						
						<div class="form-group">
							<label for="first_name" class="cols-sm-2 control-label">Your First Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="first_name" id="first_name"  placeholder="Enter your First Name"/>
								</div>
							</div>
						</div>

                        <div class="form-group">
							<label for="last_name" class="cols-sm-2 control-label">Your Last Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="last_name" id="last_name"  placeholder="Enter your Last Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>
                        <div class="form-group">
							<a href="./login.php" class="text-info">Login here</a><br>
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>
						
					</form>
				</div>
			</article>
		</section>
 
		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>