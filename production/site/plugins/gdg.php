<?php

v::$validators['unique'] = function($value, $field) {
  $values = array_column(yaml($value), $field);
  return count($values) === count(array_flip($values));
  // or
  // return count($values) !== count(array_unique($values));

};

// PAGE METHODS

field::$methods['ktRaw'] = function($field) {
  $text = $field->kirbytext();
  return preg_replace('/(.*)<\/p>/', '$1', preg_replace('/<p>(.*)/', '$1', $text));
};


page::$methods['formattedDate'] = function($page) {

	if($page->date('%d %B %Y') == $page->date('%d %B %Y', 'dateEnd') || !$page->dateEnd()->exists()) {
    if (site()->language()->code() == "en") {
      $formattedDate = utf8_encode($page->date('%B&nbsp;%d,&nbsp;%Y'));
    } else {
		  $formattedDate = utf8_encode($page->date('%d&nbsp;%B&nbsp;%Y'));
    }
	}
	else if($page->date('%Y') == $page->date('%Y', 'dateEnd')) {
    if (site()->language()->code() == "en") {
      $formattedDate = utf8_encode($page->date('%B&nbsp;%d'));
      $formattedDate .= '–';
      $formattedDate .= utf8_encode($page->date('%B&nbsp;%d,&nbsp;%Y', 'dateEnd'));
    } else {
  		$formattedDate = utf8_encode($page->date('%d&nbsp;%B'));
  		$formattedDate .= '–';
  		$formattedDate .= utf8_encode($page->date('%d&nbsp;%B&nbsp;%Y', 'dateEnd'));
    }
	} else {
    if (site()->language()->code() == "en") {
      $formattedDate = utf8_encode($page->date('%B&nbsp;%d,&nbsp;%Y'));
      $formattedDate .= '–';
      $formattedDate .= utf8_encode($page->date('%B&nbsp;%d,&nbsp;%Y', 'dateEnd'));
    } else {
      $formattedDate = utf8_encode($page->date('%d&nbsp;%B&nbsp;%Y'));
      $formattedDate .= '–';
      $formattedDate .= utf8_encode($page->date('%d&nbsp;%B&nbsp;%Y', 'dateEnd'));
    }
	}

  $date = str_replace('– ', '–', $formattedDate);
  $date = str_replace('&nbsp; ', '&nbsp;', $formattedDate);

	return $date;
};

page::$methods['displayTags'] = function($page) {

    $tags = $page->tags()->split();
    $html = '';

    if(count($tags) > 0) {
      $html = new Brick('div');
      $html->attr('class', 'tags');
      foreach ($tags as $key => $t) {
        $tag = new Brick('a');
        $tag->attr('href', page('index')->url().'/by:tag/tag:'.$t);
        $tag->attr('class', 'tag');
        $tag->append($t);
        $html->append($tag);
      }

    }

    if ($html != '') {
      return $html;
    } else {
      return '';
    }
};


page::$methods['getArtpieces'] = function($page) {

	$artpieces = new Collection();

	if($page->artpieces()->isNotEmpty()) {
		$index = site()->index()->filterBy('intendedTemplate', 'artpiece')->visible()->filterBy('featured', '!=', '');
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

field::$methods['spaceSafe'] = function($field, $raw = false) {

  if($raw) {
	 $text = $field->ktRaw();
  } else {
   $text = $field->kt();
  }
	$search  = array(" :", " ?", " !", " ;");
	$replace = array("&nbsp;:", "&nbsp;?", "&nbsp;!", "&nbsp;;");

	$newText = str_replace($search, $replace, $text);

	return $newText;
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
  if ($content->isNotEmpty()) {
    foreach ($content as $key => $p) {
      if ($p->get('content')->isNotEmpty()) {
      	$rP = $index->findBy('autoid', $p->get('content')->value());
      } else {
        $rP = new Collection();
        $rP->set('featured', $p->get('thumb'));
        $rP->set('title', $p->get('title'));
        $rP->set('subtitle', $p->get('subtitle'));
        $rP->set('secondaryTitle', $p->get('secondaryTitle'));
        $rP->set('summary', $p->get('summary'));
        $rP->set('tags', $p->get('tags'));
        $rP->set('link', $p->get('link'));
      }
      if($rP) {
        if ($p->get('thumb')->isNotEmpty()) $rP->set('featured', $p->get('thumb'));
        if ($p->get('title')->isNotEmpty()) $rP->set('title', $p->get('title'));
        if ($p->get('subtitle')->isNotEmpty()) $rP->set('subtitle', $p->get('subtitle'));
        if ($p->get('secondaryTitle')->isNotEmpty()) $rP->set('secondaryTitle', $p->get('secondaryTitle'));
        if ($p->get('summary')->isNotEmpty()) $rP->set('summary', $p->get('summary'));
        if ($p->get('tags')->isNotEmpty()) $rP->set('tags', $p->get('tags'));
        if ($p->get('link')->isNotEmpty()) $rP->set('link', $p->get('link'));
      }

      if($rP) $relatedPages->data[] = $rP;
    }
  }

  return $relatedPages;
};

function displayTags($tags, $withoutLinks = false) {

	$tags = $tags->split();
	$html = '';

	if(count($tags) > 0) {

		foreach ($tags as $key => $t) {
			if ($withoutLinks) {
				$html .= '<div class="tag">'.html($t).'</div>';
			} else {
				$html .= '<a href="'.page('index')->url().'/by:tag/tag:'.$t.'" class="tag">'.html($t).'</a>';
			}
		}

	}

	return '<div class="tags">'.$html.'</div>';

};

function column_sort($unsorted, $column) {
    $sorted = $unsorted;
    for ($i=0; $i < sizeof($sorted)-1; $i++) {
      for ($j=0; $j<sizeof($sorted)-1-$i; $j++)
        if ($sorted[$j][$column] > $sorted[$j+1][$column]) {
          $tmp = $sorted[$j];
          $sorted[$j] = $sorted[$j+1];
          $sorted[$j+1] = $tmp;
      }
    }
    return $sorted;
}

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
