function openCommentBox(question, idCourse){
  var div = document.getElementById('div_comment_button_' + question);
  while (div.hasChildNodes()) {
    div.removeChild(div.lastChild);
  }

  var div_cmd_form_container = document.createElement("div");
  div_cmd_form_container.setAttribute('class', 'cmd_form_container');

  var div_wrap = document.createElement("div");
  div_wrap.setAttribute('class', 'wrap');

  var form_comment = document.createElement("form");
  form_comment.setAttribute('method',"post");
  if(question === 0){
    form_comment.setAttribute('action',"comments/add/"+ idCourse);
  } else {
    form_comment.setAttribute('action',"comments/addAnswer/"+idCourse+"?idAnswer="+question);
  }
  form_comment.setAttribute('class',"cmd_form");
  form_comment.setAttribute('name', "cmd_form")

  var text_input_div = document.createElement("div");
  text_input_div.setAttribute('class', 'cmd_input-group');

  var text_input = document.createElement("input"); //input element, text
  text_input.setAttribute('type',"text");
  text_input.setAttribute('id', 'body');
  text_input.setAttribute('name',"body");

  var label_input = document.createElement("label");
  label_input.setAttribute('class', 'cmd_label');
  label_input.setAttribute('for', 'body');
  label_input.setAttribute('innerHTML', 'Tu comentario');
  label_input.setAttribute('placeholder', 'Tu comentario');

  text_input_div.appendChild(text_input);
  text_input_div.appendChild(label_input);

  var submit_button = document.createElement("input"); //input element, Submit button
  submit_button.setAttribute('type',"submit");
  submit_button.setAttribute('id', 'btn-submit');
  submit_button.setAttribute('value',"Añadir");

  form_comment.appendChild(text_input_div);
  form_comment.appendChild(submit_button);

  div_wrap.appendChild(form_comment);

  div_cmd_form_container.appendChild(div_wrap);

  main_div = document.getElementById('div_comment_button_' + question.toString());
  main_div.setAttribute('class', 'container col-8');
  main_div.appendChild(div_cmd_form_container);
}
