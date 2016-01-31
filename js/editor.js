
          /** Default editor configuration **/
          $('.simple-editor')
          .trumbowyg({
              btns: ['btnGrp-semantic']
          })
          .on('dblclick', function(){
              $(this).trumbowyg();
          });
$('textarea.trumbowyg-textarea').attr('name','main_text');
