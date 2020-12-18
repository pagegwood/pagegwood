(function (tinymce) {

  tinymce.create('tinymce.plugins.storyware.buttons.mediaEmbed', {

    init : function(editor, url) {

      editor.addButton('mediaEmbed', {
        text: 'Media Embed',
        type: 'button',
        icon: false,
        onclick: function() {
          editor.windowManager.open( {
            title: 'Specify What to Embed',
            body: [
            {
              type: 'textbox',
              name: 'media_url',
              label: 'media URL'
            },
            {type: 'label',
              name: 'mediaHelpText',
              multiline: true,
              style: 'border-top:1px solid #efefef; padding-top: 5px; margin-top: 5px;',
              text: "",
              onPostRender : function() {
                this.getEl().innerHTML =
                  '<span style="font-size:11px; color: #404040;">Use the media Embed Code field if you need to use html to embed an<br>'
                  + ' iframe or type of media that is not supported by WordPress, or to<br>'
                  + ' ensure that custom display parameters remain intact for your embed';
              }
            },
            {
              type: 'textbox',
              name: 'media_html',
              multiline: true,
              rows: 5,
              label: 'media Embed Code'
            },
            {
              type: 'listbox',
              name: 'max_width',
              label: 'Max Width',
              'values': [
                {text: 'None', value: '100%'},
                {text: '700px', value: '700px'},
                {text: '500px', value: '500px'},
                {text: '300px', value: '300px'}
              ]
            },
            {
              type: 'listbox',
              name: 'aspect_ratio',
              label: 'Aspect Ratio',
              'values': [
                {text: '16by9', value: '16by9'},
                {text: '4by3', value: '4by3'},
                {text: '3by1', value: '3by1'},
                {text: '2by1', value: '2by1'},
                {text: '1by1', value: '1by1'}
              ]
            }],
            onsubmit: function( e ) {
              var media_content = null;

              if (e.data.media_url.length > 0 && e.data.media_html.length < 1  ){
                media_content = e.data.media_url;
              }
              else if (e.data.media_html.length > 0) {
                media_content = e.data.media_html;
              }

              editor.insertContent( '&lsqb;sw_media_embed aspect_ratio="' + e.data.aspect_ratio +'" max_width="' + e.data.max_width + '"&rsqb;' + media_content + '&lsqb;/sw_media_embed&rsqb;');
            }
          });
        }
      });
    },

    createControl : function(n, cm) {

      return null;
    }
  });

  tinymce.PluginManager.add('mediaEmbed', tinymce.plugins.storyware.buttons.mediaEmbed);

})(this.tinymce);
