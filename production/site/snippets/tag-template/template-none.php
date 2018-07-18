<div id="page-header" class="row contained">
  <h1 class="title tac"><?= $page->title()->html() ?></h1>
  <?php if ($page->secondaryTitle()->isNotEmpty()): ?>
    <h2 class="row tac title secondary"><?= $page->secondaryTitle()->spaceSafe(true) ?></h2>
  <?php endif ?>
  <?php if ($page->subtitle()->isNotEmpty()): ?>
    <div id="page-subtitle" class="row caption-title tac">
      <div class="c8 co2 mt1" md="c12 co0"><?= $page->subtitle()->spaceSafe(true) ?></div>
    </div>
  <?php endif ?>
  <?php if ($page->intendedTemplate() == "exhibition"): ?>
    <div id="page-date" class="row caption-title tac">
      <div class="c8 co2" md="c12 co0"><?= $page->formattedDate() ?></div>
    </div>
  <?php endif ?>
  <?php if ($featured = $page->featured()->toFile()): ?>
    <div class="row mt2">
      <?php snippet('responsive-image', array('field' => $page->featured(), 'withCaption' => true)) ?>
    </div>
  <?php endif ?>
</div>
