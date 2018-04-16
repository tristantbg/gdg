<?php

return function ($site, $pages, $page) {
	
	return array(
		'artpieces' => $page->children()->visible(),
		'exhibitions' => $page->getExhibitions(),
	);
}

?>
