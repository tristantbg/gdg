<?php if ($page->sections()->isNotEmpty()): ?>
  <div id="page-sections" class="contained">
    <?php foreach($page->sections()->toStructure() as $section): ?>
      <?php snippet('modules/' . $section->_fieldset(), array('data' => $section)) ?>
    <?php endforeach ?>
  </div>
<?php endif ?>
