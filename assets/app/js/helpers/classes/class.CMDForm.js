class CMDForm {
  getData() {
    let nodeList = document.cmd_form.elements,
      data = new Object();
    for (var i = 0; i < (nodeList.length - 1); i++) {
      data[nodeList[i].name] = nodeList[i].value;
    }
    return data;
  }

  render({
    elem,
    inputs,
    submit,
    action = null,
    method = 'post'
  }) {
    var container,
      wrap,
      div,
      label,
      input,
      button,
      script;

    let form = document.createElement('form');
    form.setAttribute("role", "form");
    form.setAttribute("name", "cmd_form");
    form.setAttribute("id", "cmd_form");
    form.setAttribute("class", "cmd_form");
    form.setAttribute("action", action);
    form.setAttribute("method", method)

    for (var i = 0; i < inputs.length; i++) {
      // preparing children to append
      div = document.createElement('div');
      div.setAttribute("class", "cmd_input-group");
      input = document.createElement('input');
      input.setAttribute("type", inputs[i].type);
      input.setAttribute("name", inputs[i].name);
      input.setAttribute("id", inputs[i].name);
      label = document.createElement('label');
      label.innerHTML = inputs[i].inner;
      label.setAttribute("for", inputs[i].name);
      label.setAttribute("class", "cmd_label");

      // append generated children
      div.appendChild(input);
      div.appendChild(label);
      form.appendChild(div);
    }

    // preparing children to append
    script = document.createElement('script');
    script.setAttribute("src", "assets/app/js/helpers/cmd_form.js");
    container = document.createElement('div');
    container.setAttribute("class", "cmd_form_container");
    wrap = document.createElement('div');
    wrap.className = "wrap";
    wrap.style.width = "100%";
    input = document.createElement('input');
    input.setAttribute("type", "submit");
    input.setAttribute("id", "btn-submit");
    input.setAttribute("value", submit);

    // append generated children
    form.appendChild(input);
    wrap.appendChild(form);
    container.appendChild(wrap);
    container.appendChild(script);
    elem.appendChild(container);
  }
}
