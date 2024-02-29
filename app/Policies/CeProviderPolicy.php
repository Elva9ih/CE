<?php

namespace App\Policies;

use App\Models\CeProvider;
use Dcs\Admin\Models\SysUser;
use Illuminate\Auth\Access\Response;

class CeProviderPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(SysUser $sysUser): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(SysUser $sysUser, CeProvider $CeProvider): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(SysUser $sysUser): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(SysUser $sysUser, CeProvider $CeProvider): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(SysUser $sysUser, CeProvider $CeProvider): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(SysUser $sysUser, CeProvider $CeProvider): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(SysUser $sysUser, CeProvider $CeProvider): bool
    {
        //
    }
}
