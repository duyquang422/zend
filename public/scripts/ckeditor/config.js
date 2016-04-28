/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'en';
	//config.uiColor = '#AADC6E';
    config.width = '850px';
    config.height = '320px';
    config.removeButtons = 'Save,Print,Preview,NewPage,Template,Find,Replace,Form,Checkbox,Radio,TextField,Textarea,Select,Button,' +
    'SelectAll,ShowBlocks,About,CreateDiv,SetLanguage,Flash,Smiley,SpecialChar,Iframe,ImageButton,HiddenField,SpellChecker,Anchor';
    config.removePlugins = 'scayt';
    config.toolbar = [
        { name: 'document'		, items : [ 'Source'] },
		{ name: 'clipboard'		, items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing'		, items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
		{ name: 'basicstyles'	, items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript'] },
		{ name: 'paragraph'		, items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv', '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
		{ name: 'links'			, items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert'		, items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
		{ name: 'styles'		, items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors'		, items : [ 'TextColor','BGColor' ] },
		{ name: 'tools'			, items : [ 'Maximize', 'ShowBlocks','-','About' ] }
    ]
};
