<?php
/**
 * BlueCorona Customizer Custom Controls
 *
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Custom Control Base Class
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
	class BlueCorona_Custom_Tracking_Control extends WP_Customize_Control {
		
	}

	class BlueCorona_Tracking_Control extends BlueCorona_Custom_Tracking_Control {
		/**Enqueue our scripts and styles */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
		}
		public function enqueue() {
			wp_enqueue_script('angularjs', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js', array(), false, false);
			wp_enqueue_script( 'bluecorona-custom-controls-js', get_template_directory_uri() . '/custom/js/bc-theme-customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
		}

		/** Render the control in the customizer */
		public function render_content() {
		?>
	      	<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="bc_socialmediaurls" value='<?php echo esc_attr( $this->value() ); ?>' <?php $this->link(); ?> />
  
			<div ng-app="trackingPerPage" ng-controller="TrackingCtrl" >
				<div ng-repeat="field in fields track by $index" >
					<hr>
					<label>Select page</label>
					<?php $options = get_option( 'my_settings' ); ?>
					<select name='my_settings[selected_page]' ng-model="field.pageId">
					    <option value='0'><?php _e('Select a Page', 'textdomain'); ?></option>
					    <?php $pages = get_pages(); ?>
					    <?php foreach( $pages as $page ) { ?>
					        <option value='<?php echo $page->ID; ?>'><?php echo $page->post_title; ?></option>
					    <?php }; ?>
					</select>
					<label>Code</label>
					<textarea ng-model="field.trackingCode" style="width: 100%"></textarea>
					<label>Location</label>
					<div>
						<input type="radio" value="header" name="location{{$index}}" ng-model="field.location">
						<label>Header <&#47;head></label>
						<input type="radio" value="footer" name="location{{$index}}" ng-model="field.location">
						<label>Footer <&#47;body></label>
						<a href="javascript:void(0)" ng-if="($index > 0)" ng-click="removeField($index)" style="padding:5px;font-size:16px;"><strong>x</strong></a>
					</div>
				</div>
				<a href="javascript:void(0)" ng-click="addField()"><b>Add More(+)</b></a>
			</div>
		<?php
		}
	}
}
