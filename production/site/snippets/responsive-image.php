<?php if($image = $field->toFile()): ?>

	<div class="responsive-image">
		<?php 
		if (isset($ratio)) {
			$src = $image->crop(1000, floor(1000/$ratio))->url();
			$srcset = $image->crop(500, floor(500/$ratio))->url() . ' 500w,';
			for ($i = 1000; $i <= 3000; $i += 1000) $srcset .= $image->crop($i, floor($i/$ratio))->url() . ' ' . $i . 'w,';
		} else {
			$src = $image->width(1000)->url();
			$srcset = $image->width(500)->url() . ' 500w,';
			for ($i = 1000; $i <= 3000; $i += 1000) $srcset .= $image->width($i)->url() . ' ' . $i . 'w,';
		}
		?>
		<img class="lazy lazyload" 
		src="<?= $image->width(50)->dataUri() ?>" 
		data-src="<?= $src ?>" 
		data-srcset="<?= $srcset ?>" 
		data-sizes="auto" 
		data-optimumx="1.5" 
		<?php if (isset($caption) && $caption): ?>
		alt="<?= $caption.' - © '.$site->title()->html() ?>" 
		<?php elseif ($image->caption()->isNotEmpty()): ?>
		alt="<?= $image->caption().' - © '.$site->title()->html() ?>" 
		<?php else: ?>
		alt="<?= $page->title()->html().' - © '.$site->title()->html() ?>" 
		<?php endif ?>
		width="100%" height="auto" />
		<noscript>
			<img src="<?= $src ?>" 
			<?php if (isset($caption) && $caption): ?>
			alt="<?= $caption.' - © '.$site->title()->html() ?>" 
			<?php elseif ($image->caption()->isNotEmpty()): ?>
			alt="<?= $image->caption().' - © '.$site->title()->html() ?>" 
			<?php else: ?>
			alt="<?= $page->title()->html().' - © '.$site->title()->html() ?>" 
			<?php endif ?>
			width="100%" height="auto" />
		</noscript>
		<?php if (isset($withCaption) && $image->caption()->isNotEmpty()): ?>
			<div class="row caption"><?= $image->caption()->kt() ?></div>
		<?php endif ?>
	</div>

<?php endif ?>