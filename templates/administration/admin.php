<!DOCTYPE html>
<html>
  <?php $this->include('overall/header'); ?>
  <body>

    <nav class="navbar fixed-top navbar-toggleable-sm navbar-inverse bg-warning text-white mb-3">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="flex-row d-flex">
            <a class="navbar-brand mb-1" href="administration" title="Admin Template">Administración</a>
            <button type="button" class="hidden-md-up navbar-toggler" data-toggle="offcanvas" title="Toggle responsive left sidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="collapsingNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#features"></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href=""></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid" id="main">
        <div class="row row-offcanvas row-offcanvas-left ">
            <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
                <ul class="nav flex-column pl-1">
                    <li class="nav-item"><a class="nav-link" href="administration">Principal</a></li>
                    <li class="nav-item"><a class="nav-link" href="administration/analytics">Estadísticas</a></li>
                    <li class="nav-item"><a class="nav-link" href="administration/users">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="administration/gauchadas">Gauchadas</a></li>
                    <li class="divider" style="width: 75%; margin-left: 5%;">
                      <hr/>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="administration/settings">Configuración</a></li>
                </ul>
            </div>
            <!--/col-->

            <div class="col-md-9 col-lg-10 main">

                <div class="row hidden-xs-down">
                  <div class="col-2 text-right">
                    <img src="assets/app/images/logo.png" class="img-fluid" alt="">
                  </div>
                  <div class="col-10 text-left">
                    <h1 class="display-2" style="margin-top: 10px;">
                      Bienvenido, <?php echo $this->admin['name']; ?>
                    </h1>
                  </div>
                </div>

                <hr style="height: 50px;"/>

                <?php $this->renderComponent(); ?>

            <!--/main col-->
            </div>

    </div>
    <!--/.container-->

    <?php $this->include('overall/footer'); ?>
  </body>
</html>
