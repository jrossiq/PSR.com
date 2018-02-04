$( document ).ready(function() {

  $('.sel-countries').change(function() {
    if($(this).val() != 1){
      $('.sel-provinces').hide();
    }else{
      $('.sel-provinces').show();
    }
  });

  $('.select-provinces').change(function() { //use on if jQuery 1.7+

      var id = $(this).val();
      var url = "/polls/selectProvince/" + id;
      var oldPollsAr = $('.old-polls-ar');
      oldPollsAr.hide();
      var data = "id=" + id;

      $.get({
        type: "GET",
        url: url,
        success: function(data){
            var polls = data.polls;
            var row;
            var tableAr = $('.table-ar');
            if(polls.length > 0){
              $.each(polls, function(index, poll){
                row = "<tr class='old-polls-ar'>";
                  row += "<td><a href='/backend/polls/" + poll.id + "'>" + poll.name + " " + poll.lastname + "</a></td>";
                  row += "<td>" + poll.city + "</td>";
                  row += "<td>" + poll.email + "</td>";
                  row += "<td>" + poll.telephone + "</td>";
                  row += "<td>" + poll.date + "</td>";
                  row += "<td>" + poll.contacted + "</td>";
                row += "</tr>";
                tableAr.append(row);
              });
            }else{
              row = "<tr class='old-polls-ar'><td colspan='6'><h4> No hay contactos</h4></td></tr>";
              tableAr.append(row);
            }
        }
      });
    });

    $('.select-countries').change(function() { //use on if jQuery 1.7+

        var id = $(this).val();
        var url = "/polls/selectCountry/" + id;
        var oldPollsEx = $('.old-polls-ex');
        oldPollsEx.hide();
        var data = "id=" + id;

        $.get({
          type: "GET",
          url: url,
          success: function(data){
              var polls = data.polls;
              var row;
              var tableEx = $('.table-ex');
              if(polls.length > 0){
                $.each(polls, function(index, poll){
                  row = "<tr class='old-polls-ex'>";
                    row += "<td><a href='/backend/polls/" + poll.id + "'>" + poll.name + " " + poll.lastname + "</a></td>";
                    row += "<td>" + poll.city + "</td>";
                    row += "<td>" + poll.email + "</td>";
                    row += "<td>" + poll.telephone + "</td>";
                    row += "<td>" + poll.date + "</td>";
                    row += "<td>" + poll.contacted + "</td>";
                  row += "</tr>";
                  tableEx.append(row);
                });
              }else{
                row = "<tr class='old-polls-ex'><td colspan='6'><h4> No hay contactos</h4></td></tr>";
                tableEx.append(row);
              }
          }
        });
      });


  $('#myTabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  });

  //JS para Tipo Tags
  $(".tags").select2();
  $(".zones").select2();
  $(".provinces").select2();
  $(".countries").select2();

  //JS para Text Editor
  tinymce.init({
  selector: '.text',
  language: 'es',
  height: 500,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample | fontsizeselect',
  image_advtab: true,
  fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });

  //Generar el link a partir del Título de un artículo
    $('#title').focusout(function(){
      var url = $('.title').val();
      $('.url').val(ToSeoUrl(url));
    });
    //Por las dudas se intente cambiar
    $('.url').focusout(function(){
      var url = $('.url').val();
      $('.url').val(ToSeoUrl(url));
    });

    $('.video_id').focusout(function(){
      var url = $('.video_id').val();
      $('.video_id').val(getParameterByName('v',url));
    });

    var chars = $('textarea[name="social_desc"]').val().length;
    $('.social-count').text(chars);

    $('textarea[name="social_desc"]').keyup(function(){
      var chars = $('textarea[name="social_desc"]').val().length;
      $('.social-count').text(chars);
    });

    function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}


function ToSeoUrl(url) {

  // make the url lowercase
  var encodedUrl = url.toString().toLowerCase();
  encodedUrl = accentsTidy(url);

  // replace & with and
  encodedUrl = encodedUrl.split(/\&+/).join("-and-")

  // remove invalid characters
  encodedUrl = encodedUrl.split(/[^a-z0-9]/).join("-");

  // remove duplicates
  encodedUrl = encodedUrl.split(/-+/).join("-");

  // trim leading & trailing characters
  encodedUrl = encodedUrl.trim('-');

  return encodedUrl;
}

function accentsTidy(str){
  str = str.replace(/^\s+|\s+$/g, ''); // trim
str = str.toLowerCase();

// remove accents, swap ñ for n, etc
var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
var to   = "aaaaeeeeiiiioooouuuunc------";
for (var i=0, l=from.length ; i<l ; i++) {
str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
}

str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
.replace(/\s+/g, '-') // collapse whitespace and replace by -
.replace(/-+/g, '-'); // collapse dashes

return str;
                };

    //Ocultar Mensajes después de 2 segundos
    if($('.message')){
      var message = $('.message');
      setTimeout(function(){
        message.fadeOut( "slow" );
      }, 2000);
    }

    //Ocultar o Mostrar Select de seccion principal
    if($('.level')){
      $('.level').change(function(){
        if($('.level option:selected').val() == 2){
          $('.principal').show();
        }else{
          $('.principal').hide();
        }
      });
    }

    //Ocultar o Mostrar Select de seccion principal en la pagina de edicion
    if($('.level')){
      if($('.level option:selected').val() == 2){
        $('.principal').show();
      }
      $('.level').change(function(){
        if($('.level option:selected').val() == 2){
          $('.principal').show();
        }else{
          $('.principal').hide();
        }
      });
    }

    //Checkear descheckear checkbox de Destacado
    // $('.dest').click(function(){
    //   if($(this).prop('checked', true)){
    //     $(this).prop('checked', false);
    //   }else{
    //     $(this).prop('checked', true);
    //   }
    // });

    //Agregar Tag
    $('.saveNewTag').click(function(){
      var newTag = $('.newTag').val();
        $('.newTag').val('');
      var url = '/backend/tags/create/'+ newTag;
        $.ajax({
              type: "GET",
              url: url,
              data: newTag, // serializes the form's elements.
              success: function(data)
              {
                $('.tags').append($('<option>', {
                    value: data.id,
                    text : data.name
                }));
              }
        });
    });

});
