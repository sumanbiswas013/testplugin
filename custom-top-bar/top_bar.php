<?php
$enable_top_bar = get_option('enable_top_bar');
$fixed_top_bar = get_option('fixed_top_bar');
$display_contact_number = get_option('display_contact_number');
$display_email_address = get_option('display_email_address');
$top_bar_height = get_option('top_bar_height') > 20 ? get_option('top_bar_height'): 30;
$top_bar_color = get_option('top_bar_color') ? get_option('top_bar_color') : '#333';
$contact_number = get_option('contact_number');
$contact_email = get_option('contact_email');
$textMargin = ceil($top_bar_height / 10);
$text_color = get_option('text_color');
$show_admin_bar = get_option('show_admin_bar');	
$button_text = get_option('button_text');
$acction_link = get_option('acction_link');	

if($show_admin_bar) { show_admin_bar(false); }
$theQuery = new WP_Query(array('post_type'=>'social-post','posts_per_page'=>-1));
?>


<?php if($enable_top_bar) { ?>
<div id="page">
<div id="header"  style=" <?php if($fixed_top_bar == 1 ) { ?> position:fixed; <?php } ?> <?php echo 'height:'.$top_bar_height.'px;'; ?> <?php echo 'background:'.$top_bar_color; ?> " >
    <div class="wrapper">
      <div class="col-lf-1">
      	<span class="txt" style=" margin-top:<?php echo $textMargin;?>%; color: <?php echo $text_color; ?>">
        <?php if($display_contact_number) { ?>
        <?php echo $contact_number; ?>
        <?php } ?>
        </span>
		
		<?php if($display_email_address && $display_contact_number) {?>
		<span class="txt" style=" margin-top:<?php echo $textMargin;?>%;">|</span>
		<?php } ?>
		
        <span class="txt" style=" margin-top:<?php echo $textMargin;?>%;color: <?php echo $text_color; ?>">
        <?php if($display_email_address) { ?>
        <a href="mailto:<?php echo $contact_email; ?>" style="color: <?php echo $text_color; ?>"><?php echo $contact_email; ?></a>
        <?php } ?>
        </span>
      </div>
      <div class="social">
		<?php
        if($theQuery->have_posts()){
        	while($theQuery->have_posts()){
            $theQuery->the_post();
			$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'social_image_medium');
			$social_link = get_post_meta( get_the_ID(), $key = 'social_link', $single = true );
        ?>
      	<a href="<?php echo $social_link; ?>" target="_blank"><img src="<?php echo $src[0];?>" alt="" title="<?php echo get_the_title(); ?>" /></a>
        <?php } } wp_reset_query(); ?>
      </div>
      <a href="<?php echo $acction_link; ?>" class="btn"><?php echo $button_text; ?></a>
    </div>
  </div>
 </div>
<?php } ?>