<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make(__('Hero'))
	->add_fields(array(
		Field::make('select', 'heading_align', __('Heading align'))
			->add_options(array(
				'text-center' => 'Text center',
				'text-left' => 'Text left',
			)),
		Field::make('image', 'image', __('Background Image')),
		Field::make('text', 'heading_first', __('Heading first Line')),
		Field::make('text', 'heading_second', __('Heading second Line')),
		Field::make('text', 'cta_text', __('CTA Text')),
		Field::make('text', 'cta_link', __('CTA Link')),
	))
	->set_category('vanberlin', __('vanBerlin'), 'smiley')
	->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
		<div class="hero row">
			<?php if ($fields['image']) {
				echo wp_get_attachment_image($fields['image'], 'full', false, array('class' => 'hero__image'));
			} else {
				echo '<div class="hero__no-image"></div>';
			} ?>

			<div class="hero__body">
				<div class="container">
					<h1 class="hero__heading <?php echo $fields['heading_align']; ?>">
						<span class="hero__heading-first"><?= esc_html($fields['heading_first']); ?></span>
						<span class="hero__heading-second"><?= esc_html($fields['heading_second']); ?></span>
					</h1>

					<?php if ($fields['cta_text']): ?>
						<a class="hero__cta btn btn-lg btn-primary" href="<?php echo $fields['cta_link'] ?>"><?php echo $fields['cta_text']; ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php
	});
