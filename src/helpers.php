<?php

if ( ! function_exists('can'))
{
	function can($permission)
	{
		return app('creolab.vault')->can($permission);
	}
}


if ( ! function_exists('cannot'))
{
	function cannot($permission)
	{
		return app('creolab.vault')->cannot($permission);
	}
}


if ( ! function_exists('has_role'))
{
	function has_role($role)
	{
		return app('creolab.vault')->hasRole($role);
	}
}
