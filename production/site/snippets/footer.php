</div>

<?php snippet('partials/footer') ?>

</div>

</div>

<div id="outdated">
	<div class="inner">
	<p>GALERIE DES GALERIES prend en charge de nombreux navigateurs<br>mais il semble que celui-ci soit obsolète,<br>veuillez utiliser le navigateur Google Chrome ou bien <a href="http://outdatedbrowser.com" target="_blank">mettre à jour votre navigateur.</a></p>
	<p>GALERIE DES GALERIES supports many browsers<br>but it seems that it is obsolete,<br>please use the Google Chrome browser or <a href="http://outdatedbrowser.com" target="_blank">update your browser.</a></p>
	</div>
</div>

<?php if($site->googleanalytics()->isNotEmpty()): ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115150448-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', '<?= $site->googleanalytics() ?>');
	</script>
<?php endif ?>

<script>
	var $sitetitle = '<?= $site->title()->escape() ?>';
</script>

<?= js('assets/js/build/app.min.js'); ?>

</body>
</html>