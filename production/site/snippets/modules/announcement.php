<section class="page-section section section--announcement">
    <?php if ($data->get('slider')->isNotEmpty()): ?>
    <?php snippet('slider', array('medias' => $data->get('slider')->toStructure(), 'ratio' => 665/498, 'autoHeight' => true)) ?>
    <?php else: ?>
		<?php if ($data->get('link')->isNotEmpty()): ?>
			<a href="<?= $data->get('link') ?>">
		<?php endif ?>
    <?php snippet('responsive-image', array('field' => $data->get('thumb'), 'ratio' => 665/498)) ?>
		<?php if ($data->get('link')->isNotEmpty()): ?>
			</a>
		<?php endif ?>
    <?php endif ?>
		<div class="item-infos">
			<?php if ($data->get('link')->isNotEmpty()): ?>
				<a href="<?= $data->get('link') ?>">
			<?php endif ?>
			<div class="caption-title serif bold mt1">
			  <?= $data->get('title') ?>
			</div>
			<?php if ($data->get('summary')->isNotEmpty()): ?>
			<div class="small mt1">
			  <?= $data->get('summary')->kt() ?>
			</div>
			<?php endif ?>
			<?php if ($data->get('link')->isNotEmpty()): ?>
				</a>
			<?php endif ?>
			<?php if ($data->get('link')->isNotEmpty()): ?>
				<?= displayTags($data->get('tags'), true) ?>
			<?php else: ?>
				<?= displayTags($data->get('tags')) ?>
			<?php endif ?>
		</div>
</section>
