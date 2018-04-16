<?php snippet('header') ?>

<section class="section artpieces m0">
	<?php snippet('sections/artpieces/artpieces-item', array('artpieces' => $artpiece)) ?>
</section>

<?php snippet('sections/text', array('text' => $page->text())) ?>

<?php snippet('sections/artpieces/artpieces-container', array('list' => true, 'title' => l::get('related-artpieces'))) ?>

<?php snippet('footer') ?>
