<!-- views/layout/default.php -->
<!DOCTYPE html>
<html>

<head>

    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="public/css/bootstrap.css">

</head>



<body>
    <?php require_once($viewPath); ?>
    <?php require_once 'footer.php' ?>;
    <script src="public/js/bootstrap.js"></script>
</body>

</html>