/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

	config.removePlugins = 'autosave';

	config.extraPlugins = 'uploadimage';
	config.extraPlugins = 'autogrow';

	config.extraPlugins = 'codesnippet';
	config.codeSnippet_languages = {
	    javascript: 'JavaScript',
	    php: 'PHP',
	    css: 'CSS',
	    html: 'HTML',
	    ini: 'INI',
	    json: 'JSON',
	    xml: 'XML'
	};
	config.codeSnippet_theme = 'zenburn';

	config.uploadUrl = 'http://mesa.leanis.in/admin/media/';
	config.imageBrowser_listUrl = "http://mesa.leanis.in/admin/media/json";
};
