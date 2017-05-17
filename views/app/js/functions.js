function __(id) {
  return document.getElementById(id);
}

function __tn(elem, tagName) {
  return elem.getElementsByTagName(tagName);
}

function __cn(elem, className) {
  return elem.getElementsByClassName(className);
}

function insertAfter(e, i) {
  if(e.nextSibling){
    e.parentNode.insertBefore(i, e.nextSibling);
  } else {
    e.parentNode.appendChild(i);
  }
}

function DeleteItem(contenido, url) {
  if (window.confirm(contenido)) {
      window.location = url;
  }
}

// CMDForm functions

function getFormData() {
  let nodeList = document.cmd_form.elements,
      data = new Object();
  for (var i = 0; i < (nodeList.length - 1); i++) {
    data[nodeList[i].name] = nodeList[i].value;
  }
  return data;
}

function render_form(elem, inputs, action=null) {
  var container, 
      wrap, 
      form, 
      div, 
      label, 
      input, 
      button, 
      script;

  form = document.createElement('form');
    form.setAttribute("role", "form");
    form.setAttribute("name", "cmd_form");
    form.setAttribute("id", "cmd_form");
    form.setAttribute("class", "cmd_form");
    form.setAttribute("action", "javascript: " + action)

  for (var i = 0; i < inputs.length; i++) {
    // preparing children to append
    div = document.createElement('div');
      div.setAttribute("class", "cmd_input-group");
    input = document.createElement('input');
      input.setAttribute("type", "text");
      input.setAttribute("name", inputs[i]);
    label = document.createElement('label');
      label.innerHTML = inputs[i];
      label.setAttribute("for", inputs[i]);
      label.setAttribute("class", "cmd_label");

    // append generated children
    div.appendChild(input);
    div.appendChild(label);
    form.appendChild(div);
  }

  // preparing children to append
  script = document.createElement('script');
    script.setAttribute("src", "views/app/js/cmd_form.js");
  container = document.createElement('div');
    container.setAttribute("class", "cmd_form_container");
  wrap = document.createElement('div');
    wrap.className = "wrap";
    wrap.style.width = "100%";
  input = document.createElement('input');
    input.setAttribute("type", "submit");
    input.setAttribute("id", "btn-submit");
    input.setAttribute("innerHTML", "Add Option");

  // append generated children
  form.appendChild(input);
  wrap.appendChild(form);
  container.appendChild(wrap);
  container.appendChild(script);
  elem.appendChild(container);

}