<?php

return function ($site, $pages, $page) {

	$index = $site->index();

	$medias = new Collection();
	if($page->content('fr')->get('templateImage1')->isNotEmpty()) $medias->data[] = $page->content('fr')->get('templateImage1');
	if($page->content('fr')->get('templateImage2')->isNotEmpty()) $medias->data[] = $page->content('fr')->get('templateImage2');
	if($page->content('fr')->get('templateImage3')->isNotEmpty()) $medias->data[] = $page->content('fr')->get('templateImage3');
	if($page->content('fr')->get('templateImage4')->isNotEmpty()) $medias->data[] = $page->content('fr')->get('templateImage4');
	if($page->content('fr')->get('templateImage5')->isNotEmpty()) $medias->data[] = $page->content('fr')->get('templateImage5');

	return array(
		'indexPage' => page('index'),
		'medias' => $medias,
		'featuredPage' => $index->findBy('autoid', $page->featuredPage()->value()),
    	'featuredPage2' => $index->findBy('autoid', $page->featuredPage2()->value()),
    	'artpieces' => $index->filterBy('intendedTemplate', 'artpiece')->visible()->filterBy('featured', '!=', '')->shuffle()->limit(30)
	);
}

?>
