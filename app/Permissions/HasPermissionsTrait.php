<?php

namespace App\Permissions;

use App\Role;

trait HasPermissionsTrait
{
    public function syncRoles(... $roles)
    {
        $this->roles()->detach();

        return $this->assignRole($roles);
    }

    public function removeRole(... $roles)
    {
        $roles = $this->getAllRoles($roles);

        $this->roles()->detach($roles);
        return $this;
    }

    public function assignRole(... $roles)
    {
            //ambil model roles
        $roles = $this->getAllRoles(array_flatten($roles));

        if($roles == null){
            return $this;
        }
            //save many
        $this->roles()->saveMany($roles);
        return $this;

    }

    protected function getAllRoles(array $roles)
    {
        return Role::whereIn('name', $roles)->get();

    }

    public function hasRole(... $roles)
    {
        foreach ($roles as $role) {
            if($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

}
