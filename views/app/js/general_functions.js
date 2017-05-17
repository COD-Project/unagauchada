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
