<?php

return function ($site, $pages, $page) {

	return array(
    	'visits' => array(
    		$page->visits1()->toStructure(), 
    		$page->visits2()->toStructure(), 
    		$page->visits3()->toStructure(), 
    		$page->visits4()->toStructure()
    	),
    	'partners' => $page->partners()->toStructure(),
    	'team' => $page->team()->toStructure(),
    	'press' => $page->press()->toStructure(),
	);
}

?>
