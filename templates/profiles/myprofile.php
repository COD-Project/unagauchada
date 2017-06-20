<!DOCTYPE html>
<html>
  <?php $this->include('overall/header'); ?>
  <body>
    <?php $this->include('overall/topnav'); ?>
    <div class="" style="background-color: transparent; padding-top: 125px;"></div>
    <div class="container">
        <div class="row m-y-2">
          <div class="col-lg-4 text-center">
              <img src="//placehold.it/150" class="m-x-auto img-fluid" style="border-radius: 50%;" alt="avatar">
              <h6 class="m-t-2">Upload a different photo</h6>
              <label class="custom-file">
                  <input type="file" id="file" class="custom-file-input">
                  <span class="custom-file-control">Choose file</span>
              </label>
          </div>
          <div class="col-lg-8">
              <ul class="nav nav-pills nav-fill" style="margin-bottom: 15px;">
                  <li class="nav-item">
                      <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                  </li>
                  <li class="nav-item">
                      <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Messages</a>
                  </li>
                  <li class="nav-item">
                      <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                  </li>
              </ul>
              <div class="tab-content p-b-3">
                  <div class="tab-pane active" id="profile">
                      <h4 class="m-y-2">User Profile</h4>
                      <div class="row">
                          <div class="col-md-6">
                              <h6>About</h6>
                              <p>
                                  Web Designer, UI/UX Engineer
                              </p>
                              <h6>Hobbies</h6>
                              <p>
                                  Indie music, skiing and hiking. I love the great outdoors.
                              </p>
                          </div>
                          <div class="col-md-6">
                              <h6>Recent Tags</h6>
                              <a href="" class="tag tag-default tag-pill">html5</a>
                              <a href="" class="tag tag-default tag-pill">react</a>
                              <a href="" class="tag tag-default tag-pill">codeply</a>
                              <a href="" class="tag tag-default tag-pill">angularjs</a>
                              <a href="" class="tag tag-default tag-pill">css3</a>
                              <a href="" class="tag tag-default tag-pill">jquery</a>
                              <a href="" class="tag tag-default tag-pill">bootstrap</a>
                              <a href="" class="tag tag-default tag-pill">responsive-design</a>
                              <hr>
                              <span class="tag tag-primary"><i class="fa fa-user"></i> 900 Followers</span>
                              <span class="tag tag-success"><i class="fa fa-cog"></i> 43 Forks</span>
                              <span class="tag tag-danger"><i class="fa fa-eye"></i> 245 Views</span>
                          </div>
                          <div class="col-md-12">
                              <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Recent Activity</h4>
                              <table class="table table-hover table-striped">
                                  <tbody>
                                      <tr>
                                          <td>
                                              <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                          </td>

                                      </tr>
                                      <tr>
                                          <td>
                                              <strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>
                                              <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                          </td>

                                      </tr>
                                      <tr>
                                          <td>
                                              <strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <!--/row-->
                  </div>
                  <div class="tab-pane" id="messages">
                      <h4 class="m-y-2">Recent Messages &amp; Notifications</h4>
                      <div class="alert alert-info alert-dismissable">
                          <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                      </div>
                      <table class="table table-hover table-striped">
                          <tbody>
                              <tr>
                                  <td>
                                     <span class="pull-xs-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                     <span class="pull-xs-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                     <span class="pull-xs-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus.
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                     <span class="pull-xs-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros eget luctus.
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="tab-pane" id="edit">
                      <h4 class="m-y-2">Edit Profile</h4>
                      <form role="form">
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label">First name</label>
                              <div class="col-lg-9">
                                  <input class="form-control" type="text" value="Jane">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                              <div class="col-lg-9">
                                  <input class="form-control" type="text" value="Bishop">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label">Email</label>
                              <div class="col-lg-9">
                                  <input class="form-control" type="email" value="email@gmail.com">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label">Company</label>
                              <div class="col-lg-9">
                                  <input class="form-control" type="text" value="">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label">Website</label>
                              <div class="col-lg-9">
                                  <input class="form-control" type="url" value="">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label">Address</label>
                              <div class="col-lg-9">
                                  <input class="form-control" type="text" value="" placeholder="Street">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label"></label>
                              <div class="col-lg-6">
                                  <input class="form-control" type="text" value="" placeholder="City">
                              </div>
                              <div class="col-lg-3">
                                  <input class="form-control" type="text" value="" placeholder="State">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                              <div class="col-lg-9">
                                  <select id="user_time_zone" class="form-control" size="0">
                                      <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                      <option value="Alaska">(GMT-09:00) Alaska</option>
                                      <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                      <option value="Arizona">(GMT-07:00) Arizona</option>
                                      <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                      <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                      <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                      <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label">Username</label>
                              <div class="col-lg-9">
                                  <input class="form-control" type="text" value="janeuser">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label">Password</label>
                              <div class="col-lg-9">
                                  <input class="form-control" type="password" value="11111122333">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                              <div class="col-lg-9">
                                  <input class="form-control" type="password" value="11111122333">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-lg-3 col-form-label form-control-label"></label>
                              <div class="col-lg-9">
                                  <input type="reset" class="btn btn-secondary" value="Cancel">
                                  <input type="button" class="btn btn-primary" value="Save Changes">
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <hr>

    <?php $this->include('overall/footer'); ?>
  </body>
</html>
