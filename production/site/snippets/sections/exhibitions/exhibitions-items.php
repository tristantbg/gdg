<?php foreach ($exhibitions as $key => $exhibition): ?>
	<a href="<?= $exhibition->url() ?>" class="row exhibition-link">
		<h3 class="sub-heading serif bold"><?= $exhibition->title()->html() ?></h3>
		<div class="exhibition-infos small mt1_5"><?= $exhibition->formattedDate() ?></div>
	</a>
<?php endforeach ?>