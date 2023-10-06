<script>
(function( $ ) {
	// Add Color Picker to all inputs that have 'color-field' class
	$(function() {
		$('#top_bar_color').wpColorPicker();
		$('#text_color').wpColorPicker();
	});
})( jQuery );
</script>

<?php

if(isset($_POST['update_option_setting']))
{
	$enable_top_bar = sanitize_text_field($_POST['enable_top_bar']);
	$fixed_top_bar = sanitize_text_field($_POST['fixed_top_bar']);
	$display_contact_number = sanitize_text_field($_POST['display_contact_number']);
	$display_email_address = sanitize_text_field($_POST['display_email_address']);
	$top_bar_height = sanitize_text_field($_POST['top_bar_height']);
	$top_bar_color = sanitize_text_field($_POST['top_bar_color']);
	$contact_number = sanitize_text_field($_POST['contact_number']);
	$contact_email = sanitize_text_field($_POST['contact_email']);	
	$text_color = sanitize_text_field($_POST['text_color']);
	$show_admin_bar = sanitize_text_field($_POST['show_admin_bar']);	
	$button_text = sanitize_text_field($_POST['button_text']);
	$acction_link = sanitize_text_field($_POST['acction_link']);
	
	update_option('enable_top_bar',$enable_top_bar);
	update_option('fixed_top_bar',$fixed_top_bar);
	update_option('display_contact_number',$display_contact_number);
	update_option('display_email_address',$display_email_address);
	update_option('top_bar_height',$top_bar_height);
	update_option('top_bar_color',$top_bar_color);
	update_option('contact_number',$contact_number);
	update_option('contact_email',$contact_email);	
	update_option('text_color',$text_color);
	update_option('show_admin_bar',$show_admin_bar);	
	update_option('button_text',$button_text);
	update_option('acction_link',$acction_link);
	
}

$enable_top_bar = get_option('enable_top_bar');
$fixed_top_bar = get_option('fixed_top_bar');
$display_contact_number = get_option('display_contact_number');
$display_email_address = get_option('display_email_address');
$top_bar_height = get_option('top_bar_height');
$top_bar_color = get_option('top_bar_color');
$contact_number = get_option('contact_number');
$contact_email = get_option('contact_email');
$text_color = get_option('text_color');
$show_admin_bar = get_option('show_admin_bar');	
$button_text = get_option('button_text');
$acction_link = get_option('acction_link');	
?>

<div class="wrap">	
	<div id="icon-edit" class="icon32"></div>
	<h2>Top Bar Setting</h2>
    
    <div id="poststuff">
	
		<div id="post-body" class="metabox-holder columns-2">
        <form method="post">
        	<table class="widefat">
                <tr>
                    <td class="row-title"><label for="enable_top_bar">Enable Top Bar : </label></td>
                    <td><input type="checkbox" name="enable_top_bar" id="enable_top_bar" value="1" <?php if( $enable_top_bar == 1) { ?> checked="checked" <?php } ?> /></td>
                </tr>
                <tr class="alternate">
                    <td class="row-title"><label for="fixed_top_bar">Fixed at Top :</label></td>
                    <td><input type="checkbox" name="fixed_top_bar" id="fixed_top_bar" value="1" <?php if( $fixed_top_bar == 1) { ?> checked="checked" <?php } ?>  /></td>
                </tr>
                
                <tr>
                    <td class="row-title"><label for="display_contact_number">Display Contact Number : </label></td>
                    <td><input type="checkbox" name="display_contact_number" id="display_contact_number" value="1" <?php if( $display_contact_number == 1) { ?> checked="checked" <?php } ?>  /></td>
                </tr>
                <tr class="alternate">
                    <td class="row-title"><label for="display_email_address">Display Email Address :</label></td>
                    <td><input type="checkbox" name="display_email_address" id="display_email_address" value="1" <?php if( $display_email_address == 1) { ?> checked="checked" <?php } ?>  /></td>
                </tr>
                
                <tr>
                    <td class="row-title"><label for="top_bar_height">Top Bar Height : </label></td>
                    <td><input type="text" name="top_bar_height" id="top_bar_height" value="<?php echo $top_bar_height; ?>"  />  <span>( in px) </span></td>
                </tr>
                <tr class="alternate">
                    <td class="row-title"><label for="top_bar_color">Top Bar Background Color :</label></td>
                    <td><input type="text" name="top_bar_color" id="top_bar_color" value="<?php echo $top_bar_color; ?>"  />  </td>
                </tr>
                
                <tr>
                    <td class="row-title"><label for="text_color">Text color : </label></td>
                    <td><input type="text" name="text_color" id="text_color" value="<?php echo $text_color; ?>"  /></td>
                </tr>
                <tr class="alternate">
                    <td class="row-title"><label for="show_admin_bar">Hide Admin Bar :</label></td>
                    <td><input type="checkbox" name="show_admin_bar" id="show_admin_bar" value="1" <?php if( $show_admin_bar == 1) { ?> checked="checked" <?php } ?>  /></td>
                </tr>
                
                <tr>
                    <td class="row-title"><label for="contact_number">Contact Number : </label></td>
                    <td><input type="text" name="contact_number" id="contact_number" value="<?php echo $contact_number; ?>"  /></td>
                </tr>
                <tr class="alternate">
                    <td class="row-title"><label for="contact_email">Email Address :</label></td>
                    <td><input type="text" name="contact_email" id="contact_email" value="<?php echo $contact_email; ?>"  /></td>
                </tr>
				
				<tr>
                    <td class="row-title"><label for="button_text">Button Text : </label></td>
                    <td><input type="text" name="button_text" id="button_text" value="<?php echo $button_text; ?>"  /></td>
                </tr>
                <tr class="alternate">
                    <td class="row-title"><label for="acction_link">Link :</label></td>
                    <td><input type="text" name="acction_link" id="acction_link" value="<?php echo $acction_link; ?>"  /></td>
                </tr>
                
                <tr>
                    <td class="row-title">&nbsp;</td>
                    <td><input class="button-primary" type="submit" name="update_option_setting" value="<?php _e( 'Save' ); ?>" /></td>
                </tr>
            </table>
           </form>
        </div>
    </div>
</div>