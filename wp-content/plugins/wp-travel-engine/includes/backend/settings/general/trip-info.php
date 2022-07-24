<?php
/**
 * Trip info tab settings / content.
 *
 * @package WP_Travel_Engine
 */
// Get settings.
$wp_travel_engine_settings = get_option( 'wp_travel_engine_settings', true );
?>
<div class="wpte-repeater-wrap">
	<div class="wpte-repeater-heading">
		<div class="wpte-repeater-title"><?php esc_html_e( 'Field Name', 'wp-travel-engine' ); ?></div>
		<div class="wpte-repeater-title"><?php esc_html_e( 'Field Icon', 'wp-travel-engine' ); ?></div>
		<div class="wpte-repeater-title"><?php esc_html_e( 'Field Type', 'wp-travel-engine' ); ?></div>
		<div class="wpte-repeater-title"><?php esc_html_e( 'Field Placeholder', 'wp-travel-engine' ); ?></div>
		<div class="wpte-repeater-title"></div>
	</div>

	<div class="wpte-repeater-block-holder wpte-glb-trp-infos-holdr">
		<?php
		if ( ! empty( $wp_travel_engine_settings['trip_facts'] ) ) {

			// Get vars
			$trip_facts = $wp_travel_engine_settings['trip_facts'];
			$arr_keys   = array_keys( $trip_facts['field_id'] );
			$len        = sizeof( $wp_travel_engine_settings['trip_facts']['field_id'] );
			$i          = 1;

			foreach ( $arr_keys as $key => $value ) {
				$fact_icon = isset( $wp_travel_engine_settings['trip_facts']['field_icon'][ $value ] ) ? esc_attr( $wp_travel_engine_settings['trip_facts']['field_icon'][ $value ] ) : '';
				?>
						<div class="wpte-repeater-block wpte-sortable wpte-glb-trp-infos-row">
							<div class="wpte-field">
								<input type="hidden" name="wp_travel_engine_settings[trip_facts][fid][<?php echo esc_attr( $value ); ?>]" value="<?php echo isset( $wp_travel_engine_settings['trip_facts']['fid'][ $value ] ) ? esc_attr( $wp_travel_engine_settings['trip_facts']['fid'][ $value ] ) : ''; ?>">
								<input type="text" name="wp_travel_engine_settings[trip_facts][field_id][<?php echo esc_attr( $value ); ?>]" value="<?php echo isset( $wp_travel_engine_settings['trip_facts']['field_id'][ $value ] ) ? esc_attr( $wp_travel_engine_settings['trip_facts']['field_id'][ $value ] ) : ''; ?>" required>
							</div>
							<div class="wpte-icons-holder wpte-floated">
								<button class="wpte-add-icon"><?php echo ! empty( $fact_icon ) ? esc_html__( 'Update fact icon', 'wp-travel-engine' ) : esc_html__( 'Add fact icon', 'wp-travel-engine' ); ?></button>
								<span class="wpte-icon-preview">
									<span class="wpte-icon-holdr">
										<i class="<?php echo ! empty( $fact_icon ) ? esc_attr( $fact_icon ) : ''; ?>"></i>
									</span>
									<button class="wpte-remove-icn-btn"><?php echo esc_html( 'Remove' ); ?></button>
								</span>
								<input class="trip-tabs-icon" type="hidden" name="wp_travel_engine_settings[trip_facts][field_icon][<?php echo esc_attr( $value ); ?>]" value="<?php echo esc_attr( $fact_icon ); ?>">
							</div>
							<div class="wpte-trp-inf-fieldtyp wpte-field">
								<select id="wp_travel_engine_settings[trip_facts][field_type][<?php echo esc_attr( $value ); ?>]" name="wp_travel_engine_settings[trip_facts][field_type][<?php echo esc_attr( $value ); ?>]" data-placeholder="<?php esc_attr_e( 'Choose a field type&hellip;', 'wp-travel-engine' ); ?>" class="wc-enhanced-select">
										<option value=" "><?php esc_html_e( 'Choose input type&hellip;', 'wp-travel-engine' ); ?></option>
								<?php
									$obj            = new Wp_Travel_Engine_Functions();
									$fields         = $obj->trip_facts_field_options();
									$selected_field = esc_attr( $wp_travel_engine_settings['trip_facts']['field_type'][ $value ] );
								foreach ( $fields as $key => $val ) {
									echo '<option value="' . ( ! empty( $key ) ? esc_attr( $key ) : 'Please select' ) . '" ' . selected( $selected_field, $val, false ) . '>' . esc_html( $key ) . '</option>';
								}
								?>
								</select>
							</div>
							<div class="wpte-field">
								<div class="select-options">
									<textarea id="wp_travel_engine_settings[trip_facts][select_options][<?php echo esc_attr( $value ); ?>]" name="wp_travel_engine_settings[trip_facts][select_options][<?php echo esc_attr( $value ); ?>]" rows="2" cols="25" required placeholder="<?php esc_attr_e( 'Enter drop-down values separated by commas', 'wp-travel-engine' ); ?>"><?php echo isset( $wp_travel_engine_settings['trip_facts']['select_options'][ $value ] ) ? esc_html( $wp_travel_engine_settings['trip_facts']['select_options'][ $value ] ) : ''; ?></textarea>
								</div>
								<div class="input-placeholder">
									<input type="text" name="wp_travel_engine_settings[trip_facts][input_placeholder][<?php echo esc_attr( $value ); ?>]" value="<?php echo isset( $wp_travel_engine_settings['trip_facts']['input_placeholder'][ $value ] ) ? esc_attr( $wp_travel_engine_settings['trip_facts']['input_placeholder'][ $value ] ) : ''; ?>">
								</div>
							</div>
							<div class="wpte-system-btns">
								<button class="wpte-delete wpte-remove-glb-ti"></button>
							</div>
						</div>
					<?php
			}
		}
		?>
	</div>
