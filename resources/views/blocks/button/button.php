<?php
    $classes   = isset($block['className']) ? $block['className'] : '';
    $anchor    = isset($block['anchor']) ? $block['anchor'] : '';;
    $btn       = get_field('button') ?: '';
    $size      = get_field('size') ?: '';
    $style     = get_field('style') ?: '';
    $transform = get_field('transform') ?: '';
    $classes   = ' btn__' . $size . ' btn__' . $style . ' ' . $transform;
?>

<?php if ( $is_preview ) : ?>
    <div style="height: 100px; width: 100%; padding-top: 17px;">
        <img src="<?php echo TOTVS_SETUP_PLUGIN_BLOCKS_VIEWS_URL . 'button/preview.jpg' ?>"
             style="width: auto; height: 80px; margin: auto;"
             alt="" />
    </div>
<?php else : ?>
  <a target="<?php echo isset( $btn['target'] ) ? $btn['target'] : '' ?>"
     href="<?php echo isset( $btn['url'] ) ? $btn['url'] : '' ?>"
     id="<?php echo $anchor ?>"
     class="btn <?php echo $classes ?>">
    <?php echo $btn['title'] ?>
  </a>
<?php endif ?>
