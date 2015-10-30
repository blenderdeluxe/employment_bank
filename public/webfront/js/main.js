function notify(message, type, layout) {

  layout = typeof layout !== 'undefined' ? layout : 'centerRight';
  type = typeof type !== 'undefined' ? type : 'warning';

  noty({
      text        : message,
      type        : type,
      dismissQueue: true,
      layout      : layout,
      closeWith   : ['click'],
      theme       : 'relax',
      maxVisible  : 15,
      animation   : {
          open  : 'fadeIn',
          close : 'fadeOut',
          easing: 'fadeIn',
          speed : 500
      }
  });
}
