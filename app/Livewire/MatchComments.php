<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FootballMatch;
use App\Models\Comment;

class MatchComments extends Component
{
    public $match;
    public $content = '';

    public function mount(FootballMatch $match)
    {
        $this->match = $match;
    }

    public function addComment()
    {
        $this->validate([
            'content' => 'required|min:1|max:255',
        ]);

        Comment::create([
            'match_id' => $this->match->id,
            'user_id' => auth()->id(),
            'content' => $this->content,
        ]);

        $this->content = '';
    }

    public function render()
    {
        $comments = $this->match->comments()
            ->latest()
            ->get();

        return view('livewire.match-comments', compact('comments'));
    }
}
