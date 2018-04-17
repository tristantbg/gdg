<section class="header-template home-template desktop template-b">
	<div class="title sticky-title">
    <h1><?= $page->title()->html() ?></h1>
    <?php if ($page->subtitle()->isNotEmpty()): ?>
    <div class="caption-title"><?= $page->subtitle()->html() ?></div>
    <?php endif ?>
    <?php if ($page->intendedTemplate() == "exhibition"): ?>
    <div class="caption-title"><?= $page->formattedDate() ?></div>
    <?php endif ?>
  </div>
  <div class="template-component image-1">
    <?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage1'), 'ratio' => 435/317)) ?>
  </div>
  <div class="template-component image-2">
    <?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage2'), 'ratio' => 628/471)) ?>
  </div>
  <div class="template-component image-3">
    <?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage3'), 'ratio' => 552/413)) ?>
  </div>
  <?php if ($page->intendedTemplate() != "exhibition" || $page->content('fr')->get('templateImage4')->isNotEmpty()): ?>
    <div class="template-component image-4">
      <?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage4'), 'ratio' => 359/259)) ?>
    </div>
  <?php else: ?>
    <div class="template-component poster">
      <?php snippet('responsive-image', array('field' => $page->poster(), 'ratio' => 433/615)) ?>
    </div>
  <?php endif ?>
</section>
