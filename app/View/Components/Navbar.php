<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $items;

    public function __construct($items = [])
    {
        $this->items = $this->buildDefaultItems($items);
    }

    /**
     * Build the default navbar items based on auth status and permissions.
     *
     * @param array $customItems Custom items passed to the component.
     * @return array
     */
    private function buildDefaultItems(array $customItems): array
    {
        $defaultItems = [];

        if (Auth::check()) {
            $user = Auth::user();

            if ($user->canRead()) {
                $defaultItems[] = ['type' => 'link', 'label' => 'Dashboard', 'url' => route('dashboard.dashboard')];
            }

            if ($user->canWrite()) {
                $defaultItems[] = ['type' => 'link', 'label' => 'Create Article', 'url' => route('dashboard.posts.create')];
                $defaultItems[] = ['type' => 'link', 'label' => 'Tags', 'url' => route('dashboard.tags.index')];
                $defaultItems[] = ['type' => 'link', 'label' => 'Categories', 'url' => route('dashboard.categories.index')];
                $defaultItems[] = ['type' => 'link', 'label' => 'Chains', 'url' => route('dashboard.chains.index')];

            }

            $defaultItems[] = ['type' => 'form', 'label' => 'Logout', 'url' => route('logout')];
        } else {
            $defaultItems[] = ['type' => 'link', 'label' => 'Home', 'url' => route('main')];
            $defaultItems[] = ['type' => 'link', 'label' => 'Login', 'url' => route('login')];
        }

        return array_merge($defaultItems, $customItems);
    }

    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
