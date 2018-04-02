<!DOCTYPE html>
<html lang="ja">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/vendor.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/vendor.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
  </head>
  <?php $nowURL = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>

  <?php if (!isset($_POST['target-page']) && $nowURL == home_url('/') || $nowURL == home_url('')) : ?>
    <body class="top">
  <?php else : ?>
    <body>
      <nav>
        <div class="nav-wrapper container">
          <a href="<?php echo home_url(); ?>" class="brand-logo">Ratneko</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="" href="<?php echo home_url('company'); ?>">会社概要</a></li>
            <li><a class="" href="<?php echo home_url('business'); ?>">事業内容</a></li>
            <li><a class="" href="<?php echo home_url('inquiry'); ?>">お問い合わせ</a></li>
          </ul>
        </div>
      </nav>

  <?php endif; ?>
