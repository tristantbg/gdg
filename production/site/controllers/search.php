<?php

return function ($site, $pages, $page) {

	$query   = get('q');
	$results = $site->index()->visible()->search($query, 'title|text|maintext|chapeau|sections');

	return array(
		'query' => $query,
		'results' => $results
	);
}

?>
