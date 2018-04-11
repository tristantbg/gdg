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
