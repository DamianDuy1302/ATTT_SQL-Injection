<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="header">
        <div class="container mb-30">
            <div class="row header__navbar">
                <div class="navbar__logo">SQL Injection</div>

                <div class="navbar__items">
                    <div class="navbar__item" id="search__button">Search</div>
                    <div class="navbar__item" id="back__button">Back</div>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="container">

            <div class="row">
                <?php
				function redirect($url)
				{
					if (!empty($url))
						header("location: {$url}");
				}
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$dbname = "test";
				$conn = mysqli_connect($hostname, $username, $password, $dbname);
				if (!$conn) {
					die("Unable to connect");
				}
				if ($_POST) {
					$uname = $_POST["username"];
					$pass = $_POST["password"];
					// Making sure that SQL Injection doesn't work
					// $uname = mysqli_real_escape_string($conn, $uname); //test or 1=1
					// $pass = mysqli_real_escape_string($conn, $pass);
					$query = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";

					$result = mysqli_query($conn, $query);
					echo "<div class='solid-border w-100 mb-15'>
					{$query}
					</div>";
					echo "<br>";



					if (mysqli_num_rows($result) != 0) {
						$row = mysqli_fetch_assoc($result);
						echo "<div class='solid-border'>
						<h4>Login successfully!</h4>
						<div>ID :{$row['id']}</div>
						<div>User name: {$row['username']} <br></div>
						<div>Password : {$row['password']} <br></div>
						</div>";

						// redirect("index2.php");

						// echo "<a href="{index2.php}">Search</a>";
						// while ($row = mysqli_fetch_assoc($result)) {
						// 	echo "<div class='solid-border db'>
						// <div>ID :{$row['id']}</div>
						// <div>User name: {$row['username']} <br></div>
						// <div>Password : {$row['password']} <br></div>
						// </div>";
						// }

					} else {
						echo "<div class='solid-border'>
						<h4>Incorrect Username/Password</h4>
					</div>";
					}
					mysqli_close($conn);
				} else {
				}
				// echo "<script>";

				// if (1==1) {
				// 	echo "document.getElementById('search__button')";

				// }
				// echo "</script>";
				?>
            </div>
        </div>
    </div>
    <script>
    const search__button = document.getElementById("search__button")
    console.log(search__button)
    search__button.addEventListener("click", () => {
        window.location.pathname = "index2.php"
    })
    const back__button = document.getElementById("back__button")
    // console.log(search__button)
    back__button.addEventListener("click", () => {
        history.go(-1)
    })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html>