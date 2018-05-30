<section class="page-section section section--images">
  <?php if ($data->get("title")->isNotEmpty()): ?>
  <div class="sub-heading tac mb3">
    <?= $data->get("title")->html() ?>
  </div>
  <?php endif ?>
  <?php if ($data->get("subtitle")->isNotEmpty()): ?>
  <div class="caption-title tac">
    <?= $data->get("subtitle")->spaceSafe() ?>
  </div>
  <?php endif ?>
  <?php $count = $data->get("content")->toStructure()->count() ?>
  <div class="row relatedpages-slider four-columns<?php e($count > 4, ' inline-slider') ?><?php e($count == 3, ' x xjc xw') ?>">
    <?php foreach ($data->get("content")->toStructure() as $key => $image): ?>
        <?php $imageFile = $image->toFile() ?>
        <div class="image-item inline-item">
          <?php snippet('responsive-image', array('field' => $image)) ?>
          <div class="item-infos">
            <?php if ($imageFile->imageTitle()->isNotEmpty()): ?>
            <div class="caption-title serif bold mt1">
              <?= $imageFile->imageTitle()->html() ?>
            </div>
            <?php endif ?>
            <?php if ($imageFile->caption()->isNotEmpty()): ?>
            <div class="caption-title serif">
              <?= $imageFile->caption()->kt() ?>
            </div>
            <?php endif ?>
          </div>
      </div>
    <?php endforeach ?>
  </div>
</section>
