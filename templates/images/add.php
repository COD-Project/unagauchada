<!DOCTYPE html>
<html>
	<?php $this->render('overall/header'); ?>
<body>
	<?php $this->render('overall/topnav'); ?>
	<div class="below-topnav"></div>
  <div class="container">
    <div class="cmd_form_container">
      <div class="wrap">
        <form name="cmd_form" class="cmd_form" action="imagenes/add" method="post">
            <div class="cmd_input-group">
              <input type="file" id="path" onchange="handleFiles(this.files)">
            </div>
          <input type="submit" id="btn-submit" value="Add">
        </form>
      </div>
    </div>
  </div>
  <?php $this->render('overall/footer'); ?>
</body>
</html>
