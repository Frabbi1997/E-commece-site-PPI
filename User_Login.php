
<?php require_once 'partial/_header.php'; ?>


<?php
session_start();
$message = false;
$type = 'success';
if (isset($_POST['login'])) {

    $email = strtolower(trim($_POST['email']));
    $password = trim($_POST['password']);

    require_once 'databace_connetion.php';
    $query = 'SELECT id,email,password ,role FROM users_information WHERE email=:email';
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();



    if ($user) {
        if (password_verify($password, $user['password']) == true) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $message = 'User login';
            header('Location:user_list.php');
        } else {
            $message = 'Not Valid';
            $type = 'danger';
        }
    } else {
        $message = 'User not found.';
        $type = 'danger';
    }
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,
                   minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min
       .css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>
        <div class="container">
            <?php if ($message): ?>
                <div class="alert alert-<?PHP echo $type; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

                <form method="post" action="">
                    <h1 class="h3 mb-3 font-weight-normal">User login</h1>

                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" name="email" class="form-control"
                           placeholder="Email  address" required   autofocus>

                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control"
                           placeholder="Password" required>

                    <button class="btn btn-lg btn-primary btn-block" name="login"
                            type="submit">Login</button>
                </form>

        </div>
<?php require_once 'partial/_footer.php'; ?>
</body>
</html>

