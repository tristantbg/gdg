<?php

v::$validators['unique'] = function($value, $field) {
  $values = array_column(yaml($value), $field);
  return count($values) === count(array_flip($values));
  // or
  // return count($values) !== count(array_unique($values));

};

// PAGE METHODS

page::$methods['formattedDate'] = function($page) {

	if($page->date('%e %B %Y') == $page->date('%e %B %Y', 'dateEnd') || !$page->dateEnd()->exists()) {
		$formattedDate = utf8_encode($page->date('%e&nbsp;%B %Y'));
	}
	else if($page->date('%Y') == $page->date('%Y', 'dateEnd')) {
		$formattedDate = utf8_encode($page->date('%e&nbsp;%B'));
		$formattedDate .= '–';
		$formattedDate .= utf8_encode($page->date('%e&nbsp;%B %Y', 'dateEnd'));
	} else {
		$formattedDate = utf8_encode($page->date('%e&nbsp;%B %Y'));
		$formattedDate .= '–';
		$formattedDate .= utf8_encode($page->date('%e&nbsp;%B %Y', 'dateEnd'));
	}

	return $formattedDate;
};

page::$methods['displayTags'] = function($page) {

  if ($page->intendedTemplate() == 'exhibition') {

    $html = '<div class="tag">'.l::get('exhibitions.singular').'</div>';

  } else {

    $tags = $page->tags()->split();
    $html = '';

    if(count($tags) > 0) {

      foreach ($tags as $key => $t) {
        $html .= '<div class="tag">'.html($t).'</div>';
      }

    }

  }
    return '<div class="tags">'.$html.'</div>';
};


page::$methods['getArtpieces'] = function($page) {

	$artpieces = new Collection();

	if($page->artpieces()->isNotEmpty()) {
		$index = site()->index()->filterBy('intendedTemplate', 'artpiece')->visible();
		$artpiecesList = $page->artpieces()->toStructure();

		foreach ($artpiecesList as $key => $artId) {
			$artPage = $index->findBy('autoid', strval($artId));
			if ($artPage) $artpieces->data[] = $artPage;
		}
	}

	return $artpieces;
};

page::$methods['getExhibitions'] = function($page) {

	$relatedExhibitions = new Collection();
	$exhibitions = site()->index()->filterBy('intendedTemplate', 'exhibition')->visible()->sortBy('date', 'desc');
	$pageId = $page->autoid()->value();

	foreach ($exhibitions as $key => $e) {
		foreach ($e->artists()->toStructure() as $key => $a) {
			if($a == $pageId){
				$relatedExhibitions->data[] = $e;
			}
		}
	}

	return $relatedExhibitions;
};

page::$methods['getArtists'] = function($page) {

  $artists = new Collection();

  if($page->artists()->isNotEmpty()) {
    $index = site()->index()->filterBy('intendedTemplate', 'artist')->visible();
    $artistsList = $page->artists()->toStructure();
    foreach ($artistsList as $key => $artId) {
      $artistPage = $index->findBy('autoid', strval($artId));
      if($artistPage) $artists->data[] = $artistPage;
    }
  }

  return $artists->sortBy('surname', 'asc');
};


page::$methods['initials'] = function($page) {

  $name = $page->title();
  $initials = preg_replace("/(?![A-Z])./", "", $name);

  return $initials;
};

kirbytext::$tags['sup'] = array(
  'html' => function($tag) {
    return '<sup>'.html($tag->attr('sup')).'</sup>';
  }
);

// FUNCTIONS

function translate($key, $replacements = array()) {
  $string = l::get($key);
  if(is_string($replacements)) $replacements = array($replacements);
  foreach($replacements as $placeholder => $replace) {
    $string = str_ireplace('{{' . $placeholder . '}}', $replace, $string);
  }
  return $string;
};
// HOWTO: e($num > 1, translate('blogposts.plural', $num),  translate('blogposts.singular'));

function getRelatedPages($content) {

  $relatedPages = new Collection();
  $index = site()->index()->visible();

  foreach ($content as $key => $p) {
  	$rP = $index->findBy('autoid', $p->get('content')->value());
    if($rP) $relatedPages->data[] = $rP;
  }

  return $relatedPages;
};

function displayTags($tags) {
    $tags = $tags->split();
    $html = '';

    if(count($tags) > 0) {

      foreach ($tags as $key => $t) {
        $html .= '<div class="tag">'.html($t).'</div>';
      }

    }

    return '<div class="tags">'.$html.'</div>';
};

// ROUTES

kirby()->routes(array(
	array(
		'pattern' => 'robots.txt',
		'action' => function () {
			return new Response('User-agent: *
				Disallow: /content/*.txt$
				Disallow: /kirby/
				Disallow: /site/
				Disallow: /*.md$
				Sitemap: ' . u('sitemap.xml'), 'txt');
		}
		)
));