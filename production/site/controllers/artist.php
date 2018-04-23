<?php

return function ($site, $pages, $page) {
	
	return array(
		'artpieces' => $page->children()->visible()->filterBy('featured', '!=', ''),
		'exhibitions' => $page->getExhibitions(),
	);
}

?>
