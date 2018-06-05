<?php
if ($page->sections()->isNotEmpty() ||
$page->intendedTemplate() == "exhibition" && $page->artists()->isNotEmpty() ||
$page->intendedTemplate() == "exhibition" && $page->artpieces()->isNotEmpty()
): ?>
  <div id="page-sections" class="contained">
  	<?php if ($page->intendedTemplate() == "exhibition"): ?>
  		<?php snippet('sections/artists-grid') ?>
      <?php foreach($page->sections()->toStructure() as $section): ?>
        <?php snippet('modules/' . $section->_fieldset(), array('data' => $section)) ?>
      <?php endforeach ?>
  		<?php snippet('sections/artpieces/artpieces-container') ?>
    <?php else: ?>
      <?php foreach($page->sections()->toStructure() as $section): ?>
        <?php snippet('modules/' . $section->_fieldset(), array('data' => $section)) ?>
      <?php endforeach ?>
  	<?php endif ?>
  </div>
<?php endif ?>
