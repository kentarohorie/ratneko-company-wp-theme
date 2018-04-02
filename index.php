  <?php session_start(); ?>

  <?php get_header(); ?>
  <?php get_sidebar(); ?>

      <?php $nowURL = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>

     <?php if (isset($_POST['target-page'])) : ?>
        <div class="container">
          <div class="row"></div>
          <?php
            if(isset($_POST['target-page'])) {
              $hoge = str_replace('cd ', '', $_POST['target-page']);
              $pageName1 = str_replace('cd ', '', $_POST['target-page']);
              $pageName = str_replace("\r\n", '', $pageName1);
              if ($pageName == 'company' || 'business' == $pageName || 'inquiry' == $pageName) {
                get_template_part($pageName);
              }
            }
          ?>
          <div class="row"></div>
        </div>
        <?php get_footer(); ?>
      <?php elseif ($nowURL == home_url('/') || $nowURL == home_url('')) : ?>
        <div class="container">
          <div class="row"></div>
          <div class="row">
            <a class="btn-floating pulse"><i class="material-icons sidenav-trigger" data-target="slide-out">menu</i></a>
          </div>

          <h1 class="white-text dynamic-text1" data-text="Hello World."></h1>
          <h1 class="white-text dynamic-text2" data-text="We are Ratneko."></h1>
          <h3 class="white-text dynamic-text3" data-text="Try move Programatically."></h3>
          <div class="row">
            <div class="col s12 m12">
              <div class="card darken-1" style="background-color: #161722;">
                <div class="shell-wrap">
                  <p class="shell-top-bar">/Ratneko/welcome/strangers</p>
                  <ul class="shell-body">
                    <li>$ echo example.ratneko</li>
                    <li>Try input for example...</li>
                    <li>cd company</li>
                    <li>cd business</li>
                    <li>cd news</li>
                    <li>cd inquiry</li>
                    <li class="input-cover">
                      <form action="<?php echo home_url(('/')); ?>" method="POST">
                        <input class="terminal-input" type="text" autofocus="true" name="target-page">
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
      <?php else : ?>
        <div class="container">
          <div class="row"></div>
          <?php
          if ($nowURL == home_url('business') || $nowURL == home_url('business') . '/') {
            get_template_part('business');
          } elseif ($nowURL == home_url('company') || $nowURL == home_url('company') . '/') {
            get_template_part('company');
          } elseif ($nowURL == home_url('inquiry') || $nowURL == home_url('inquiry') . '/') {
            get_template_part('inquiry');
          }
          ?>
          <div class="row"></div>
        </div>
        <?php get_footer(); ?>
      <?php endif; ?>
    </div>

  </body>
</html>