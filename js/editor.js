
  /** Default editor configuration **/
  $('.simple-editor')
  .trumbowyg({
    btns: [
    ['viewHTML'], //order of buttons showing on the wysiwyg
    ['formatting'],
    'btnGrp-semantic'

  ]
  })
  .on('dblclick', function(){
    $(this).trumbowyg();
  });
  //adding attribute for sending data to the db
  $('textarea.trumbowyg-textarea').attr('name','main_text');
