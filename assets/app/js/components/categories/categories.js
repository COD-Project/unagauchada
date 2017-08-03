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
            <input type="text" name="name" placeholder=${category_name} required>
            <button type="submit" class="btn btn-primary rounded-circle"><i class="fa fa-arrow-right"></i></button>
          </form>`
        };
      }
    }
  }
});
