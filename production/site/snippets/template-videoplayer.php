<?php $field = $field->toStructure()->first() ?>
<?php
if ($field->thumb()->toFile()) {
	$poster = $field->thumb()->toFile()->width(1000)->url();
} else {
	$poster = '';
}
$video = null;

if ($field->stream()->isNotEmpty() || 
	$field->external()->isNotEmpty() || 
	$field->mp4()->isNotEmpty() || 
	$field->webm()->isNotEmpty() || 
	$field->filemp4()->isNotEmpty() || 
	$field->filewebm()->isNotEmpty()) {

	$video = brick('video')
				->attr('class', 'media js-player')
				->attr('poster', $poster)
				->attr('width', '100%')
				->attr('height', 'auto')
				->attr('preload', 'none');

	if ($field->stream()->isNotEmpty()) $video->attr('data-stream', $field->stream());
	
	if ($field->mp4()->isNotEmpty()) {

		$video->append('<source src=' . $field->mp4() . ' type="video/mp4">');

		if ($field->webm()->isNotEmpty()) $video->append('<source src=' . $field->webm() . ' type="video/webm">');

	} else if ($file = $field->filemp4()->toFile()){

		$video->append('<source src=' . $file->url() . ' type="video/mp4">');

		if ($file = $field->filewebm()->toFile()) $video->append('<source src=' . $file->url() . ' type="video/webm">');
	}

	echo $video;

	echo '<svg class="play-button" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="'.url("assets/images/svg-sprite.svg").'#play"></use></svg>';
}
else {

	$url = $field->videolink();

	if ($field->vendor() == "youtube") {
		echo '<div class="media js-player" data-type="youtube" data-video-id="' . $url  . '"></div>';
	} else {
		echo '<div class="media js-player" data-type="vimeo" data-video-id="' . $url  . '"></div>';
	}

}
?>