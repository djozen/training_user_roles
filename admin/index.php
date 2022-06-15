<?php

require_once '../db.inc.php';

$db = new DB();

const ROLE_ADMIN = 100;
const ROLE_REDACTEUR = 10;
const ROLE_USER = 1;

const URL = '/admin_test/admin/';

if (isset($_SESSION['user'])) {
    $logged = true;
} else {
    $logged = false;
    header('Location:' . URL . 'login.php');
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin</title>
</head>

<body style="background-color:#EEEEEE">


    <div class="row">
        <div class="col d-flex justify-content-center">
            <h1 style="margin:32px 0px">Administration</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
        <ul class="nav flex-column">
                <?php if ($logged === true) : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo URL; ?>">Administration</a>
                    </li>
                    <?php if ($_SESSION['user']['role'] >= ROLE_REDACTEUR) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL . 'articles.php'; ?>">Curl articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL . 'challenges.php'; ?>">Curl challenges</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($_SESSION['user']['role'] >= ROLE_ADMIN) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL . 'users.php'; ?>">Curl user</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL . 'profil.php'; ?>">Mon profil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col-10">
            <h2>Ceci est l'administration du site</h2>
        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>