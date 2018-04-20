<section class="page-section section section--relatedpages">
  <?php if ($data->get("title")->isNotEmpty()): ?>
  <div class="sub-heading tac mb3">
    <?= $data->get("title")->html() ?>
  </div>
  <?php endif ?>
  <?php $relatedPages = getRelatedPages($data->get('content')) ?>
  <?php $count = $relatedPages->count() ?>
  <div class="relatedpages-slider<?php e($count > 4, ' inline-slider') ?><?php e($count == 1, ' announcement') ?><?php e($count == 2, ' two-columns') ?>">
    <?php foreach ($relatedPages as $key => $relatedPage): ?>
        <a href="<?= $relatedPage->url() ?>" class="relatedpage inline-item">
        	<?php if ($count == 1): ?>	
          	<?php snippet('responsive-image', array('field' => $relatedPage->featured(), 'ratio' => 665/498)) ?>
        	<?php elseif ($count == 2): ?>	
          	<?php snippet('responsive-image', array('field' => $relatedPage->featured(), 'ratio' => 435/326)) ?>
        	<?php else: ?>
          	<?php snippet('responsive-image', array('field' => $relatedPage->featured(), 'ratio' => 1/1)) ?>
        	<?php endif ?>
          <div class="item-infos">
          	<div class="<?php e($count < 3, 'caption-title serif', 'lead') ?> bold mt1">
          	  <?= $relatedPage->title()->html() ?>
          	</div>
          	<?php if (false && $relatedPage->subtitle()->isNotEmpty()): ?>
          	<div class="lead">
          	  <?= $relatedPage->subtitle()->html() ?>
          	</div>
          	<?php endif ?>
          	<?php if ($relatedPage->summary()->isNotEmpty()): ?>
          	<div class="small mt1">
          	  <?= $relatedPage->summary()->kt() ?>
          	</div>
          	<?php endif ?>
          	<?= $relatedPage->displayTags() ?>
          </div>
        </a>
    <?php endforeach ?>
  </div>
</section>
