```php
<?php
session_start();

/* ---------------------------
   DEMO LOGIN CREDENTIALS
---------------------------- */
$valid_email = "admin@gmail.com";
$valid_password = "12345";

/* ---------------------------
   LOGIN CHECK
---------------------------- */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == $valid_email && $password == $valid_password) {

        $_SESSION['admin'] = $email;

        header("Location: dashboard.php");
        exit();

    } else {

        header("Location: index.php?msg=Invalid Email or Password");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Bootstrap 5 -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >

    <style>

        body{
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card{
            width: 100%;
            max-width: 450px;
            border-radius: 15px;
            border: none;
        }

        .login-title{
            font-weight: bold;
            color: #333;
        }

        .btn-login{
            background: #4facfe;
            border: none;
            transition: 0.3s;
        }

        .btn-login:hover{
            background: #00c6fb;
        }

    </style>
</head>

<body>

<div class="card shadow p-4 login-card">

    <h2 class="text-center mb-4 login-title">
        Admin Login
    </h2>

    <?php
    if(isset($_GET['msg'])){
    ?>
        <div class="alert alert-danger text-center">
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php
    }
    ?>

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">
                Email Address
            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Enter Email"
                required
            >
        </div>

        <div class="mb-4">
            <label class="form-label">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Enter Password"
                required
            >
        </div>

        <button type="submit" class="btn btn-login text-white w-100">
            Login
        </button>

    </form>

    <p class="text-center mt-3 text-muted">
        Demo Login: admin@gmail.com / 12345
    </p>

</div>

</body>
</html>
```
