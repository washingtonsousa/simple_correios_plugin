
 <?php function correiowsx_settings_init() {
 // register a new setting for "wporg" page
 register_setting( 'correiowsx', 'correiowsx_options' );
 
 // register a new section in the "wporg" page
 add_settings_section(
 'correio_section_developers',
 __( 'Insira o CEP de Origem', 'wsxdevtheme' ),
 'correio_section_developers_cb',
 'correiowsx'
 );
 
 // register a new field in the "wporg_section_developers" section, inside the "wporg" page
 add_settings_field(
 'correio_field_cep', // as of WP 4.6 this value is used only internally
 // use $args' label_for to populate the id inside the callback
 __( 'CEP', 'wsxdevtheme' ),
 'correio_field_cep_cb',
 'correiowsx',
 'correio_section_developers',
 [
 'label_for' => 'correio_field_cep',
 'class' => 'inputCorreioCEP',
 'correio_custom_data' => 'custom',
 ]
 );
}
 
/**
 * register our wporg_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'correiowsx_settings_init' );
 
/**
 * custom option and settings:
 * callback functions
 */
 
// developers section cb
 
// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function correio_section_developers_cb( $args ) {
 ?>

 <?php
}
 
// pill field cb
 
// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.
function correio_field_cep_cb( $args ) {
 // get the value of the setting we've registered with register_setting()
 $options = get_option( 'correiowsx_options' );

 // output the field
 ?>
  <input id="<?php echo esc_attr( $args['label_for'] ); ?>"
 data-custom="<?php echo esc_attr( $args['correio_custom_data'] ); ?>"
 name="correiowsx_options" 
 value="<?= isset($options) ? esc_attr($options) : ''; ?>" />

 
 <?php
}
 
/**
 * top level menu
 */
function correiowsx_options_page() {
 // add top level menu page
 add_menu_page(
 'Calculo de frete Correios',
 'Correios Opções',
 'manage_options',
 'correio',
 'correiowsx_options_page_html'
 );
}
 
/**
 * register our wporg_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'correiowsx_options_page' );
 
/**
 * top level menu:
 */
function correiowsx_options_page_html() {
 // check user capabilities
 if ( ! current_user_can( 'manage_options' ) ) {
 return;
 }
 
 // add error/update messages
 
 // check if the user have submitted the settings
 // wordpress will add the "settings-updated" $_GET parameter to the url

 if ( isset( $_GET['settings-updated'] ) ) {
 // add settings saved message with the class of "updated"
 add_settings_error( 'correio_messages', 'correio_message', __( 'Settings Saved', 'correiowsx' ), 'updated' );
 }
 
 // show error/update messages
 settings_errors( 'correio_messages' );
 ?>
 <div class="wrap">
 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 <form action="options.php" method="post">
 <?php
 // output security fields for the registered setting "wporg"
 settings_fields( 'correiowsx' );
 // output setting sections and their fields
 // (sections are registered for "wporg", each field is registered to a specific section)
 do_settings_sections( 'correiowsx' );
 // output save settings button
 submit_button( 'Save Settings' );
 ?>
 </form>
 </div>
 <?php
}