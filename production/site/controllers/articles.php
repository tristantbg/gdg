<?php

return function ($site, $pages, $page) {

	return array(
		'articles' => $page->children()->visible()->sortBy('date', 'desc')->filterBy('featured', '!=', ''),
	);
}

?>