</div> <!-- .wpte-repeater-wrap -->
<div class="wpte-add-btn-wrap">
	<button class="wpte-add-btn wpte-add-glb-trp-info"><?php esc_html_e( 'Add trip info', 'wp-travel-engine' ); ?></button>
</div>
<script type="text/html" id="tmpl-wpte-add-trip-info-block">
	<div class="wpte-repeater-block wpte-sortable wpte-glb-trp-infos-row">
		<div class="wpte-field">
			<input type="hidden" name="wp_travel_engine_settings[trip_facts][fid][{{data.key}}]" value="{{data.key}}">
			<input type="text" name="wp_travel_engine_settings[trip_facts][field_id][{{data.key}}]" value="" required>
		</div>
		<div class="wpte-icons-holder wpte-floated">
			<button class="wpte-add-icon"><?php echo esc_html__( 'Add fact icon', 'wp-travel-engine' ); ?></button>
			<span class="wpte-icon-preview">
				<span class="wpte-icon-holdr">
					<i class=""></i>
				</span>
				<button class="wpte-remove-icn-btn"><?php echo esc_html( 'Remove' ); ?></button>
			</span>
			<input class="trip-tabs-icon" type="hidden" name="wp_travel_engine_settings[trip_facts][field_icon][{{data.key}}]" value="">
		</div>
		<div class="wpte-trp-inf-fieldtyp wpte-field">
			<select id="wp_travel_engine_settings[trip_facts][field_type][{{data.key}}]" name="wp_travel_engine_settings[trip_facts][field_type][{{data.key}}]" data-placeholder="<?php esc_attr_e( 'Choose a field type&hellip;', 'wp-travel-engine' ); ?>" class="wc-enhanced-select">
					<option value=" "><?php esc_html_e( 'Choose input type&hellip;', 'wp-travel-engine' ); ?></option>
				<?php
					$obj    = new Wp_Travel_Engine_Functions();
					$fields = $obj->trip_facts_field_options();
				foreach ( $fields as $key => $val ) {
					echo '<option value="' . ( ! empty( $key ) ? esc_attr( $key ) : 'Please select' ) . '">' . esc_html( $key ) . '</option>';
				}
				?>
			</select>
		</div>
		<div class="wpte-field">
			<div style="display:none" class="select-options">
				<textarea id="wp_travel_engine_settings[trip_facts][select_options][{{data.key}}]" name="wp_travel_engine_settings[trip_facts][select_options][{{data.key}}]" rows="2" cols="25" required placeholder="<?php esc_attr_e( 'Enter drop-down values separated by commas', 'wp-travel-engine' ); ?>"></textarea>
			</div>
			<div class="input-placeholder">
				<input type="text" name="wp_travel_engine_settings[trip_facts][input_placeholder][{{data.key}}]" value="">
			</div>
		</div>
		<div class="wpte-system-btns">
			<button class="wpte-delete wpte-remove-glb-ti"></button>
		</div>
	</div>
