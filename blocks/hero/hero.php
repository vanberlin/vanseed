<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;

Block::make(__('Hero'))
	->add_fields(array(
		Field::make('image', 'image', __('Background Image')),
		Field::make('image', 'image_mobile', __('Background Image Mobile')),
		Field::make('textarea', 'headline', __('Headline')),
	))
	->set_category('vanberlin', __('vanBerlin'), 'smiley')
	->set_render_callback(function ($fields, $attributes, $inner_blocks) {
		?>
		<section class="hero">
			<?php if ($fields['image']) {
				$heroimage = wp_get_attachment_image_src($fields['image'], 'full', false);
				$heroimageMobile = wp_get_attachment_image_src($fields['image_mobile'], 'full', false);
			} else {
				$heroimage[0] = "";
			} ?>
			<style>
				.hero {
					background-image: url('<?= $heroimageMobile[0]; ?>');
				}

				@media (min-width: 576px) {
					.hero {
						background-image: url('<?= $heroimage[0]; ?>');
					}
				}
			</style>

			<div class="headline">
				<h1><?= nl2br($fields['headline']) ?></h1>
			</div>
		</section>

		<?php
	});
