function screenSize() {
      var w, h;
      w = (window.innerWidth ? window.innerWidth : (document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body.offsetWidth));
      h = (window.innerHeight ? window.innerHeight : (document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.offsetHeight));
      return {w:w, h:h};
}

function resizeHandler() {    
    var winWidth = screenSize().w;
    var winHeight = screenSize().h;
    
    document.cookie="winwidth=" + winWidth + "; path=/; expires=Mon, 01-Jan-2020 00:00:00 GMT";
    document.cookie="winheight=" + winHeight + "; path=/; expires=Mon, 01-Jan-2020 00:00:00 GMT";
}

resizeHandler();
