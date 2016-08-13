/**
 * template.js
 * Author by Dong Nguyen <dongnd@appdev.vn>
 * Copyright(c) 2011-2013 bjTech
*/

var Template = {}

Template.dialog = [
	'<div class="title">',
		'{TITLE}',
		'<span class="close" id="btn_close_dialog">Close</span>',
	'</div>',
	'<div class="content">',
		'<img src="{IMG}">',
		'{TEXT}',
	'</div>'
].join('');
