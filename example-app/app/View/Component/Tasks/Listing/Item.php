<?php

namespace App\View\Component\Tasks\Listing;

use App\Models\Task;
use Illuminate\View\Component;
use Illuminate\View\View;

class Item extends Component {
    /**
     * Create the component instance.
     *
     * @param Task $task
     */
    public function __construct(
        public Task $task
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.tasks.listing.item');
    }
}
