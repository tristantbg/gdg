<?php foreach ($exhibitions as $key => $exhibition): ?>
	<a href="<?= $exhibition->url() ?>" class="row exhibition-link">
		<h3 class="sub-heading serif bold"><?= $exhibition->title()->html() ?></h3>
		<?php if ($exhibition->subtitle()->isNotEmpty()): ?>
			<div class="row mt2 caption-title"><?= $exhibition->subtitle()->kt() ?></div>
		<?php endif ?>
		<!-- <div class="exhibition-infos small mt2"><?= $exhibition->formattedDate() ?></div> -->
	</a>
<?php endforeach ?>