(function() {
	var promptVals = {};

	tinymce.create('tinymce.plugins.Juizl', {
		init : function(ed, url) {
			ed.addButton('juizlangattr', {
				title : 'Add Lang Attribute',
				cmd : 'langattr',
				image : url + '/attribute-lang.png'
			});
 
			ed.addButton('juizhreflangattr', {
				title : 'Add Hreflang Attribute',
				cmd : 'hreflangattr',
				image : url + '/attribute-hreflang.png'
			});

			ed.addCommand('langattr', function() {
				var selected_text = ed.selection.getContent(),
					return_text   = '';

				// If element already have the attribute, remove it.
				if ( selected_text.length === 0 && ed.selection.getNode().getAttribute('lang') ) {
					ed.selection.getNode().removeAttribute('lang');
					return;
				}

				// If no text selected, try to get the node parent to apply Attr on it
				if ( selected_text.length === 0 ) {
					var element = ed.selection.getNode();

					if ( ! element ) {
						alert( 'No element selected. Select some text.' );
					}
					
					var attrValue = prompt( 'What LANG value to apply on <' + element.nodeName.toLowerCase() + '> element?', promptVals.lang ? promptVals.lang : '' );

					if ( attrValue !== null ) {
						element.setAttribute( 'lang', attrValue );
						promptVals.lang = attrValue;
					} else {
						alert( 'Wrong value for LANG attribute.' );
					}

				}
				// Else apply a SPAN wrapper with the attribute.
				else {
					var attrValue = prompt("What LANG value?", promptVals.lang ? promptVals.lang : '');

					if ( attrValue !== null ) {
						return_text = '<span lang="' + attrValue + '">' + selected_text + '</span>';
						promptVals.lang = attrValue;
						ed.execCommand('mceInsertContent', 0, return_text);
					} else {
						alert( 'Wrong value for LANG attribute.' );
					}
				}
			});

			ed.addCommand('hreflangattr', function() {
				var selected_text = ed.selection.getContent(),
					return_text   = '',
					element       = ed.selection.getNode();

					// If element already have the attribute, remove it.
					if ( selected_text.length === 0 && element.getAttribute('hreflang') ) {
						ed.selection.getNode().removeAttribute('hreflang');
						return;
					}

					// Apply the hreflang attribute only on anchors.
					if ( element.nodeName === 'A') {
						var attrValue = prompt( 'What HREFLANG value?', promptVals.hreflang ? promptVals.hreflang : '');
						if (attrValue !== null) {
							element.setAttribute( 'hreflang', attrValue );
							promptVals.hreflang = attrValue;
						} else {
							alert( 'Wrong value for HREFLANG attribute.' );
						}
					} else {
						alert( 'HREFLANG only works on anchor elements.' );
					}
			});

			// Make the button active when the pointer is on an [lang] element.
			ed.on('nodechange', function() {
				let element = this.selection.getNode();
				
				if ( element.getAttribute('lang') ) {
					let langbtn = this.container.querySelector('i[style*="attribute-lang.png"]');

					if ( langbtn ) {
						langbtn.closest('.mce-btn').classList.add('mce-active');
						langbtn.closest('.mce-btn').setAttribute('aria-pressed', 'true');
					}
				}

				if ( !element.getAttribute('lang') ) {
					let langbtn = this.container.querySelector('i[style*="attribute-lang.png"]');

					if ( langbtn ) {
						langbtn.closest('.mce-btn').classList.remove('mce-active');
						langbtn.closest('.mce-btn').setAttribute('aria-pressed', 'false');
					}
				}

				if ( element.getAttribute('hreflang') ) {
					let hlangbtn = this.container.querySelector('i[style*="attribute-hreflang.png"]');

					if ( hlangbtn ) {
						hlangbtn.closest('.mce-btn').classList.add('mce-active');
						hlangbtn.closest('.mce-btn').setAttribute('aria-pressed', 'true');
					}
				}

				if ( !element.getAttribute('hreflang') ) {
					let hlangbtn = this.container.querySelector('i[style*="attribute-hreflang.png"]');

					if ( hlangbtn ) {
						hlangbtn.closest('.mce-btn').classList.remove('mce-active');
						hlangbtn.closest('.mce-btn').setAttribute('aria-pressed', 'false');
						element.classList.remove('juizl-mce-node-selected');
					}
				}
			});

		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
				longname : 'Juiz Lang Attribue',
				author : 'Geoffrey Crofte',
				authorurl : 'https://geoffrey.crofte.fr/en/',
				infourl : '',
				version : "1.0"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add( 'juizl', tinymce.plugins.Juizl );
})();