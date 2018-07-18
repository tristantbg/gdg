<?php snippet('header') ?>

<div id="previous-page">
  <?php if($page->hasPrev()): ?>
  <a class="prev caption-title" href="<?php echo $page->prev()->url() ?>">
    <svg viewBox="0 0 100 100"><path d="M74.3 99.3L25 50 74.3.7l.7.8L26.5 50 75 98.5z" class="arrow"></path></svg>
  </a>
  <?php endif ?>
</div>

<div id="next-page">
  <?php if($page->hasNext()): ?>
  <a class="next caption-title" href="<?php echo $page->next()->url() ?>">
    <svg viewBox="0 0 100 100"><path d="M74.3 99.3L25 50 74.3.7l.7.8L26.5 50 75 98.5z" class="arrow" transform="translate(100, 100) rotate(180) "></path></svg>
  </a>
  <?php endif ?>
</div>

<div id="page-sections">
	<section class="section artpieces">
		<?php snippet('sections/artpieces/artpieces-item', array('artpieces' => $artpiece)) ?>
	</section>

	<?php snippet('sections/text', array('text' => $page->text())) ?>

	<?php snippet('sections/artpieces/artpieces-container', array('list' => true, 'title' => l::get('related-artpieces'))) ?>
</div>

<?php snippet('footer') ?>
