<?php

return function ($site, $pages, $page) {

	$index = $site->index();

	return array(
		'indexPage' => page('index'),
		'featuredPage' => $index->findBy('autoid', $page->featuredPage()->value()),
    	'featuredPage2' => $index->findBy('autoid', $page->featuredPage2()->value()),
    	'artpieces' => $index->filterBy('intendedTemplate', 'artpiece')->visible()->filterBy('featured', '!=', '')->shuffle()->limit(30)
	);
}

?>
