<?php

require_once 'db.inc.php';

$db = new DB();

if (isset($_SESSION['user'])) {
    $logged = true;
} else {
    $logged = false;
}

const ROLE_ADMIN = 100;
const ROLE_REDACTEUR = 10;
const ROLE_USER = 1;


const URL = '/admin_test/';
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Zone Rédaction</title>
</head>

<body>
<ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo URL; ?>">Homepage</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URL . 'reservation.php'; ?>">Reservation</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URL . 'apropos.php'; ?>">A propos</a>
        </li>
        <?php if ($logged === true) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL . 'connecte.php'; ?>">Connecté</a>
            </li>
            <?php if ($_SESSION['user']['role'] >= ROLE_REDACTEUR) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL . 'redacteur.php'; ?>">Redacteur</a>
            </li>
            <?php endif; ?>
            <?php if ($_SESSION['user']['role'] >= ROLE_ADMIN) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL . 'admin.php'; ?>">Admin</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
        <?php endif; ?>

    </ul>


    <h1>Zone Rédaction</h1>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>