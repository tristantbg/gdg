<section class="page-section section section--relatedpages">
  <?php if ($data->get("title")->isNotEmpty()): ?>
  <div class="sub-heading tac mb3">
    <?= $data->get("title")->html() ?>
  </div>
  <?php endif ?>
  <?php $relatedPages = getRelatedPages($data->get('content')) ?>
  <?php $count = $relatedPages->count() ?>
  <div class="relatedpages-slider<?php e($count > 4, ' inline-slider') ?><?php e($count == 1, ' announcement') ?><?php e($count == 2, ' two-columns') ?><?php e($count > 2, ' four-columns') ?><?php e($count == 3, ' x xjc xw') ?>">
    <?php foreach ($relatedPages as $key => $relatedPage): ?>
		<div class="relatedpage inline-item">
			<a href="<?php e($relatedPage->link()->isNotEmpty(), $relatedPage->link(), $relatedPage->url()) ?>">
			<?php if ($count == 1): ?>
				<?php snippet('responsive-image', array('field' => $relatedPage->featured(), 'ratio' => 665/498)) ?>
			<?php elseif ($count == 2): ?>
				<?php snippet('responsive-image', array('field' => $relatedPage->featured(), 'ratio' => 435/326, 'maxWidth' => 2000)) ?>
			<?php else: ?>
				<?php snippet('responsive-image', array('field' => $relatedPage->featured(), 'ratio' => 1/1, 'maxWidth' => 1000)) ?>
			<?php endif ?>
			</a>
			<div class="item-infos">
				<a href="<?php e($relatedPage->link()->isNotEmpty(), $relatedPage->link(), $relatedPage->url()) ?>">
					<div class="<?php e($count < 3, 'caption-title serif', 'lead') ?> bold mt1">
					  <?= $relatedPage->title()->html() ?>
					</div>
					<?php if ($relatedPage->subtitle()->isNotEmpty()): ?>
					<div class="lead">
					  <?= $relatedPage->subtitle()->html() ?>
					</div>
					<?php endif ?>
					<?php if ($relatedPage->summary()->isNotEmpty()): ?>
					<div class="small mt1">
					  <?= $relatedPage->summary()->excerpt(600) ?>
					</div>
					<?php endif ?>
				</a>
				<?php if ($relatedPage->link()->empty()): ?>
					<?= displayTags($relatedPage->tags()) ?>
				<?php else: ?>
					<?= displayTags($relatedPage->tags(), true) ?>
				<?php endif ?>
			</div>
		</div>
        
    <?php endforeach ?>
  </div>
</section>
