<?php global $wp_embed; ?>
<amp-accordion class="fl-accordion fl-accordion-<?php echo $settings->label_size; ?><?php echo ( $settings->collapse ) ? ' fl-accordion-collapse' : ''; ?>" role="tablist"<?php echo ( ! $settings->collapse ) ? 'multiselectable="true"' : ''; ?> expand-single-section disable-session-states>
	<?php
	for ( $i = 0; $i < count( $settings->items ); $i++ ) :
		if ( empty( $settings->items[ $i ] ) ) {
			continue;
		}
		$label_id   = 'fl-accordion-' . $module->node . '-label-' . $i;
		$icon_id    = 'fl-accordion-' . $module->node . '-icon-' . $i;
		$content_id = 'fl-accordion-' . $module->node . '-panel-' . $i;
		?>
	<section class="fl-accordion-item"<?php echo ( ! empty( $settings->id ) ) ? ' id="' . sanitize_html_class( $settings->id ) . '-' . $i . '"' : ''; ?>>
		<h4 class="fl-accordion-button" id="<?php echo 'fl-accordion-' . $module->node . '-tab-' . $i; ?>" aria-selected="false" aria-controls="<?php echo 'fl-accordion-' . $module->node . '-panel-' . $i; ?>" aria-expanded="<?php echo ( $i > 0 || ! $settings->open_first ) ? 'false' : 'true'; ?>" role="tab" tabindex="0">

			<?php if ( 'left' === $settings->label_icon_position ) : ?>
			<i class="fl-accordion-button-icon fl-accordion-button-icon-left <?php echo $settings->label_icon; ?>"></i>
			<?php endif; ?>

			<span id="<?php echo $label_id; ?>" class="fl-accordion-button-label" tabindex="0" aria-controls="<?php echo $content_id; ?>"><?php echo $settings->items[ $i ]->label; ?></span>

			<?php if ( 'right' === $settings->label_icon_position ) : ?>
				<span id="<?php echo $icon_id; ?>" class="fl-accordion-button-icon" tabindex="0" aria-controls="<?php echo $content_id; ?>"><i class="fl-accordion-button-icon fl-accordion-button-icon-right <?php echo $settings->label_icon; ?>"><span class="sr-only"><?php echo ( $i > 0 || ! $settings->open_first ) ? 'Expand' : 'Collapse'; ?></span></i></span>
			<?php endif; ?>

		</h4>
		<p class="fl-accordion-content fl-clearfix" id="<?php echo $content_id; ?>" aria-labelledby="<?php echo 'fl-accordion-' . $module->node . '-tab-' . $i; ?>" aria-hidden="<?php echo ( $i > 0 || ! $settings->open_first ) ? 'true' : 'false'; ?>" role="tabpanel" aria-live="polite"><?php echo $wp_embed->autoembed( $settings->items[ $i ]->content ); ?></p>
	</section>
	<?php endfor; ?>
</amp-accordion>
