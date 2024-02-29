<?php

namespace App\Policies;

use App\Models\CeVille;
use Dcs\Admin\Models\SysUser;
use Illuminate\Auth\Access\Response;

class CeVillePolicy
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
    public function view(SysUser $sysUser, CeVille $CeVille): bool
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
    public function update(SysUser $sysUser, CeVille $CeVille): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(SysUser $sysUser, CeVille $CeVille): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(SysUser $sysUser, CeVille $CeVille): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(SysUser $sysUser, CeVille $CeVille): bool
    {
        //
    }
}
