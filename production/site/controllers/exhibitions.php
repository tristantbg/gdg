<?php

return function ($site, $pages, $page) {

	return array(
		'exhibitions' => $page->children()->visible()->sortBy('date', 'desc'),
	);
}

?>