</script>
<div>
	<h2 class="wpte-lrf-title"><?php esc_html_e( 'Minimum/Maximum Age Icon', 'wp-travel-engine' ); ?></h2>
	<?php
	if ( isset( $wp_travel_engine_settings['trip_minimum_age_icon'] ) && ! empty( $wp_travel_engine_settings['trip_minimum_age_icon'] ) ) {
		$trip_minimum_age_icon = esc_attr( $wp_travel_engine_settings['trip_minimum_age_icon'] );
	} elseif ( ! isset( $wp_travel_engine_settings['trip_minimum_age_icon'] ) ) {
		$trip_minimum_age_icon = 'fas fa-child';
	} else {
		$trip_minimum_age_icon = '';
	}

	if ( isset( $wp_travel_engine_settings['trip_maximum_age_icon'] ) && ! empty( $wp_travel_engine_settings['trip_maximum_age_icon'] ) ) {
		$trip_maximum_age_icon = esc_attr( $wp_travel_engine_settings['trip_maximum_age_icon'] );
	} elseif ( ! isset( $wp_travel_engine_settings['trip_maximum_age_icon'] ) ) {
		$trip_maximum_age_icon = 'fas fa-male';
	} else {
		$trip_maximum_age_icon = '';
	}
	?>
	<div class="wpte-field wpte-icons-holder wpte-floated">
		<label class="wpte-field-label" for="wp_travel_engine_settings[trip_minimum_age_icon]"><?php esc_html_e( 'Minimum Age Icon', 'wp-travel-engine' ); ?></label>
		<button class="wpte-add-icon"><?php echo esc_html__( 'Minimum Age Icon', 'wp-travel-engine' ); ?></button>
		<span class="wpte-icon-preview">
			<span class="wpte-icon-holdr">
				<i class="<?php echo esc_attr( $trip_minimum_age_icon ); ?>"></i>
			</span>
			<button class="wpte-remove-icn-btn"><?php echo esc_html( 'Remove' ); ?></button>
		</span>
		<input type="hidden" class="trip-tabs-icon" name="wp_travel_engine_settings[trip_minimum_age_icon]" value="<?php echo esc_attr( $trip_maximum_age_icon ); ?>">
	</div>
	<div class="wpte-field wpte-icons-holder wpte-floated">
		<label class="wpte-field-label" for="wp_travel_engine_settings[trip_maximum_age_icon]"><?php esc_html_e( 'Maximum Age Icon', 'wp-travel-engine' ); ?></label>
		<button class="wpte-add-icon"><?php echo esc_html__( 'Maximum Age Icon', 'wp-travel-engine' ); ?></button>
		<span class="wpte-icon-preview">
			<span class="wpte-icon-holdr">
				<i class="<?php echo esc_attr( $trip_maximum_age_icon ); ?>"></i>
			</span>
			<button class="wpte-remove-icn-btn"><?php echo esc_html( 'Remove' ); ?></button>
		</span>
		<input type="hidden" class="trip-tabs-icon" name="wp_travel_engine_settings[trip_maximum_age_icon]" value="<?php echo esc_attr( $trip_maximum_age_icon ); ?>">
	</div>
