<!DOCTYPE html>
<html>
  <?php $this->include('overall/header'); ?>
  <body>
    <?php $this->include('overall/topnav'); ?>
    <div class="" style="background-color: transparent; padding-top: 125px;"></div>
    <div class="container">
        <?php
          $user = Users()[$this->router->getId()];
          $HTML = '';
          if ($user) {
            $HTML .= '<h1>' . $user['completeName'] . '</h1>
            <p> >>Insert Here a calification and a comment<< </p>';
          }
          echo $HTML;
        ?>
    </div>
    <?php $this->include('overall/footer'); ?>
  </body>
</html>
