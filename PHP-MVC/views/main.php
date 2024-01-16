
<!DOCTYPE html>
<html>

<head>
    <title>ShareBoard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-192x192.png"
        sizes="192x192" />
    <link rel="apple-touch-icon" href="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-180x180.png" />
    <meta name="msapplication-TileImage"
        content="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-270x270.png" />

    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css?ver=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/js/bootstrap.js"></script>

</head>

<body>

    <header>
        <?php include 'header.php'; ?>
    </header>

    <main role="main" class="container">
        <?php Messages::display(); ?>
        <?php require($view); ?>

    </main><!-- /.container -->
    <footer> <?php include 'footer.php'; ?>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>