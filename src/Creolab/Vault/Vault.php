<?php namespace Creolab\Vault;

use App, Auth;
use Illuminate\Foundation\Application;

class Vault {

	/**
	 * IoX Application dependency
	 * @var Application
	 */
	protected $app;

	/**
	 * User object from Auth class
	 * @var User
	 */
	protected $user;

	/**
	 * All roles from config
	 * @var array
	 */
	protected $roles;

	/**
	 * Initialize dependency
	 * @param Application $app
	 */
	public function __construct(Application $app)
	{
		$this->app  = $app;
		$this->user = Auth::user();
		$this->roles = $this->app['config']->get("vault::roles");
	}

	/**
	 * Return user object or key
	 * @param  mixed $id
	 * @return mixed
	 */
	public function user($id = null, $key = null)
	{
		return false;
	}

	/**
	 * Check if user has permission
	 * @param  string  $permission
	 * @param  integer $userId
	 * @return boolean
	 */
	public function can($permission, $userId = null)
	{
		return true;
	}

	/**
	 * Check if user doesn't have permission
	 * @param  string  $permission
	 * @param  integer $userId
	 * @return boolean
	 */
	public function cannot($permission, $userId = null)
	{
		return false;
	}

	/**
	 * Return user role
	 * @param  mixed  $userId
	 * @return string
	 */
	public function role($role = null, $userId = null)
	{
		if ($role)
		{
			$role        = array_get($this->roles, $role);
			$targetLevel = array_get($role, 'level');
			$userLevel   = $this->level();

			return $userLevel >= $targetLevel;
		}
		else
		{
			return ($this->user) ? $this->user->role : null;
		}
	}

	/**
	 * Return user level
	 * @param  mixed $userId
	 * @return integer
	 */
	public function level($userId = null)
	{
		$role = array_get($this->roles, $this->role());

		if ($role) return (int) array_get($role, 'level', 0);
		else       return 0;
	}

	/**
	 * Restrict access by role
	 * @param  string $role
	 * @return mixed
	 */
	public function restrict($role)
	{
		if ($this->user->role != $role)
		{
			return App::abort(403);
		}
	}

	/**
	 * Check if user is logged in
	 * @return boolean
	 */
	public function check()
	{
		return Auth::check();
	}

	/**
	 * Check if user is guest
	 * @return boolean
	 */
	public function guest()
	{
		return Auth::guest();
	}

}
