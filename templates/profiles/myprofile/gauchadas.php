<div class="tab-pane wow fadeIn" id="gauchadas" data-wow-delay="0.1s">
  <div class="row" style="margin-bottom: 5px;">
    <?php if (!$this->gauchadas): ?>
        <div class="col-12">
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p class="text-fluid">Aún no has solicitado gauchadas.
          </div>
        </div>'
    <?php else:
      $i = 0;
      array_walk($this->gauchadas, function($gauchada) use($i) {
    ?>
        <div class="col-lg-12" style="margin-bottom: 10px;">
        <!--Card-->
            <div class="card wow fadeIn" style="max-width: 90%; margin: auto;" data-wow-delay="0.<?= ($i+1)*2 ?>s">
                <!--Card content-->
                <div class="card-block">
                  <!--Title-->
                  <div class="card-title">
                    <div class="row">
                      <div class="col-8 text-fluid">
                        <h5 class="h5-responsive"><?= $gauchada['title'] ?></h4>
                      </div>
                      <div class="col-4">
                        <div class="d-flex flex-row-reverse">
                          <a href="gauchadas/delete/<?= $gauchada['idGauchada'] ?>">
                            <button type="button" class="btn btn-danger btn-circle">
                              <i class="fa fa-trash"></i>
                            </button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr/>
                  <!--Text-->
                  <p class="card-text text-fluid"><?= $gauchada['body'] ?></p>
                  <div class="d-flex flex-row-reverse">
                    <a href="gauchadas/view/<?= $gauchada['idGauchada'] ?>">
                      <button type="button" class="btn btn-primary btn-circle">
                        <i class="fa fa-chevron-right"></i>
                      </button>
                    </a>
                  </div>
                </div>
                <!--/.Card content-->
            </div>
            <!--/.Card-->
        </div>";
    <?php
        $i++;
        });
      endif
    ?>
  </div>
</div>
