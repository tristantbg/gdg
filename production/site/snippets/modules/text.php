<section class="page-section section section--text">
	<?php if ($data->get("title")->isNotEmpty()): ?>
		<div class="sub-heading tac mb3">
		<?= $data->get("title")->html() ?>
		</div>
	<?php endif ?>
	<div class="text">
		<?= $data->get('content')->kt() ?>
	</div>
</section>
