class Functions {
  $(elem) {
    if (elem.charAt(0) === '#' || elem.charAt(0) === '.') {
      return (elem.charAt(0) === '#') ? 
        document.getElementById(elem.slice(1, elem.length)) : 
        document.getElementsByClassName(elem.slice(1, elem.length));
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

  limitate(elems) {
    elems.forEach( elem => {
      this.$('#' + elem.hash).onkeypress = e => {
        e.target.value = e.target.value.length > elem.value ? e.target.value.substr(0, elem.value) : e.target.value;
        // console.log(e.target.value);
      };
    });
  }
}