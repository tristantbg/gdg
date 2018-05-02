<section class="page-section section section--text">
	<?php if ($data->get("title")->isNotEmpty()): ?>
		<div class="sub-heading tac mb3">
		<?= $data->get("title")->html() ?>
		</div>
	<?php endif ?>
	<div class="text">
		<div class="c8 co2" md="c12 co0"><?= $data->get('content')->kt() ?></div>
	</div>
</section>
