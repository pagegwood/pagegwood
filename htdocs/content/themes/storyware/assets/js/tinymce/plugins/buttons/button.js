(function (tinymce) {

  tinymce.create('tinymce.plugins.storyware.buttons.button', {

    init: function (editor, url) {

      editor.addButton('button', {
        text: 'Button',
        type: 'button',
        icon: false,
        onclick: function () {
          editor.windowManager.open({
            title: 'Customize Your Button',
            body: [
              {
                type: 'textbox',
                name: 'label',
                label: 'Button Label'
              },
              {
                type: 'textbox',
                name: 'url',
                label: 'Button URL'
              },
              {
                type: 'listbox',
                name: 'target',
                label: 'Behavior',
                'values': [
                  { text: 'Open in Same Window', value: '_self' },
                  { text: 'Open New Window', value: '_blank' },
                ]
              },
              {
                type: 'listbox',
                name: 'style',
                label: 'Style',
                'values': [
                  { text: 'Solid Gold', value: 'default' },
                  { text: 'White with Black Border', value: 'hollow' },
                ]
              }],
            onsubmit: function (e) {
              editor.insertContent('&lsqb;sw_button url="' + e.data.url + '" target="' + e.data.target + '" style="' + e.data.style + '"&rsqb;' + e.data.label + '&lsqb;/sw_button&rsqb;');
            }
          });
        }
      });
    },

    createControl: function (n, cm) {

      return null;
    }
  });

  tinymce.PluginManager.add('button', tinymce.plugins.storyware.buttons.button);

})(this.tinymce);
