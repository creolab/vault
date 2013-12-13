<?php

return array(

	'alias' => 'Vault',

	'roles' => array(

		'user'   => array('level' => 1,   'name'  => 'User'),
		'editor' => array('level' => 50,  'name'  => 'Editor'),
		'admin'  => array('level' => 100, 'name'  => 'Administrator'),
		'super'  => array('level' => 999, 'name'  => 'Super Admin'),

	),

	'views' => array(

		'forbidden' => 'krustr::errors.forbidden',

	),

);
