function resolveHeader() {
    headerH = $(window).width() > 768 ? 80 : 80
}

function resolveSlider() {
    var a = 80,
        o = 762,
        r = 1665,
        e = 762,
        m = $(window).width();
        m = 1410;
    o = e * m / r, a = $(window).height() - a;
    a = Math.min(a, o);
    //$(".extra-slider").css("height", a + "px");
}
var headerH = 80;

$("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});

$('#search-input').keyup(function(){
  var url = $('#search-input').val();
  $('#search').attr('action','/search/'+url);
});

$('#search-input-main').keyup(function(){
  var url = $('#search-input-main').val();
  $('#search-main').attr('action','/search/'+url);
});


$('.contact-form').on('submit', function(e) {
        e.preventDefault();
        var instance = $('.contact-form').parsley();
        if(!instance.isValid())return;

        $('.contact-form button').attr('disabled','disabled');
        var url = "/backend/contacts";
        var data = $(this).serialize();

        $.ajax({
          type: "POST",
          url: url,
          data: data,
          success: function(data)
          {
            $('#form-result').modal();
            $('#form-result .fnombre').text(data.name);
          },
          error: function(data){
            $('.contact-form button').removeAttr('disabled');
          }
        });

    });

$(window).bind("scroll", function() {
    $(window).scrollTop() > headerH ? ($(".site").addClass("fixed"), $(".menu").addClass("navbar-fixed-top")) : ($(".site").removeClass("fixed"), $(".menu").removeClass("navbar-fixed-top"))
});

function resolveSidebar(){
  if($(window).width() > 990){
    $('body').removeClass('portrait');
    infiniteScroll(); //MD BOOTSTRAP
  }
  else{
    $('body').addClass('portrait');
    if($('.list-content').length )$(window).unbind('scroll',fetchPosts);
  }
}


$("document").ready(function() {
    resolveSlider(), resolveHeader(),resolveSidebar();
    $('.contact-form').parsley();

    $(".slider-home").extraSlider({
		type: 'fade',
    auto: 7,
    speed:0.6,
	});

  $(".slider-articulos").extraSlider({
  auto: 7,
  speed:0.6,
  });
  $(".slider-libros").extraSlider({
  auto: 7,
  speed:0.6,
  });
  $(".slider-prensa-videos").extraSlider({auto: false,speed:0.6});
  $(".slider-prensa-articulos").extraSlider({auto: false,speed:0.6});
  $(".slider-prensa-radio").extraSlider({auto: false,speed:0.6});

  $('#search-modal').on('shown.bs.modal', function () {$('#search-modal input').focus();})

  loadImages();
  if($('.list-content').length){
    var page = $('.list-content').data('next-page');
    if(page == null || page == undefined || page == '')$('.verMas').hide();
  }

/*
  $('.slider-libros').on('extra:slider:moveStart', function (e) {

            var url = $('.slider-libros .item').find("img").attr('url');
            $('.slider-libros .item').find("img").attr("src", url); //set value : src = url
        });
*/


});
function loadImages(){
  var imgDefer = document.getElementsByTagName('img');
  for (var i=0; i<imgDefer.length; i++) {
  if(imgDefer[i].getAttribute('data-original')) {
  imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-original'));
  } }
}
$(window).resize(function() {
    resolveSlider(), resolveHeader(),resolveSidebar();
});

function verMasVideos(){
  var page = $('.videos-content').data('next-page');
  if(page !== null && page !== undefined && page !== '') {
    $('.spinner-wrapper').addClass('show');
    $.get({url:'/?page='+page,cache:false}, function(data){
        $('.spinner-wrapper').removeClass('show');
        $('.videos-content').append(data.videos);
      if(data.next_page!=null)  $('.videos-content').data('next-page', ++page);
      else $('.verMasVideos').remove();
      loadImages();
    });
  }
}

function verMasVideosPlataforma(){
  var page = $('.videos-content-plataforma').data('next-page');
  if(page !== null && page !== undefined && page !== '') {
    $('.spinner-wrapper.plataforma').addClass('show');
    $.get({url:'/plataformapsr?page='+page,cache:false}, function(data){
        $('.spinner-wrapper.plataforma').removeClass('show');
        $('.videos-content-plataforma').append(data.videos);
      if(data.next_page!=null)  $('.videos-content-plataforma').data('next-page', ++page);
      else $('.verMasVideos-plataforma').remove();
      loadImages();
    });
  }
}

function showVideo($url){
  //console.log($url);
  var video='<iframe id="ytplayer" type="text/html" width="100%" height="360"';
   video+='  src="http://www.youtube.com/embed/'+$url+'/?autoplay=1&playlist=tLKtSw8JYPI"';
  video+='frameborder="0"></iframe>';
  $('.video-container').append(video);
  $('.video-container').removeClass('hidden');
  $('.btn-video').remove();
}

function showModalVideo($url){
  var video='<iframe id="ytplayer" type="text/html" width="100%" height="360"';
  video+='  src="http://www.youtube.com/embed/'+$url+'/?autoplay=1"';
  video+='frameborder="0"></iframe>"';
  $('.video-container').append(video);
  $('.video-container').removeClass('hidden');
  $('body').addClass('hard-backdrop');
  $('#modal-video').modal();
}

$('#modal-video').on('hidden.bs.modal', function () {
  $('.video-container').empty();
  $('.video-container').addClass('hidden');
  $('body').removeClass('hard-backdrop');
})

function loadContent(){
  var page = $('.list-content').data('next-page');
  if(page == null || page == undefined || page == '') return;

  $('.spinner-wrapper').addClass('show');
  $.get({url:page,cache: false}, function(data){
    //console.log(data.next_page);
    $('.list-content').append(data.content);
    $('.list-content').data('next-page', data.next_page);
    if(data.next_page == null || data.next_page == undefined || data.next_page == '') $('.verMas').hide();
    $('.spinner-wrapper').removeClass('show');
    loadImages();
  });
}



function fetchPosts() {

    var page = $('.list-content').data('next-page');
 //console.log(page);
    if(page !== null && page !== undefined && page !== '') {

        clearTimeout( $.data( this, "scrollCheck" ) );

        $.data( this, "scrollCheck", setTimeout(function() {
            var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 500;

            if(scroll_position_for_posts_load >= $(document).height()) {
                $('.spinner-wrapper').addClass('show');
                $.get({url:page,cache: false}, function(data){
                  //console.log(data.next_page);
                  $('.list-content').append(data.content);
                  $('.list-content').data('next-page', data.next_page);
                  $('.spinner-wrapper').removeClass('show');
                  loadImages();
                });
            }
        }, 350))

    }
}

function infiniteScroll(){
  if($('.list-content').length )$(window).scroll(fetchPosts);
}
