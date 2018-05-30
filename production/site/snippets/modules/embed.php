<section class="page-section section section--embed">
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
  <div>
    <?php if ($data->get("thumb")->toFile()): ?>
    <?= $data->get("url")->embed(array("thumb" => $data->get("thumb")->toFile()->width(1000)->url())) ?>
    <?php else: ?>
    <?= $data->get("url")->embed() ?>
    <?php endif ?>
  </div>
</section>
