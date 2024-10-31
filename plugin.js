( function() {
    tinymce.PluginManager.add( 'add_schema', function( editor, url ) {

        editor.addButton( 'add_schema_button_key', {
            text: 'Schema Tags',
            icon: false,
            title: 'Add schema tag',
            type: 'menubutton',
            menu: [{
                text: 'Itemscope',
                onclick: function() {
                    editor.windowManager.open( {
                        title: 'Select Item Scope',
                        body: [
                                {
                                type: 'textbox', 
                                name: 'itemscope_value', 
                                label: 'Enter Item type name'
                                },

                                {
                                type: 'textbox',
                                name: 'itemscope_text',
                                label: 'Scope Area',
                                multiline: true,
                                minWidth: 300,
                                minHeight: 200,
                                value: tinyMCE.activeEditor.selection.getContent(),
                            }],
                        onsubmit: function( e ) {
                            editor.insertContent( '<p>[itemscope name="' + e.data.itemscope_value + '"]</p>' + e.data.itemscope_text + '<p>[scope_close this ->"'+ e.data.itemscope_value +'"]</p>');
                        }
                    });
                }
            },

            {
                text: 'Itemprop',
                onclick: function() {
                    editor.windowManager.open( {
                        title: 'Select Item Prop',
                        body: [
                                {
                                type: 'textbox', 
                                name: 'itemprop_value', 
                                label: 'Enter Item Prop name'
                                },
                                {
                                type: 'textbox',
                                name: 'itemprop_text',
                                label: 'Itemprop Area',
                                multiline: true,
                                minWidth: 300,
                                minHeight: 100,
                                value: tinyMCE.activeEditor.selection.getContent(),
                                }
                            ],
                        onsubmit: function( e ) {
                            editor.insertContent( '<p>[itemprop name="' + e.data.itemprop_value + '"]</p>' + e.data.itemprop_text + '<p>[itemprop_close this ->"'+ e.data.itemprop_value +'"]</p>');
                        }
                    });
                }
            }


            ] /* menu: */
        });
    });
})();