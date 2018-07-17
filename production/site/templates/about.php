<?php snippet('header') ?>

<section class="header-template tag-template template-about">
	<div class="template-component image-1">
	<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage1'), 'ratio' => 435/317, 'withCaption' => true)) ?>
	</div>
	<div class="title sticky-title" style="color: <?= $page->content('fr')->get('titleColor') ?>">
		<h1 style="color: <?= $page->content('fr')->get('titleColor') ?>"><?= $page->title()->html() ?></h1>
		<?php if ($page->secondaryTitle()->isNotEmpty()): ?>
			<h2 class="title secondary"><?= $page->secondaryTitle()->html() ?></h2>
		<?php endif ?>
		<?php if ($page->subtitle()->isNotEmpty()): ?>
		<div class="caption-title"><?= $page->subtitle()->html() ?></div>
		<?php endif ?>
		<?php if ($page->intendedTemplate() == "exhibition"): ?>
		<div class="caption-title"><?= $page->formattedDate() ?></div>
		<?php endif ?>
	</div>
	<div class="template-component image-2">
	<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage2'), 'ratio' => 628/471, 'withCaption' => true)) ?>
	</div>
	<div class="template-component image-3">
		<?php $sliderImages = $page->content('fr')->get('templateSlider1') ?>
		<?php if ($sliderImages->isNotEmpty()): ?>
		<?php snippet('slider', array('medias' => $sliderImages->toStructure())) ?>
		<div class="slider-caption row caption"></div>
		<?php else: ?>
		<?php snippet('responsive-image', array('field' => $page->content('fr')->get('templateImage3'), 'ratio' => 552/413, 'withCaption' => true)) ?>
		<?php endif ?>
	</div>
	<div class="template-component text-1">
		<?php if ($page->summary()->isNotEmpty()): ?>
			<div id="page-summary" class="row contained summary" md="my4">
				<div class="c8 co2" md="c12 co0"><?= $page->summary()->kt() ?></div>
			</div>
		<?php endif ?>
	</div>
</section>

<div id="page-text" class="row contained text">
	<div class="c8 co2" md="c12 co0"><?= $page->text()->kt() ?></div>
</div>

<div id="page-sections">

	<?php if ($visits[0]->count() > 0 || $visits[1]->count() > 0 || $visits[2]->count() > 0 || $visits[3]->count() > 0): ?>
		<section class="section">
			<hr class="desktop">
			<div class="row">
				<div class="title secondary c3 fl" md="c12 tac"><?= l::get('visits') ?></div>
				<hr class="mobile">
				<div class="c5 fl mb4 prg" md="c12 mb2 p0">
					<?php foreach ($visits[0] as $key => $v): ?>
					<div class="mb1 serif caption-title bold"><?= $v->title()->html() ?></div>
					<div class="mb2"><?= $v->summary()->kt() ?></div>
					<?php endforeach ?>
				</div>
				<div class="c3 fl mb4" md="c12 mb2">
					<?php foreach ($visits[1] as $key => $v): ?>
					<div class="mb1 serif caption-title bold"><?= $v->title()->html() ?></div>
					<div class="mb2"><?= $v->summary()->kt() ?></div>
					<?php endforeach ?>
				</div>
				<div class="c5 co3 fl prg" md="c12 co0 p0">
					<?php foreach ($visits[2] as $key => $v): ?>
					<div class="mb1 serif caption-title bold"><?= $v->title()->html() ?></div>
					<div class="mb2"><?= $v->summary()->kt() ?></div>
					<?php endforeach ?>
				</div>
				<div class="c3 fl" md="c12">
					<?php foreach ($visits[3] as $key => $v): ?>
					<div class="mb1 serif caption-title bold"><?= $v->title()->html() ?></div>
					<div class="mb2"><?= $v->summary()->kt() ?></div>
					<?php endforeach ?>
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php if ($team->count() > 0): ?>
		<section id="team" class="section">
			<div class="row tac title secondary"><?= l::get('team') ?></div>
			<hr>
			<div class="row four-columns">
				<?php foreach ($team as $key => $t): ?>
					<div class="item">
						<?php if ($t->thumb()->isNotEmpty()): ?>
						<?php snippet('responsive-image', array('field' => $t->thumb(), 'ratio' => 1/1)) ?>
						<?php else: ?>
						<?php snippet('image-placeholder', array('text' => preg_replace("/(?![A-Z])./", "", $t->title()->value()))) ?>
						<?php endif ?>
						<div class="my1 serif caption-title bold"><?= $t->title()->html() ?></div>
						<div><?= $t->summary()->kt() ?></div>
					</div>
				<?php endforeach ?>
			</div>
		</section>
	<?php endif ?>

	<?php if ($press->count() > 0): ?>
		<section id="press" class="section">
			<hr class="desktop">
			<div class="row">
				<div class="title secondary c3 fl" md="c12 tac"><?= html(l::get('press')) ?></div>
				<hr class="mobile">
				<div class="c5 fl prg" md="c12 p0">
					<div class="my1 serif caption-title bold"><?= html(l::get('press.news')) ?></div>
					<div class="mb2"><?= $page->pressText()->kt() ?></div>
					<?php foreach ($press as $key => $p): ?>
						<?php if ($p->presskit()->isNotEmpty() || $p->zip()->isNotEmpty()): ?>
							<div class="item mb2">
								<div class="bold"><?= $p->title()->html() ?></div>
								<?php if ($p->subtitle()->isNotEmpty()): ?>
								<div><?= $p->subtitle()->html() ?></div>
								<?php endif ?>
								<?php if ($p->presskit()->isNotEmpty() && $presskit = page($page->uri().'/'.$p->presskit())): ?>
								<div><a href="<?= $presskit->url() ?>" class="tdu"><?= html(l::get('press.download.singular')) ?></a></div>
								<?php endif ?>
								<?php if ($p->zip()->isNotEmpty() && $zip = page($page->uri().'/'.$p->zip())): ?>
								<div><a href="<?= $zip->url() ?>" class="tdu"><?= html(l::get('press.download.images')) ?></a></div>
								<?php endif ?>
							</div>
						<?php endif ?>
					<?php endforeach ?>
				</div>
				<div class="c3 fl" md="c12">
					<div class="my1 serif caption-title bold"><?= l::get('contact-us') ?></div>
					<div><?= $page->pressContact()->kt() ?></div>
				</div>
			</div>
		</section>
	<?php endif ?>

	<?php if ($partners->count() > 0): ?>
		<section id="partners" class="section">
			<div class="row tac title secondary"><?= l::get('partners') ?></div>
			<hr>
			<div class="row">
				<?php foreach ($partners as $key => $p): ?>
					<div class="item c8 co2" md="c12 co0">
						<div class="my1 serif caption-title bold tac"><?= $p->title()->html() ?></div>
						<div class="text"><?= $p->summary()->kt() ?></div>
					</div>
				<?php endforeach ?>
			</div>
		</section>
	<?php endif ?>

</div>

<?php snippet('footer') ?>
