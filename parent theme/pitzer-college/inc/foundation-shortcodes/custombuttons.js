//////////////////////////////////////////////////////////////////
// Div shortcode button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.div', {  
        init : function(ed, url) {  
            ed.addButton('div', {  
                title : 'Insert a div',  
                image : url+'/button-div.png',  
                onclick : function() {  
                     ed.selection.setContent('[div class=""][/div]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('div', tinymce.plugins.div);  
})();

//////////////////////////////////////////////////////////////////
// vimeo shortcode button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.vimeo', {  
        init : function(ed, url) {  
            ed.addButton('vimeo', {  
                title : 'Insert a vimeo video',  
                image : url+'/button-vimeo.png',  
                onclick : function() {  
                     ed.selection.setContent('[vimeo number="" title="Link Title"  width="large"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('vimeo', tinymce.plugins.vimeo);  
})();

//////////////////////////////////////////////////////////////////
// youtube shortcode button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.youtube', {  
        init : function(ed, url) {  
            ed.addButton('youtube', {  
                title : 'Insert a youtube video',  
                image : url+'/button-youtube.png',  
                onclick : function() {  
                     ed.selection.setContent('[youtube number="" title="Link Title" width="large"]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('youtube', tinymce.plugins.youtube);  
})();

//////////////////////////////////////////////////////////////////
// flex video - for responsive embedding of vimeo and youtube
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.flex', {  
        init : function(ed, url) {  
            ed.addButton('flex', {  
                title : 'Insert a youtube or vimeo link to embded',  
                image : url+'/button-flex.png',  
                onclick : function() {  
                     ed.selection.setContent('[flex number=]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('flex', tinymce.plugins.flex);  
})();
//////////////////////////////////////////////////////////////////
// break - Forced line break
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.break', {  
        init : function(ed, url) {  
            ed.addButton('break', {  
                title : 'Insert a forced line break',  
                image : url+'/button-break.png',  
                onclick : function() {  
                     ed.selection.setContent('[break]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('break', tinymce.plugins.break);  
})();
//////////////////////////////////////////////////////////////////
// Reveal Modal shortcode button
//////////////////////////////////////////////////////////////////
(function() {  
    tinymce.create('tinymce.plugins.modal', {  
        init : function(ed, url) {  
            ed.addButton('modal', {  
                title : 'Insert a Reveal Modal Pop up',  
                image : url+'/button-modal.png',  
                onclick : function() {  
                     ed.selection.setContent('[modal title="Title Goes Here" number="1" width="medium"] content goes here [/modal]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('modal', tinymce.plugins.modal);  
})();