</div>
<!-- Global Trip Highlights -->
<div>
	<h2><?php echo esc_html__( 'Global Trip Highlights', 'wp-travel-engine' ); ?></h2>
	<input type="hidden" name="wp_travel_engine_settings[trip_highlights]">
	<ul id="wte-trip-higlights-holder">
	</ul>
	<div class="wpte-add-btn-wrap">
		<button class="wpte-add-btn wpte-add-trip-highlights"><?php esc_html_e( 'Add trip highlight', 'wp-travel-engine' ); ?></button>
	</div>
	<script type="text/html" id="tmpl-wpte-highlight-item">
	<#
		var index = data.index,
		highlight = data.highlight,
		help = data.helpText;
	#>
		<li style="display:flex" id="wte-highlight-{{index}}">
			<div class="wpte-field wpte-floated" style="flex:0 0 25%;">
				<input type="text" name="wp_travel_engine_settings[trip_highlights][{{index}}][highlight]" value="{{highlight}}" placeholder="<?php echo esc_attr__( 'Trip highlight', 'wp-travel-engine' ); ?>"/>
			</div>
			<div class="wpte-field wpte-floated" style="flex:0 0 25%; margin-left: 15px;">
				<input type="text" name="wp_travel_engine_settings[trip_highlights][{{index}}][help]" value="{{help}}" placeholder="<?php echo esc_attr__( 'Help Text', 'wp-travel-engine' ); ?>"/>
			</div>
			<button class="wpte-delete wpte-delete-trip-highlights" data-target="#wte-highlight-{{index}}"></button>
		</li>
	</script>
	<?php
	$highlights     = isset( $wp_travel_engine_settings['trip_highlights'] ) && is_array( $wp_travel_engine_settings['trip_highlights'] ) ? $wp_travel_engine_settings['trip_highlights'] : array();
	$var_highlights = 'var highlights = ' . wp_json_encode( $highlights ) . ";\n";
	?>
	<script>
		;(function() {
			<?php echo $var_highlights; // phpcs:ignore ?>
			var highlightHolder = document.getElementById( 'wte-trip-higlights-holder' );
			var addBtn = document.querySelector( '.wpte-add-trip-highlights' );

			document.addEventListener('click', function(e) {
				if( e.target.classList.contains('wpte-delete-trip-highlights') )
					document.querySelector(e.target.dataset.target).remove()
			})
			addBtn.addEventListener('click', function(e) {
				e.preventDefault()
				var hlCounts = highlightHolder.querySelector('li') && highlightHolder.querySelectorAll('li').length || 0
				var div = document.createElement('div')
				div.innerHTML = wp.template('wpte-highlight-item')({
					index: hlCounts,
					highlight: '',
					help: ''
				})
				highlightHolder.appendChild(div.firstElementChild)
			})

			window.addEventListener('load', function() {
				var index = 0;
				var _html = Object.values(highlights).length > 0 && Object.values( highlights ).reduce(function(acc, curr){
					var _acc = ''
					if(typeof acc !== 'string') {
						_acc = wp.template('wpte-highlight-item')({
							index: index,
							highlight: acc.highlight,
							helpText: acc.help
						}) + window.wp.template('wpte-highlight-item')({
							index: ++index,
							highlight: curr.highlight,
							helpText: curr.help
						})
						return _acc
					}
					return acc + window.wp.template('wpte-highlight-item')({
							index: ++index,
							highlight: curr.highlight,
							helpText: curr.help
						})
				}) || ''

				highlightHolder.innerHTML = _html
			})
		})();
	</script>
</div>
<?php
