<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/events/detail/([0-9]+)#',
    'RULE' => 'ID=$1',
    'ID' => 'bitrix:news.detail',
    'PATH' => '/events/detail.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/articles/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/articles/index.php',
    'SORT' => 100,
  ),
);
