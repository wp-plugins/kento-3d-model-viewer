(function() {
tinymce.create('tinymce.plugins.kento_3dmv_mce_button', {
init : function(ed, url){
ed.addButton('kento_3dmv_mce_button', {
title : 'Add 3D models Viewers',
onclick : function() {
var ed = tinyMCE.activeEditor;
ed.focus();
var sel = ed.selection;
var content = sel.getContent();
content='[kento_3dmv width="500" height="400" source="http://example.com/models/sample-model.obj"  ] <br>Parameters:<br>width = any number with (px) or (%) ex: 500px or 100%<br>height = any number with (px) or (%) ex: 500px or 100%<br>source = 3d model obj source link';
sel.setContent(content);
},
image: url + "/kento_3dmv.png"
});
},

});
tinymce.PluginManager.add('kento_3dmv_mce_button', tinymce.plugins.kento_3dmv_mce_button);
})();

