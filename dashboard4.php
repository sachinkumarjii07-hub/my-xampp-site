```php
<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: index.php?msg=Please Login First");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card p-5 shadow">

        <h1 class="text-success">
            Welcome Admin
        </h1>

        <p>
            You are successfully logged in.
        </p>

        <a href="logout.php" class="btn btn-danger w-25">
            Logout
        </a>

    </div>

</div>

</body>
</html>
```
