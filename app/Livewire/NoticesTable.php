<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Notice;

class NoticesTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $notices = Notice::where('title', 'like', '%' . $this->search . '%')
                         ->orWhere('content', 'like', '%' . $this->search . '%')
                         ->orderBy('created_at', 'desc')
                         ->paginate(10);

        return view('admin.notice.notice-table', [
            'notices' => $notices
        ]);
    }
}