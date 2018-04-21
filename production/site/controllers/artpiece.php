<?php

return function ($site, $pages, $page) {

	$artpiece = new Collection();
	$artpiece->data[] = $page;

	return array(
		'artpiece' => $artpiece,
		'artpieces' => $page->parent()->children()->visible()->not($page)->filterBy('featured', '!=', ''),
		'exhibitions' => $page->getExhibitions(),
	);
}

?>
