<?php $field = $field->toStructure()->first() ?>
<?php
if ($field) {
  if ($field->thumb()->toFile()) {
  	$poster = $field->thumb()->toFile()->width(1000)->url();
  } else {
  	$poster = '';
  }
  $videoContainer = Brick('div')->attr('class', 'video-container');
  $video = null;

  if ($field->stream()->isNotEmpty() ||
  	$field->mp4()->isNotEmpty() ||
  	$field->webm()->isNotEmpty() ||
  	$field->filemp4()->isNotEmpty() ||
  	$field->filewebm()->isNotEmpty()) {

  	$video = Brick('video')
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

    $videoContainer->append($video);


    $videoContainer->append('<svg class="play-button" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="'.url("assets/images/svg-sprite.svg").'#play"></use></svg>');

  	echo $videoContainer;
  }
  else {

  	snippet('responsive-image', array('field' => $field->thumb()));

  }
}
?>
