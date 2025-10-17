<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Login</title>
</head>
<body>
    <header>
        <h3>pengecekan dan maintenance building</h3>
    </header>
    <?php
    // login_status passed from login_check.php
    // if the form submited, submit to login_check
    // then login_check.php do the things (go check the file)
    // then login_check.php pass the login_status to current page
    // and print the following if logic
    
    if (isset($_GET['login_status'])) {
        if ($_GET['login_status'] == "failed") {
            echo "Login gagal bro, wrong username/password";
        } else if ($_GET['login_status'] == "logout") {
            echo "Berhasil logout";
        } else if ($_GET['login_status'] == "not_logged_in") {
            echo "Belom login bos";
        }
    }
    ?>
    <form method="POST" action="function_helper/login.php" autocomplete="off">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="login"></td>
            </tr>
        </table>
    </form>
</body>
</html>