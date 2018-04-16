<?php

return function ($site, $pages, $page) {

	return array(
		'featuredPage' => $site->index()->findBy('autoid', $page->featuredPage()->value())
	);
}

?>
