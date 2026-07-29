/**
 * Adds an "Event Details" panel to the post editor sidebar for schedule events.
 * Vanilla (no build step) — uses the wp.* globals available in the block editor.
 */
( function ( wp ) {
	if ( ! wp || ! wp.plugins || ! wp.element || ! wp.data ) {
		return;
	}

	var el            = wp.element.createElement;
	var Fragment      = wp.element.Fragment;
	var registerPlugin = wp.plugins.registerPlugin;
	var Panel         = ( wp.editor && wp.editor.PluginDocumentSettingPanel ) ||
	                    ( wp.editPost && wp.editPost.PluginDocumentSettingPanel );
	var TextControl   = wp.components.TextControl;
	var SelectControl = wp.components.SelectControl;
	var useSelect     = wp.data.useSelect;
	var useDispatch   = wp.data.useDispatch;
	var __            = wp.i18n ? wp.i18n.__ : function ( s ) { return s; };

	if ( ! Panel ) {
		return;
	}

	function EventPanel() {
		var meta = useSelect( function ( select ) {
			return select( 'core/editor' ).getEditedPostAttribute( 'meta' ) || {};
		}, [] );
		var editPost = useDispatch( 'core/editor' ).editPost;

		function set( key, value ) {
			var patch = {};
			patch[ key ] = value;
			editPost( { meta: Object.assign( {}, meta, patch ) } );
		}

		return el(
			Panel,
			{ name: 'kt-event-details', title: __( 'Event Details — Schedule only', 'kundeling-tatsak' ), className: 'kt-event-details' },
			el( 'p', { style: { color: '#757575', fontSize: '12px', marginTop: 0 } },
				__( 'Fill these in only for schedule events (posts in the "Schedule" category). Leave blank for news.', 'kundeling-tatsak' ) ),
			el( TextControl, {
				label: __( 'Event date', 'kundeling-tatsak' ),
				type: 'date',
				value: meta.kt_event_date || '',
				onChange: function ( v ) { set( 'kt_event_date', v ); }
			} ),
			el( TextControl, {
				label: __( 'End date (optional, multi-day)', 'kundeling-tatsak' ),
				type: 'date',
				value: meta.kt_event_end || '',
				onChange: function ( v ) { set( 'kt_event_end', v ); }
			} ),
			el( TextControl, {
				label: __( 'Venue / location', 'kundeling-tatsak' ),
				value: meta.kt_event_venue || '',
				placeholder: __( 'e.g. Kundeling Monastery, Mundgod', 'kundeling-tatsak' ),
				onChange: function ( v ) { set( 'kt_event_venue', v ); }
			} ),
			el( SelectControl, {
				label: __( 'Type', 'kundeling-tatsak' ),
				value: meta.kt_event_type || '',
				options: [
					{ label: __( '— Select —', 'kundeling-tatsak' ), value: '' },
					{ label: __( 'Teaching', 'kundeling-tatsak' ), value: 'teaching' },
					{ label: __( 'Ceremony', 'kundeling-tatsak' ), value: 'ceremony' },
					{ label: __( 'Event', 'kundeling-tatsak' ), value: 'event' }
				],
				onChange: function ( v ) { set( 'kt_event_type', v ); }
			} )
		);
	}

	registerPlugin( 'kt-event-details', { render: EventPanel, icon: 'calendar-alt' } );
} )( window.wp );
