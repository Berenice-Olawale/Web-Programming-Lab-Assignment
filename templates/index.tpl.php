<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$find['file'].'.php')) { include("./logicals/{$find['file']}.php"); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pagetitle['title'] ?></title>
    <link rel="stylesheet" href="./styles/style.css" type="text/css">
    <?php if(file_exists('./styles/'.$find['file'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $find['file']?>.css" type="text/css"><?php } ?>
    <script defer src="./scripts/validation.js"></script>
</head>
<body>
<header class="site-header">
    <div class="brand">
        <img src="./images/<?=$header['imagesource']?>" alt="<?=$header['imagealt']?>">
        <div>
            <h1><?= $header['title'] ?></h1>
            <p><?= $header['motto'] ?></p>
        </div>
    </div>
    <div class="login-status">
        <?php if(isset($_SESSION['login'])) { ?>Logged-in: <strong><?= htmlspecialchars($_SESSION['fn']." ".$_SESSION['ln']." (".$_SESSION['login'].")") ?></strong><?php } else { ?>Browsing as <strong>Guest</strong><?php } ?>
    </div>
</header>
<nav class="topnav">
    <?php foreach ($pages as $url => $page) { ?>
        <?php if((!isset($_SESSION['login']) && $page['menun'][0]) || (isset($_SESSION['login']) && $page['menun'][1])) { ?>
            <a<?= (($page == $find) ? ' class="active"' : '') ?> href="<?= ($url == '/') ? '.' : $url ?>"><?= $page['text'] ?></a>
        <?php } ?>
    <?php } ?>
</nav>
<main class="container">
    <?php include("./templates/pages/{$find['file']}.tpl.php"); ?>
</main>
<footer>
    &copy; <?= $footer['copyright'] ?> <?= $footer['firm']; ?>
</footer>
</body>
</html>
