<?php
/**
 * Displays footer site info
 */

?>
<?php if( get_theme_mod( 'animal_wildlife_hide_show_scroll',false) != '' || get_theme_mod( 'animal_wildlife_enable_disable_scrolltop',false) != '') { ?>
    <?php $animal_wildlife_theme_lay = get_theme_mod( 'animal_wildlife_footer_options','Right');
    if($animal_wildlife_theme_lay == 'Left align'){ ?>
        <a href="#" class="scrollup left"><i class="<?php echo esc_attr(get_theme_mod('animal_wildlife_scroll_icon_changer','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'animal-wildlife' ); ?></span></a>
    <?php }else if($animal_wildlife_theme_lay == 'Center align'){ ?>
        <a href="#" class="scrollup center"><i class="<?php echo esc_attr(get_theme_mod('animal_wildlife_scroll_icon_changer','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'animal-wildlife' ); ?></span></a>
    <?php }else{ ?>
        <a href="#" class="scrollup"><i class="<?php echo esc_attr(get_theme_mod('animal_wildlife_scroll_icon_changer','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'animal-wildlife' ); ?></span></a>
    <?php }?>
<?php }?>
<div class="site-info">
    <div class="container">
    	<span><?php animal_wildlife_credit(); ?>  <?php echo esc_html(get_theme_mod('animal_wildlife_footer_text',__('By ThemesEye','animal-wildlife'))); ?></span>
    	<span class="footer_text"><?php echo esc_html_e('Powered By WordPress','animal-wildlife') ?></span>
    </div>
</div>