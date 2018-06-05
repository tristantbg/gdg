<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'K2-PERSONAL-8df69012805173a0bd725c5661bbee6e');
c::set('imagekit.license', 'IMGKT1-8df69012805173a0bd725c5661bbee6e');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('debug', true);
c::set('autobuster', true);
c::set('cache', true);
c::set('cache.ignore', array(
  'home'
));
c::set('cache.driver', 'memcached');
c::set('date.handler', 'strftime');
c::set('plugin.embed.video.lazyload', true);
c::set('plugin.embed.video.lazyload.btn', 'assets/images/play.png');
c::set('kirbytext.image.figure', false);
c::set('imagekit.widget.discover', false);
c::set('textarea.buttons', array(
  "bold",
  "italic",
  "link",
  "page",
  "email"
));
c::set('simplemde.buttons', array(
  "bold",
  "italic",
  "link",
  "page",
  "email"
));
//Typo
c::set('typography', false);
c::set('typography.widget', false);
c::set('typography.ordinal.suffix', false);
c::set('typography.fractions', false);
c::set('typography.dashes.spacing', false);
c::set('typography.hyphenation', false);
//c::set('typography.hyphenation.language', 'fr');
//c::set('typography.hyphenation.minlength', 5);
c::set('typography.hyphenation.headings', false);
c::set('typography.hyphenation.allcaps', false);
c::set('typography.hyphenation.titlecase', false);
//Settings
c::set('sitemap.exclude', array('error'));
c::set('sitemap.important', array('contact'));
c::set('thumb.quality', 90);
c::set('thumbs.driver', 'im');
c::set('languages', array(
  array(
    'code'    => 'fr',
    'name'    => 'Français',
    'locale'  => 'fr_FR',
    'default' => true,
    'url'     => '/',
  ),
  array(
    'code'    => 'en',
    'name'    => 'Anglais',
    'locale'  => 'en_US',
    'url'     => '/en',
  ),
));
c::set('roles', array(
  array(
    'id'      => 'admin',
    'name'    => 'Admin',
    'default' => true,
    'panel'   => true
  ),
  array(
    'id'      => 'editor',
    'name'    => 'Editor',
    'panel'   => true
  ),
  array(
    'id'      => 'press',
    'name'    => 'Press',
    'panel'   => false
  )
));
