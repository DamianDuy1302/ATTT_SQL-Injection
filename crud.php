<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>

    <div class="header">
        <div class="container mb-30">
            <div class="row header__navbar">
                <div class="navbar__logo">SearchPage</div>

                <div class="navbar__items">
                    <div class="navbar__item" id="back__button">Back</div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="solid-border">
		{$query}
	</div> -->
    <div class="main">
        <div class="container">
            <div class="row">
                <?php
                $hostname = "localhost";
                $username = "root";
                $password = "";
                $dbname = "test";
                $conn = mysqli_connect($hostname, $username, $password, $dbname);
                if (!$conn) {
                    die("Unable to connect");
                }
                if ($_POST) {
                    $pname = $_POST["pname"];

                    //Making sure that SQL Injection doesn't work
                    // $uname = mysqli_real_escape_string($conn, $uname);//test or 1=1
                    // $pass = mysqli_real_escape_string($conn, $pass);
                    $query = "SELECT * FROM `products` WHERE pname like '%$pname%'";


                    echo "<div class='solid-border w-100 mb-15'>
                    {$query}
                        </div>";
                    echo "<br>";
                    // ------------------------------------------------
                    // su dung mysqli_multi_query
                    $result = mysqli_multi_query($conn, $query);
                    if ($result) {
                        do {

                            if ($res = mysqli_use_result($conn)) {
                                while ($row = mysqli_fetch_row($res)) {
                                    echo "<div class='solid-border mr-15 mb-15'>";
                                    for ($i = 0; $i < count($row); $i++) {
                                        echo ($row[$i]);
                                        echo "<br>";
                                    }
                                    echo "</div>";
                                }
                                mysqli_free_result($res);
                            }
                            if (mysqli_more_results($conn)) {
                                echo "<br>";
                            }
                        } while (mysqli_next_result($conn));
                    }

                    // -----------------------------------------------
                    // su dung mysqli_query
                    // $result = mysqli_query($conn, $query);
                    // if (mysqli_num_rows($result) != 0) {
                    //     // echo $query;
                    //     echo "<br>";
                    //     while ($row = mysqli_fetch_assoc($result)) {
                    //         echo "<div class='solid-border mb-15 mr-15'>
                    //         <div>ID :{$row['id']}</div>
                    //         <div>User name: {$row['pname']} <br></div>
                    //         <div>Password : {$row['price']} <br></div>
                    //         </div>";
                    //     }
                    // }



                    // if (mysqli_num_rows($result) != 0) {
                    //     echo $query;
                    //     echo "<br>";
                    //     // echo "Welcome, ". $uname;
                    //     $row = mysqli_fetch_assoc($result);
                    //     echo "ID :{$row['id']}  <br> " .
                    //         "User name: {$row['pname']} <br> " .
                    //         "Password : {$row['price']} <br> " .
                    //         "--------------------------------<br>";
                    // } else {
                    //     echo $query;
                    //     echo "<br>";
                    //     echo "Incorrect Username/Password";
                    // }

                    mysqli_close($conn);
                } else {
                }

                ?>
            </div>
        </div>
    </div>
    <script>
    const back__button = document.getElementById("back__button")
    // console.log(search__button)
    back__button.addEventListener("click", () => {
        window.location.pathname = "index2.php"
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