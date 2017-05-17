<!DOCTYPE html>
<html>
  <?php $this->include('overall/header'); ?>
  <body>
    <?php $this->include('overall/topnav'); ?>
    <div class="cmd_jumbotron"><div class="cmd_container"></div></div>
    <div class="container">
      <!-- upper section -->
      <div class="row">
        <div class="col-sm-3">
          <!-- left -->
          <h3><i class="glyphicon glyphicon-briefcase"></i> Options</h3>
          <hr>
          <ul id="options" class="nav nav-stacked">
            <li><a href="<?php echo URL; ?>"><i class="glyphicon glyphicon-home"></i> Principal</a></li>
            <li><a href="management"><i class="glyphicon glyphicon-link"></i> Management </a></li>
            <li><a><i class="glyphicon glyphicon-list-alt"></i> Option 3</a></li>
            <li><a><i class="glyphicon glyphicon-book"></i> Option 4</a></li>
            <li><a><i class="glyphicon glyphicon-briefcase"></i> Option 5</a></li>
            <li><a><i class="glyphicon glyphicon-time"></i> Option 6</a></li>
          </ul>
          <hr>
        </div><!-- /span-3 -->
        <div class="col-sm-9">
          <!-- column 2 -->
           <h3><i class="glyphicon glyphicon-dashboard"></i> Welcome: <?php echo $this->sessions->connected_user()['name'] ?></h3>
           <hr>
           <div class="row">
              <!-- center left-->
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Website Overview</h3>
                  </div>
                  <div class="panel-body">
                    <div class="col-md-3">
                      <div class="dash-box">
                        <h2>
                          <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                          <?php echo count(Users()); ?>
                        </h2>
                        <h4>Users</h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="dash-box">
                        <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 12</h2>
                        <h4>Pages</h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="dash-box">
                        <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 33</h2>
                        <h4>Posts</h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="dash-box">
                        <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
                        <h4>Visitors</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading"><h4> Users Management</h4></div>
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table class="table table-striped">
                          <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Registration Date</th>
                            <th>Role</th>
                            <th>Action</th>
                          </tr>
                          <?php
                            $HTML = ''; $_users = Users();
                            foreach ($_users as $id => $content_array) {
                              $HTML .= '<tr>
                                <td><p>'.$_users[$id]['name'].'</p></td>
                                <td><p>'.$_users[$id]['surname'].'</p></td>
                                <td><p>'.$_users[$id]['email'].'</p></td>
                                <td><p>'.$_users[$id]['reg_date'].'</p></td>
                                <td><p>'.$_users[$id]['role'].'</p></td>
                                <td><div class="btn-group">
                                  <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    <li><a onclick=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a></li>
                                    <li><a onclick=""><i class="fa fa-times" aria-hidden="true"></i>  Delete</a></li>
                                  </ul>
                                </div></td></tr>';
                            }
                            echo $HTML;
                          ?>
                        </table>
                      </div>
                      <a href="#" class= "text-center"><strong> Detailed user list</strong></a>
                  </div><!--/panel-body-->
              </div><!--/panel-->
            </div><!--/col-->
          </div><!--/row-->
        </div><!--/col-span-9-->
      </div><!--/row-->
    </div><!--/container-->
    <!-- /Main -->
    <div class="cmd_jumbotron" style="background-color: rgba(0,0,0,0);"><div class="cmd_container"></div></div>
    <?php
      $this->include('overall/footer');
    ?>
  </body>
</html>
