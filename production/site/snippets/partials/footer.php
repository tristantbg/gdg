<footer>
	<div class="site-title fs1-6 row mb4" sm="dn">
		<?= $site->title()->html() ?>
	</div>
	<div class="row small mb4">
		<div class="db c6 fl bold" md="c12 mb4" sm="dn">
			<div class="c6 fl prg" sm="c12 p0"><?= $site->footer1()->kt() ?></div>
			<div class="c6 fl prg" sm="c12 p0"><?= $site->footer2()->kt() ?></div>
		</div>
		<div id="footer-links" class="c3 co3 fl bold" md="c6 co0" sm="c12">
			<div class="row mb2">
				<div class="row mb1"><?= l::get('search') ?></div>
				<div class="row">
					<?php snippet('searchbar') ?>
				</div>
			</div>

			<ul id="footer-languages" class="has-submenu hoverable clickable">
				<li event-target="submenu">
					<span><?= l::get('change-language') ?></span>
					<svg role="presentation">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= url('assets/images/svg-sprite.svg') ?>#arrow-right"></use>
					</svg>
				</li>
				<ul class="submenu">
					<?php foreach($site->languages() as $language): ?>
						<li>
							<a class="button" href="<?= $page->url($language->code()) ?>">
								<?= l::get('language.'.$language->code()) ?>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</ul>

			<?php if ($site->contactEmail()->isNotEmpty()): ?>
				<?= html::email($site->contactEmail(), l::get('contact-us'), array('class' => 'row menu-item')) ?>
			<?php endif ?>

			<a class="row menu-item" href="<?= page('a-propos')->url().'/#press' ?>"><?= l::get('press.area') ?></a>

			<?php if ($pressPage = $site->index()->findBy('autoid', $site->pressPage()->value())): ?>
			<a class="row menu-item" href="<?= $pressPage->url() ?>"><?= $pressPage->title()->html() ?></a>
			<?php endif ?>

			<ul id="footer-newsletter" class="has-submenu clickable">
				<li event-target="submenu">
					<span><?= l::get('newsletter') ?></span>
					<svg role="presentation">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= url('assets/images/svg-sprite.svg') ?>#arrow-right"></use>
					</svg>
				</li>
				<ul class="submenu">
					<?php snippet('mc-newsletter') ?>
				</ul>
			</ul>

			<div id="footer-socials" class="row menu-item mt2">
				<div class="row mb1"><?= l::get('follow-us') ?></div>
				<div class="row x">
					<?php foreach ($site->socials()->toStructure() as $key => $s): ?>
						<a class="social-icon" href="<?= $s->link() ?>" title="<?= $s->title() ?>"><img src="<?= $s->icon()->toFile()->url() ?>" width="100%"></a>
					<?php endforeach ?>
				</div>
			</div>

		</div>
	</div>

	<div class="row small mt4 x xjs" md="db">
		<div class="c6 fl tc2 x xac" md="c8" sm="c12">
			<?php foreach ($site->logos()->toStructure() as $key => $l): ?>
				<div class="logo-icon">
          <?php if ($l->toFile()->link()->isNotEmpty()): ?>
            <a href="<?= $l->toFile()->link() ?>">
          <?php endif ?>
					<img src="<?= $l->toFile()->width(300)->url() ?>" width="100%" height="100%">
          <?php if ($l->toFile()->link()->isNotEmpty()): ?>
            </a>
          <?php endif ?>
				</div>
			<?php endforeach ?>
		</div>
		<?php if ($legal = $site->index()->findBy('autoid', $site->legalPage()->value())): ?>
		<div class="c3 co3 fl x xafe" md="c4" sm="c12 co0 mt2">
			<a href="<?= $legal->url() ?>" class="link"><?= $legal->title()->html() ?></a>
		</div>
		<?php endif ?>
	</div>
</footer>
