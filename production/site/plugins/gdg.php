<?php

v::$validators['unique'] = function($value, $field) {
  $values = array_column(yaml($value), $field);
  return count($values) === count(array_flip($values));
  // or
  // return count($values) !== count(array_unique($values));

};

function translate($key, $replacements = array()) {
  $string = l::get($key);
  if(is_string($replacements)) $replacements = array($replacements);
  foreach($replacements as $placeholder => $replace) {
    $string = str_ireplace('{{' . $placeholder . '}}', $replace, $string);
  }
  return $string;
};
// HOWTO: e($num > 1, translate('blogposts.plural', $num),  translate('blogposts.singular'));

page::$methods['formattedDate'] = function($page) {

	if($page->date('%e %B %Y') == $page->date('%e %B %Y', 'dateEnd')) {
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

page::$methods['getArtpieces'] = function($page) {

	$artpieces = new Collection();

	if($page->artpieces()->isNotEmpty()) {
		$index = site()->index()->filterBy('intendedTemplate', 'artpiece')->visible();
		$artpiecesList = $page->artpieces()->toStructure();

		foreach ($artpiecesList as $key => $artId) {
			$artPage = $index->findBy('autoid', $artId);
			$artpieces->data[] = $artPage;
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
