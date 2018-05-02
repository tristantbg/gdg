<?php

return function ($site, $pages, $page) {

	$index = $site->index();

	$medias = new Collection();
	if($page->content('fr')->get('templateImage1')->isNotEmpty()) $medias->data[] = $page->content('fr')->get('templateImage1');
	if($page->content('fr')->get('templateImage2')->isNotEmpty()) $medias->data[] = $page->content('fr')->get('templateImage2');
	if($page->content('fr')->get('templateImage3')->isNotEmpty()) $medias->data[] = $page->content('fr')->get('templateImage3');
	if($page->content('fr')->get('templateImage4')->isNotEmpty()) $medias->data[] = $page->content('fr')->get('templateImage4');
	if($page->content('fr')->get('templateImage5')->isNotEmpty()) $medias->data[] = $page->content('fr')->get('templateImage5');

	$artpieces = new Collection();

	foreach ($index->filterBy('intendedTemplate', 'artist')->visible() as $key => $a) {
		if ($a->hasVisibleChildren()) {
			if($theOne = $a->children()->visible()->filterBy('featured', '!=', '')->shuffle()->first()) $artpieces->data[] = $theOne;
		}
	}

	return array(
		'indexPage' => page('index'),
		'medias' => $medias,
		'featuredPage' => $index->findBy('autoid', $page->featuredPage()->value()),
    	'featuredPage2' => $index->findBy('autoid', $page->featuredPage2()->value()),
    	'artpieces' => $artpieces->shuffle()->limit(30)
	);
}

?>
