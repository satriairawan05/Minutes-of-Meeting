<?php

namespace App\Providers;

use App\Models\Meet;
use App\Models\Page;
use App\Models\User;
use App\Models\GroupPage;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('meet-create', function (User $user, GroupPage $groupPage, Page $page) {
            $isGroupAdmin = $user->group_id === 1;
            $isGroupPageAdmin = $groupPage->page_id === 1 || $groupPage->access === 1;
            $isPageAdmin = $page->page_id === 1;

            if ($isGroupAdmin || $isGroupPageAdmin || $isPageAdmin) {
                return Response::allow();
            } else {
                return Response::deny('Group not defined');
            }
        });

        Gate::define('meet-edit', function(User $user){
            return $user->group_id === 1 ? Response::allow() : Response::deny('group not define');
        });
    }
}
