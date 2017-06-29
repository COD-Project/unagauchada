<main>

    <?php
      $categories = Categories();
      $HTML = '<div class="container">
        <div class="wrap">
      ';
      if (!$categories) {
        $HTML .= '<div class="col-12">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="text-fluid">Aún no se han registrado categorias.</p>
        </div></div>';
      } else {
        $HTML .= '<ul class="list-group">';
        foreach ($categories as $id => $constent_array) {
          $HTML .= '<li class="list-group-item justify-content-between">
            <div class="col-1">
              <i class="fa fa-tag"></i>
            </div>
            <div class="col-1">
              <a href="#"> <i class="fa fa-edit"></i> </a>
            </div>
            <div class="col-7">' .  $categories[$id]['name'] . '</div>
          <div class="col-3">';

          if($categories[$id]['idCategory'] != 1){
            $HTML .='
              <a style="color:grey" href="categories/delete/' . $categories[$id]['idCategory'] . '">
                <i class="fa fa-close"></i>
              </a>';
          }

          $HTML .= '
          </div>
        </li>';
        }
        $HTML .= '</ul></div></div>';
        echo $HTML;
      }
    ?>

</main>
