<?php

if ( ! function_exists('can'))
{
	function can($permission)
	{
		return app('creolab.vault')->can($permission);
	}
}


if ( ! function_exists('user_can'))
{
	function user_can($user_id, $permission)
	{
		return app('creolab.vault')->can($permission, $user_id);
	}
}


if ( ! function_exists('cannot'))
{
	function cannot($permission)
	{
		return app('creolab.vault')->cannot($permission);
	}
}


if ( ! function_exists('user_cannot'))
{
	function user_cannot($user_id, $permission)
	{
		return app('creolab.vault')->cannot($permission, $user_id);
	}
}


if ( ! function_exists('role'))
{
	function role($role = null)
	{
		return app('creolab.vault')->role($role);
	}
}


if ( ! function_exists('user_role'))
{
	function user_role($user_id, $role = null)
	{
		return app('creolab.vault')->role($role, $user_id);
	}
}


if ( ! function_exists('restrict'))
{
	function restrict($role)
	{
		return app('creolab.vault')->restrict($role);
	}
}
