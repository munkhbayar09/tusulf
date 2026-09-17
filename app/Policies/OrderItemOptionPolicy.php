<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\OrderItemOption;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderItemOptionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:OrderItemOption');
    }

    public function view(AuthUser $authUser, OrderItemOption $orderItemOption): bool
    {
        return $authUser->can('View:OrderItemOption');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:OrderItemOption');
    }

    public function update(AuthUser $authUser, OrderItemOption $orderItemOption): bool
    {
        return $authUser->can('Update:OrderItemOption');
    }

    public function delete(AuthUser $authUser, OrderItemOption $orderItemOption): bool
    {
        return $authUser->can('Delete:OrderItemOption');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:OrderItemOption');
    }

    public function restore(AuthUser $authUser, OrderItemOption $orderItemOption): bool
    {
        return $authUser->can('Restore:OrderItemOption');
    }

    public function forceDelete(AuthUser $authUser, OrderItemOption $orderItemOption): bool
    {
        return $authUser->can('ForceDelete:OrderItemOption');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:OrderItemOption');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:OrderItemOption');
    }

    public function replicate(AuthUser $authUser, OrderItemOption $orderItemOption): bool
    {
        return $authUser->can('Replicate:OrderItemOption');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:OrderItemOption');
    }

}