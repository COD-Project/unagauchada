document.addEventListener('DOMContentLoaded', () => {
  if(Func.$("#categories_list")) {
    var buttons;
    if(buttons = Func.$(".edit")) {
      for (var i = buttons.length - 1; i >= 0; i--) {
        buttons[i].onclick = function(event) {
          event.preventDefault();
          var href = this.href;
          var div_col_1 = this.parentNode;
          var li = div_col_1.parentNode;
          var category_name = li.children[2].innerHTML;
          console.log(category_name);
          var div_col_7 = li.children[2];
          div_col_7.innerHTML =
          `<form class="form-inline" action="${href}" method="post">
            <div class="row">
              <div class="col-8">
                <input type="text" style="width: 95%;" name="name" placeholder=${category_name} required>
              </div>
              <div class="col-4 text-left">
                <button type="submit" class="btn btn-primary btn-circle"><i class="fa fa-arrow-right"></i></button>
              </div>
            </div>
          </form>`
        };
      }
    }
  }
});
