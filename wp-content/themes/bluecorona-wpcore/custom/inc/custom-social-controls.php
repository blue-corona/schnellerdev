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
	class BlueCorona_Custom_Control extends WP_Customize_Control {
		
	}

	
	/**
	 * Sortable Repeater Custom Control
	 *
	 * @author Anthony Hortin <http://maddisondesigns.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/maddisondesigns
	 */
	class BlueCorona_Sortable_Repeater_Custom_Control extends BlueCorona_Custom_Control {
		/**
		 * Enqueue our scripts and styles
		 */

		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
		}
		public function enqueue() {
			wp_enqueue_script('angularjs', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js', array(), false, false);
			wp_enqueue_script( 'bluecorona-custom-controls-js', get_template_directory_uri() . '/custom/js/bc-theme-customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
			wp_enqueue_script('bc-font-awesome-pro', 'https://kit.fontawesome.com/f6a235ce10.js');
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
		?>
	      	<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="bc_socialmediaurls" value='<?php echo esc_attr( $this->value() ); ?>' <?php $this->link(); ?> />
  
			<div ng-app="customizerSocialMediaUrls" ng-controller="SocialMediaCtrl" >
				<div ng-repeat="field in fields track by $index" >
					<hr>
					<div><strong>{{field.name}}</strong>&nbsp;&nbsp;<i class="{{field.icon}}"></i></div>
					<label class="">URL</label>
					<input type="text" ng-model="field.url">
					<label class="">Icon</label>
					<input type="text" ng-model="field.icon">
					<label class="">Order</label>
					<div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
					<input type="text" ng-model="field.order">
					<a style="padding:5px;font-size:16px;" href="javascript:void(0)" ng-if="(field.name == 'Other')" ng-click="removeField($index)"><strong>x</strong></a>
					</div>
				</div>
				<a href="javascript:void(0)" ng-click="addField()"><b>Add More(+)</b></a>
			</div>
		<?php
		}
	}


	/**
	 * URL sanitization
	 *
	 * @param  string	Input to be sanitized (either a string containing a single url or multiple, separated by commas)
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'bluecorona_url_sanitization' ) ) {
		function bluecorona_url_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false) {
				$input = explode( ',', $input );
			}
			if ( is_array( $input ) ) {
				foreach ($input as $key => $value) {
					$input[$key] = esc_url_raw( $value );
				}
				$input = implode( ',', $input );
			}
			else {
				$input = esc_url_raw( $input );
			}
			return $input;
		}
	}


}
