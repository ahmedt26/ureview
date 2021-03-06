<!--
  UReview Log In Page
  Abdullah Nafees and Tahseen Ahmed
  Monday, October 4th, 2021
-->

<?php
session_start();
?>

<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" lang="en">

<head>
    <!-- Metadata of Website 
      'viewport' is what screen this page is being accessed by, the scale is set to default size.
      The 'rel=icon' gives us the Logo image for the browser tabs.
      The various meta data give tab information  e.g what shows up in the tab text.
      We load up custom fonts and icons we need using links and Bootstrap, as well as a script
      to create a working hamburger for responsiveness.
    -->
    <title>UReview - Log In Confirmation</title>
    <meta property="og:title" content="UReview - Log In Confirmation">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="UReview - Things Reviewed by U!">
    <meta name="author" content="Tahseen Ahmed and Abdullah Nafees">

    <!-- Custom Fonts and Icons for Website -->
    <link rel="icon" href="./assets/images/logo.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</head>

<!-- The entire webpage must fill the entire viewport,
  and columns will stretch to fit-->

<body class="d-flex flex-column min-vh-100">

    <?php
    include('database.php');
    include('connection.php');

    // Most headers will be replaced with the login header if the user is logged in.
    if (isset($_SESSION['logged_in']) && ($_SESSION['logged_in'])) {
        include('login_header.php');
    } else {
        include('header.php');
    }
    ?>

    <?php
    // When the form iS POSTed, we perform the login checks.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // echo '<br> POST METHOD RECEIVED <br>';

        // We only POST and pull from DB if there's actually stuff in the login form.
        /// Check if username entry is harmful
        $username   = ($_POST["loginUsername"]);
        // Since the password is hashed right away it doesn't matter to legalize its input.
        $password   = hash('sha256', filter_input(INPUT_POST, 'loginPassword'));

        // Prepare the SQL Statement for Login
        $sql = "SELECT id, user_name, first_name FROM users WHERE user_name = ? AND pass_word = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        // Execute the statement
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if (
            isset($_POST['loginUsername']) && !empty($_POST['loginUsername'])
            && !empty($_POST['loginPassword'])
        ) {
            // Debug Code
            // echo '<br> Given Username: ' . $username . '<br>';
            // echo '<br> Given Password (hashed): ' . $password . '<br>';
            // echo '<br> numUsers: ' . $numUsers . '<br>';

            if (mysqli_num_rows($result) > 0) {
                // Get the first (and only) row of the result.
                $userResult = $result->fetch_assoc();
                // Create and store user details in SESSION variables.
                $_SESSION["logged_in"] = true;
                $_SESSION['user_id'] = $userResult['id'];
                $_SESSION["username"] = $username; // $userResult['user_name'];
                $_SESSION['firstName'] = $userResult['first_name'];
                echo '<br> <h3> Login Success </h3>';
                echo '<br> You are now logged in as: ' . $userResult['user_name'] . ", " . $userResult['first_name'] . "!";
                //  echo '<br> Your user ID is: ' . $_SESSION['user_id'] . " or " . $userResult['id'];
            } else {
                echo '<br> <h3> Login Failure </h3>';
                echo '<br> Invalid Username or Password <br>';
            }
        } else {
            echo '<br> <h3> Login Failure </h3>';
            echo ' <br> Username And/Or Password is not Set! <br>';
        }
    }

    ?>

    <?php include('footer.php'); ?>

</body>

</html>