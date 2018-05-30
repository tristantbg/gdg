<section class="page-section section section--slider">
  <?php if ($data->get("title")->isNotEmpty()): ?>
  <div class="caption-title serif bold tac">
    <?= $data->get("title")->spaceSafe() ?>
  </div>
  <?php endif ?>
  <?php if ($data->get("subtitle")->isNotEmpty()): ?>
  <div class="caption-title tac">
    <?= $data->get("subtitle")->spaceSafe() ?>
  </div>
  <?php endif ?>
  <?php snippet('slider', array('medias' => $data->get('content')->toStructure())) ?>
  <div class="slider-caption row caption"></div>
</section>
