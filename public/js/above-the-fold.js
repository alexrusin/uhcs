// If the above the fold section is taller than browser, set its height to auto

$(function () {
  const isHomePage = $('.atf').length > 0;
  const atfSectionHeight = $('.atf > .content').outerHeight() + 10;
  const viewportHeight = $(window).height() - $('.header').outerHeight();

  if (isHomePage) {
    if (atfSectionHeight > viewportHeight) {
      $('.atf').css('height', 'auto');
    }
  }
});

$(function () {
  if ($('.reviews').length > 0) {
    $('.reviews').wookmark({
      offset: 30,
      outerOffset: 0
    });
  }
});


$(function () {
  $('.js-disqus-toggle').on('click', function (e) {
    $(e.target).remove();
    $('.js-disqus-container').removeClass('post-container--alt');
    $('.js-disqus-comments').css('margin', '4rem');

    var d = document, s = d.createElement('script');

    s.src = '//meadio.disqus.com/embed.js';

    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
  });
})
