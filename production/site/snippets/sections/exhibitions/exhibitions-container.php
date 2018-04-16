<?php if (isset($exhibitions)): ?>
	<section class="section section--exhibitions">
		<div class="row<?php e(isset($center), ' tac') ?>">
			<h2><?php e($exhibitions->count() > 1, translate('exhibitions.plural'),  translate('exhibitions.singular')) ?></h2>
		</div>
		<hr>
		<div class="exhibitions-list row<?php e(isset($center), ' tac') ?>">
			<?php snippet('sections/exhibitions/exhibitions-items') ?>
		</div>
	</section>
<?php endif ?>