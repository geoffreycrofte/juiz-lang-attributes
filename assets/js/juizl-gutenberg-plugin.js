( function( wp ) {

	/**
	 * Register LANG Attribute
	 */
	var juizlLangAttribute = function( props ) {
			return wp.element.createElement(
				wp.editor.RichTextToolbarButton, {
					icon: React.createElement( 'svg', {
						height: '64',
						viewBox: '0 0 64 64',
						width: '64',
						xmlns: 'http://www.w3.org/2000/svg'
					}, React.createElement( 'path', {
							d: 'm4.92307692 0h34.46153848c1.2854695 0 2.6103852.45654028 3.5384615 1.38461538.9280763.92807511 1.3846154 2.25299151 1.3846154 3.53846154v14.76923078h14.7692308c2.7076923 0 4.9230769 2.2153846 4.9230769 4.9230769v34.4615385c0 2.7076923-2.2153846 4.9230769-4.9230769 4.9230769h-34.4615385c-2.7076923 0-4.9230769-2.2153846-4.9230769-4.9230769v-14.7692308h-14.76923078c-1.28547003 0-2.61038643-.4565391-3.53846154-1.3846154-.9280751-.9280763-1.38461538-2.252992-1.38461538-3.5384615v-34.46153848c0-1.28547003.45654028-2.61038643 1.38461538-3.53846154.92807511-.9280751 2.25299151-1.38461538 3.53846154-1.38461538zm0 4.92307692v34.46153848h17.23076928l17.2307692-17.2307692v-17.23076928zm14.76923078 4.92307693h4.9230769v2.46153845h9.8461539v4.9230769h-2.8461539c-1.1306708 3.7211675-3.284544 6.8224333-5.6923077 9.3076923.2854277.1110105.7174843.3160837.9230769.3846154l-1.5384615 4.6923077c-.9217809-.3072591-2.1693809-.794336-3.5384615-1.4615384-4.3099065 3.1507249-8.3076923 4.6153846-8.3076923 4.6153846l-1.8461539-4.5384616s2.4513329-1.0716357 5.3846154-3c-2.4133775-1.8043027-4.6923077-4.1668718-4.6923077-7.5384615h4.9230769c0 .8701755 1.266868 2.6450102 3.4615385 4.1538461.1226434.0843173.2588426.1486632.3846154.2307693 2.1246963-1.8991035 4.1313969-4.1801546 5.3076923-6.8461539h-16.53846155v-4.9230769h9.84615385zm23.3201061 24.59246685h-5.4289655v22.9406896h13.8041379l.5627586-4.3034482h-8.937931z',
							fill: 'currentColor'
						})
					),
					title: props.isActive ? 'Remove LANG Attribute' : 'Add LANG Attribute',
					onClick: function() {
						var langVal = null,
							value   = props.value,
							selText = value.text.substring( value.start, value.end );

						if ( 0 === selText.length && ! props.isActive ) {
							alert('You need to select a text');
							return;
						}

						if ( props.isActive ) {
							const activeFormat = wp.richText.getActiveFormat(props.value, 'juiz-lang/lang-attribute');
							
							langVal = activeFormat.attributes.lang;
						}

						langVal = langVal ? langVal : prompt('What HREFLANG value?');

						if ( langVal ) {
							props.onChange( 
								wp.richText.toggleFormat(
									props.value,
									{
										type: 'juiz-lang/lang-attribute',
										attributes: {
											lang : langVal
										}
									}
								)
							);
						}
					},
					isActive: props.isActive,
					className: 'toolbar-button__juizlang'
				}
			);
		};

	wp.richText.registerFormatType(
		'juiz-lang/lang-attribute', {
			title: 'LANG Attribute',
			tagName: 'span',
			className: 'juizlang',
			attributes: {
				lang: 'lang'
			},
			edit: juizlLangAttribute,
		}
	);

} )( window.wp );

// TOTHINK: maybe limit visibility of the button?
// https://wordpress.org/gutenberg/handbook/designers-developers/developers/tutorials/format-api/2-toolbar-button/