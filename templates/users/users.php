<div style="margin-top: 75px">
    <div class="row">
        <div class="col-8 text-left">
            <h2>Usuarios</h2>
        </div>
        <div class="col-4 text-right">
            <form role="form" method="get" action="administration/users">
                <div class="form_group">
                    <div class="row">
                        <div class="col-8">
                            <input name="ranking" class="form-control" type="number" value="0" placeholder="">
                        </div>
                        <div class="col-4 text-left">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="criteria"" value="ASC">
                                  <small>Ascendente</small>
                              </label>
                            </div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="criteria"" value="DESC" checked>
                                  <small>Descendente</small>
                              </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr style="height: 15px">
    <br>
    <div class="row">
    <?php array_walk($this->users, function($user) { ?>
        <div class="col-4" style="margin-bottom: 15px;">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-4">
                            <img src="<?= $user['profilePicture'] ?>" class="rounded img-fluid cmd_zoomin"  style="max-height: 250px; width: auto; ">
                        </div>
                        <div class="col-8">
                            <h5><?= $user['completeName'] ?></h5>
                            <span class="badge badge-pill badge-danger"><i class="fa fa-star"></i><?= $user['reputation'] ?></span>
                            <span class="badge badge-pill badge-danger"><i class="fa fa-star"></i><?= $user['points'] ?>Punto/s </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }); ?>
</div>
