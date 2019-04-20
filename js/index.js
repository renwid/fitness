// JS file for the UI / Home page

(function() {
  $('.btn').click(function() {
    $(this).toggleClass('active');
    return $('.box').toggleClass('open');
  });

}).call(this);
