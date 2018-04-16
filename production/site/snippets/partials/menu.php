<div id="menu">
	<div id="navigation" class="tac">
		<?php foreach ($site->menu()->toStructure() as $key => $m): ?>
			<?php if ($p = $site->index()->findBy('autoid', $m->page()->value())): ?>
				<a class="navigation-item<?= e($m->bold()->bool(), ' bold') ?>" href="<?= $p->url() ?>"><?= $p->title()->html() ?></a>
			<?php endif ?>
		<?php endforeach ?>
	</div>

	<div id="menu-footer">
		<div id="menu-socials" class="c4">
			<div class="row x">
				<?php foreach ($site->socials()->toStructure() as $key => $s): ?>
					<a class="social-icon" href="<?= $s->link() ?>" title="<?= $s->title() ?>"><img src="<?= $s->icon()->toFile()->url() ?>" width="100%"></a>
				<?php endforeach ?>
			</div>
		</div>
		
		<div id="menu-search" class="c4">
			<?php snippet('searchbar', array('placeholder' => true)) ?>
		</div>

		<div class="c4 x xac xje">
			<?php foreach ($site->logosMenu()->toStructure() as $key => $l): ?>
				<div class="logo-icon">
					<img src="<?= $l->toFile()->width(300)->url() ?>" width="100%" height="100%">
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>