<div style="margin-top: 75px">
    <div class="row">
        <div class="col-6 text-left">
            <h2>Usuarios</h2>
        </div>
        <div class="col-6">
            <h1></h1>
        </div>
    </div>
    <hr style="height: 15px">
    <div class="row">
    <?php
    array_walk($this->users, function($user) {
        echo '
        <div class="col-4">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-4">
                            <img src="' . $user['profilePicture'] . '" class="rounded img-fluid cmd_zoomin"  style="max-height: 250px; width: auto; ">
                        </div>
                        <div class="col-8">
                            <h5>' . $user['completeName'] . '</h5>
                            <span class="badge badge-pill badge-danger"><i class="fa fa-star"></i>' . $user['reputation'] . '</span>
                            <span class="badge badge-pill badge-danger"><i class="fa fa-star"></i>' . $user['points'] . 'Punto/s </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    });
    ?>
</div>
