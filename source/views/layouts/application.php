<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Lampart</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item mr-2">
                    <a class="nav-link btn btn-outline-primary <?= (isset($_GET['action']) == false || $_GET['action'] !== 'category') ? 'active' : ' ' ?>" href="index.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary <?= (isset($_GET['action']) && $_GET['action'] == 'category') ? 'active' : ' ' ?>" href="index.php?controller=pages&action=category">Category</a>
                </li>
            </ul>
            <!-- Brand/logo -->
            <a class="navbar-brand ml-auto" href="#">
                <img src="public/img/logo.png" alt="logo">
            </a>
        </nav>
    </div>  
    <?= @$content ?>
    <footer class="container-fluid text-center">
        <p>Copyright &copy; 2023 - All right resver</p>
    </footer>
</body>
</html>