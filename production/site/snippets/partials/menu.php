<div id="menu">
	<div id="navigation" class="tac">
		<?php foreach ($site->menu()->toStructure() as $key => $m): ?>
			<?php if ($p = $site->index()->findBy('autoid', $m->page()->value())): ?>
				<a class="navigation-item<?= e($m->bold()->bool(), ' bold') ?>" href="<?= $p->url() ?>"><?= $p->title()->html() ?></a>
			<?php endif ?>
		<?php endforeach ?>
		<div class="mt2 bold x xdc">
			<a href="<?= page('a-propos')->url().'/#press' ?>"><?= l::get('press.area') ?></a>
			<a href="https://galeriedesgaleries.us18.list-manage.com/subscribe/post?u=eb7b34683fcb919ed54a51cd1&id=28ac524572"><?= l::get('newsletter') ?></a>
			<div>
				<a href="<?= $page->url('fr') ?>"><?= l::get('language.fr') ?></a> / <a href="<?= $page->url('en') ?>"><?= l::get('language.en') ?></a>
			</div>
		</div>
	</div>

	<div id="menu-footer" class="x xjb" sm="x xw xac px4">
		<div id="menu-socials" class="xx" sm="c3 xo2">
			<div class="row x">
				<?php foreach ($site->socials()->toStructure() as $key => $s): ?>
					<a class="social-icon" href="<?= $s->link() ?>" title="<?= $s->title() ?>"><img src="<?= $s->icon()->toFile()->url() ?>" width="100%"></a>
				<?php endforeach ?>
			</div>
		</div>
		
		<div id="menu-search" class="c4" sm="c12 xo1 mb1">
			<?php snippet('searchbar', array('placeholder' => true)) ?>
		</div>

		<div class="x xac xje xx" sm="xi c9 xo3">
			<?php foreach ($site->logosMenu()->toStructure() as $key => $l): ?>
				<div class="logo-icon">
					<img src="<?= $l->toFile()->width(300)->url() ?>" width="100%" height="100%">
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>