<?php

kirby()->hook('panel.page.create', function($page) {
	$templates = c::get('autopublish.templates');
	if (!$templates || in_array($page->template(), $templates)) {
		try {
			$page->sort('last');
			kirby()->trigger('panel.page.update', $page);
		} catch(Exception $e) {
			return response::error($e->getMessage());
		}
	}
});
