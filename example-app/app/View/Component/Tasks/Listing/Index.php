<?php

namespace App\View\Component\Tasks\Listing;

use App\Models\Task;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use Illuminate\View\View;

class Index extends Component {

    /**
     * Create the component instance.
     *
     * @param Task[] $tasks
     */
    public function __construct(
        public $tasks
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.tasks.listing.index');
    }
}

