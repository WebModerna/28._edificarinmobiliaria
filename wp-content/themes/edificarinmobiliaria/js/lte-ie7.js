/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-home' : '&#xe000;',
			'icon-book' : '&#xe001;',
			'icon-phone' : '&#xe002;',
			'icon-address-book' : '&#xe003;',
			'icon-alarm' : '&#xe004;',
			'icon-coin' : '&#xe005;',
			'icon-calendar' : '&#xe006;',
			'icon-users' : '&#xe007;',
			'icon-expand' : '&#xe008;',
			'icon-contract' : '&#xe009;',
			'icon-menu' : '&#xe00a;',
			'icon-food' : '&#xe00b;',
			'icon-mug' : '&#xe00c;',
			'icon-globe' : '&#xe00d;',
			'icon-attachment' : '&#xe00e;',
			'icon-checkmark' : '&#xe00f;',
			'icon-arrow-up' : '&#xe010;',
			'icon-arrow-down' : '&#xe011;',
			'icon-arrow-right' : '&#xe012;',
			'icon-arrow-left' : '&#xe013;',
			'icon-feed' : '&#xe014;',
			'icon-mail' : '&#xe015;',
			'icon-google-plus' : '&#xe016;',
			'icon-facebook' : '&#xe017;',
			'icon-twitter' : '&#xe018;',
			'icon-tux' : '&#xe019;',
			'icon-apple' : '&#xe01a;',
			'icon-finder' : '&#xe01b;',
			'icon-android' : '&#xe01c;',
			'icon-windows' : '&#xe01d;',
			'icon-windows8' : '&#xe01e;',
			'icon-skype' : '&#xe01f;',
			'icon-linkedin' : '&#xe020;',
			'icon-wordpress' : '&#xe021;',
			'icon-pinterest' : '&#xe022;',
			'icon-html5' : '&#xe023;',
			'icon-css3' : '&#xe024;',
			'icon-opera' : '&#xe025;',
			'icon-IE' : '&#xe026;',
			'icon-firefox' : '&#xe027;',
			'icon-chrome' : '&#xe028;',
			'icon-coffee' : '&#xe029;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};