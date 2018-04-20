<?php snippet('header') ?>

<div id="page-sections">
	<section class="section artpieces">
		<?php snippet('sections/artpieces/artpieces-item', array('artpieces' => $artpiece)) ?>
	</section>

	<?php snippet('sections/text', array('text' => $page->text())) ?>

	<?php snippet('sections/artpieces/artpieces-container', array('list' => true, 'title' => l::get('related-artpieces'))) ?>
</div>

<?php snippet('footer') ?>
