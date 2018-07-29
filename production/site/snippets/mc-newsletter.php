<?php if ($site->mailchimp()->isNotEmpty()): ?>
<div id="mc_embed_signup">
	<form action="<?= $site->mailchimp() ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate arrow-form" target="_blank" novalidate>
	<div id="mc_embed_signup_scroll">

	<div class="mc-field-group">
	<!-- <label for="mce-EMAIL">E-mail:</label> -->
	<input type="email" value="" placeholder="E-mail" name="EMAIL" class="required email" id="mce-EMAIL">
	<label>
		<input type="submit" value="" name="subscribe" id="mc-embedded-subscribe" value="">
		<div class="arrow-button">
			<svg role="presentation">
				<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?= url('assets/images/svg-sprite.svg') ?>#arrow-right"></use>
			</svg>
		</div>
	</label>
	</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
	<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_eb7b34683fcb919ed54a51cd1_28ac524572" tabindex="-1" value=""></div>
	<div class="clear">
	</div>
	</form>
</div>
<?php endif ?>
<?php // https://galeriedesgaleries.us18.list-manage.com/subscribe/post?u=eb7b34683fcb919ed54a51cd1&amp;id=7da157c35e ?>