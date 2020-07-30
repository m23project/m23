/**
 * Custom widget that extends off of jQuery UI selectmenu.
 *
 * @see {@link https://jqueryui.com/selectmenu/#custom_render}
 */
$.widget('custom.imgselectmenu', $.ui.selectmenu, {
  /**
   * @see {@link https://api.jqueryui.com/selectmenu/#method-_renderButtonItem}
   */
  _renderButtonItem: function(item) {
    return $('<span>', {
      text: item.label
    }).prepend($('<img>', { "class": "ui-imgselectmenu-img", src: item.element.attr("img") }));
  },

  /**
   * @see {@link https://api.jqueryui.com/selectmenu/#method-_renderItem}
   */
  _renderItem: function($ul, item) {
    var $li = $('<li>');
    var $wrapper = $('<div>', { text: item.label });

    $('<img>', { "class": "ui-imgselectmenu-img", src: item.element.attr("img") }).prependTo($wrapper);
    return $li.append($wrapper).appendTo($ul);
  }
});

// render custom selectmenu
$(document).ready(function(){
  $('.imgselectmenu').imgselectmenu();
});
