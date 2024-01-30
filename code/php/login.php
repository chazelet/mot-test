<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Website CSS style -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" href="../css/login.css">

		<title>Login</title>
	</head>

<body><?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $conn = new mysqli("localhost", "root", "root", "mot_mystere_Adeline");

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    $email = $conn->real_escape_string($_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT id_user, first_name, last_name, email, password FROM User WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Connexion réussie
            $_SESSION["user_id"] = $row["id_user"];
            $_SESSION["user_first_name"] = $row["first_name"];
            $_SESSION["user_last_name"] = $row["last_name"];
            $_SESSION["user_email"] = $row["email"];

            $conn->close();
            header("Location: mystery_word.php");
            exit();
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cet email";
    }

    $conn->close();
}
?>
    <section id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <article class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="#" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="./register.php" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>