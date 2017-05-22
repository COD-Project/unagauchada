class Functions {
  $(elem) {
    if (elem.charAt(0) === '#' || elem.charAt(0) === '.') {
      return (elem.charAt(0) === '#') ? 
        document.getElementById(elem.slice(1, elem.length)) : 
        document.getElementsByTagName(elem.slice(1, elem.length));
    } else {
      return document.getElementsByTagName(elem);
    }
  }

  insertAfter(e, i) {
    if(e.nextSibling){
      e.parentNode.insertBefore(i, e.nextSibling);
    } else {
      e.parentNode.appendChild(i);
    }
  }

  deleteItem(contenido, url) {
    if (window.confirm(contenido)) {
        window.location = url;
    }
  }
}