function postulantconfirm(elem)
{
  Func.$('#postulant_confirm').href = elem;
}

document.addEventListener('DOMContentLoaded', function() {

    let init = () => {
      new WOW().init()
      $(function () {
        $('[data-toggle="popover"]').popover()
      })
    }

    let paralax = () => {
      $(window).scroll(() => {
        var scrollBar = $(window).scrollTop(),
            position = scrollBar * 0.04;

        $('body').css({
          'background-position': '0 ' + position + 'px'
        });
      });
    };

    let scrollTop = () => {
      $('.cmd_gotop').click(() => {
          $('body, html').animate({
              scrollTop: '0px'
          }, 300);
      });

      $(window).scroll(() => {
          if( $(this).scrollTop() > 0 ){
              $('.cmd_gotop').slideDown(300);
          } else {
              $('.cmd_gotop').slideUp(300);
          }
      });
    };

    init();
    paralax();
    scrollTop();

});

//----------------------------------Form Animation------------------------------------------------------------

$(window, document, undefined).ready(function() {

  $('input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  var $ripples = $('.ripples');

  $ripples.on('click.Ripples', function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find('.ripplesCircle');

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + 'px',
      left: x + 'px'
    });

    $this.addClass('is-active');

  });

  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
    $(this).removeClass('is-active');
  });

});
