<?php snippet('header') ?>

<?php if ($by == "exhibition"): ?>
	<?php snippet('index/index-exhibitions') ?>
<?php elseif ($by == "artist"): ?>
	<?php snippet('index/index-artists') ?>
<?php elseif ($by == "tag"): ?>
	<?php snippet('index/index-articles') ?>
<?php else: ?>
	<?php snippet('index/index-artpieces') ?>
<?php endif ?>

<?php snippet('footer') ?>