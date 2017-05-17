document.addEventListener('DOMContentLoaded', (function() {
  // verify if cmd_form is defined
  if (document.cmd_form) {
    var cmd_form = document.cmd_form,
        nodeList = cmd_form.elements;

    //Functions

    var validateInputs = function() {
      for (var i = 0; i < nodeList.length; i++) {
        if (nodeList[i].type == "text" || nodeList[i].type == "email" || nodeList[i].type == "password") {
          if (nodeList[i].value == 0) {
            console.log('El campo ' + nodeList[i].name + ' debe estar lleno');
            nodeList[i].className += " cmd_error";
            return false;
          } else {
            nodeList[i].className = nodeList[i].className.replace(" cmd_error","");
          }
        }
      }
      return true;
    };

    var send = function(e){
      if (!validateInputs()) {
        console.log('Inputs were not validated');
        e.preventDefault();
      } else /*if (!validateRadios()) {
        console.log('Radios were not validated');
        e.preventDefault();
      } else if (!validateCheckbox()) {
        console.log('Checkboxes were not validated');
        e.preventDefault();
      } else */ {
        console.log('');
      }
    };

    //Focus & Blur Functions
    var focusInput = function() {
      this.parentElement.children[1].className = "cmd_label cmd_active";
      this.parentElement.children[0].className = this.parentElement.children[0].className.replace("error", "");
    };

    var blurInput = function() {
      if (this.value.length <= 0) {
        this.parentElement.children[1].className = "cmd_label";
        this.parentElement.children[0].className += " cmd_error";
      }
    };

    //Events
    cmd_form.addEventListener("submit", send);

    for (var i = 0; i < nodeList.length; i++) {
      if (nodeList[i].type == "text" || nodeList[i].type == "email" || nodeList[i].type == "password"){
        nodeList[i].addEventListener("focus", focusInput);
        nodeList[i].addEventListener("blur", blurInput);
      }
    }

    for (var i = 0; i < nodeList.length; i++) {
      if (nodeList[i].type == "text" || nodeList[i].type == "email" || nodeList[i].type == "password"){
        if (nodeList[i].value.length > 0) {
          nodeList[i].parentElement.children[1].className = "cmd_label cmd_active";
          nodeList[i].parentElement.children[0].className = nodeList[i].parentElement.children[0].className.replace("error", "");
        }
      }
    }
  }
}()), false);
