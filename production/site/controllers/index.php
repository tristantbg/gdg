<?php

return function ($site, $pages, $page) {

	$data = array('by' => 'default');
	$by = param('by');

	switch ($by) {
		case 'exhibition':

			$data = array(
				'by' => $by,
				'exhibitions' => site()->index()->filterBy('intendedTemplate', 'exhibition')->visible()->sortBy('date', 'desc')
			);

			break;

		case 'artist':

			$allArtists = site()->index()->filterBy('intendedTemplate', 'artist')->visible()->sortBy('surname', 'asc');
			$artistsByLetter = sortPagesBy($allArtists, array('group' => 'letter'));

			$data = array(
				'by' => $by,
				'artists' => $artistsByLetter
			);

			break;

		case 'tag':

			$allArticles = site()->index()->filterBy('intendedTemplate', 'article')->visible()->sortBy('date', 'desc')->filterBy('featured', '!=', '');

			if ($tag = param('tag')) {
				$allArticles = $allArticles->filterBy('tags', $tag, ',');
			}

			$data = array(
				'by' => $by,
				'articles' => $allArticles->paginate(24),
				'tag' => $tag
			);

			break;

		default:
			$artpieces = site()->index()->filterBy('intendedTemplate', 'artist')->visible()->children()->visible()->filterBy('featured', '!=', '');

			$data = array(
				'by' => $by,
				'artpieces' => $artpieces->shuffle()
			);

			break;
	}


	return $data;
}

?>
