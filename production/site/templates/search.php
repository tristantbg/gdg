<?php snippet('header') ?>

<div id="page-header" class="row contained">
	<?php if ($results->count() == 0): ?>
		<div class="caption-title tac mb2"><?= l::get('no-results') ?></div>
		<?php snippet('searchbar') ?>
	<?php else: ?>
		<div class="caption-title tac"><?= translate('search-results', array($results->count(), $query)) ?></div>
		<hr>
	<?php endif ?>
</div>

<?php if (isset($results)): ?>
	<div id="page-sections">
		<section class="section section--search m0">
			<div class="search-list row">
				<?php foreach ($results as $key => $result): ?>
					<a href="<?= $result->url() ?>" class="row result-link">
						<h3 class="sub-heading serif bold"><?= $result->title()->html() ?></h3>
						<div class="result-infos small mt2"><?= $result->text()->excerpt(300) ?></div>
					</a>
				<?php endforeach ?>
			</div>
		</section>
	</div>
<?php endif ?>

<?php snippet('footer') ?>
