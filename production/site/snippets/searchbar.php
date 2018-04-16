<form class="searchbar" action="<?= page("search")->url() ?>">
	<input type="search" name="q" value="" autocomplete="off" 
	<?php if (isset($placeholder)): ?>
	placeholder="<?= l::get('search').'…' ?>"
	<?php endif ?>
	/>
	<label>
		<input type="submit" value="">
		<div class="button">
			<svg role="presentation">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= url('assets/images/svg-sprite.svg') ?>#arrow-right"></use>
			</svg>
		</div>
	</label>
</form>