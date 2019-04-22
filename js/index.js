// JS file for the UI / Home page

(function() {
  $('.btn').click(function() {
    $(this).toggleClass('active');
    return $('.box').toggleClass('open');
  });

}).call(this);

$('.fa-chart-line').on('click', function() {
    window.location = 'https://www.google.com';
});

$('.fa-utensils').on('click', function() {
    window.location = 'https://www.facebook.com';
});

$('.fa-newspaper').on('click', function() {
    window.location = 'https://www.google.com';
});

$('.fa-user').on('click', function() {
    window.location = 'https://www.google.com';
});

$('.fa-sign-out-alt').on('click', function() {
    window.location = 'https://www.google.com';
});

$('.signup').on('click', function() {
    window.location = 'https://www.google.com';
});
