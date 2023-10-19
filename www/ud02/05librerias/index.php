<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Web Portal - Includes and requires</title>
    <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>

    <div id="header" class="container">

        <?php require_once('logo.php'); ?>
        <?php require_once('menu.php'); ?>
        <?php require_once('pictures.php'); ?>




    </div>



    <div id="page">
        <div id="bg1">
            <div id="bg2">
                <div id="bg3">

                    <?php require_once('content.php'); ?>
                    <?php require_once('sidebar.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('footer.php'); ?>

</body>

</html>