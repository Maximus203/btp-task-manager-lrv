<?php

namespace App\Livewire\Layout\Taches;

use App\Models\Tache;
use Livewire\Component;

class Details extends Component
{
    public $idTache;
    public $commentaire;
    public $commentaires = [];
    public $commentToDelete;

    public function mount($id)
    {
        $this->idTache = $id;
        $this->loadCommentaires();
    }

    public function render()
    {
        $tache = Tache::with('responsable', 'projet')->find($this->idTache);

        return view('livewire.layout.taches.details', [
            'tache' => $tache,
        ]);
    }

    public function submitComment()
    {
        $this->validate([
            'commentaire' => 'required|string|max:255',
        ]);

        $tache = Tache::find($this->idTache);
        $tache->commentaire = $this->commentaire;
        $tache->save();

        $this->commentaire = '';
        $this->loadCommentaires();
    }

    public function confirmDeleteComment($comment)
    {
        $this->commentToDelete = $comment;
        $this->dispatchBrowserEvent('confirmDeleteComment');
    }

    public function deleteComment()
    {
        $tache = Tache::find($this->idTache);
        $tache->commentaire = null;
        $tache->save();

        $this->commentToDelete = null;
        $this->loadCommentaires();
    }

    protected function loadCommentaires()
    {
        $tache = Tache::find($this->idTache);
        $this->commentaires = $tache->commentaire ? [$tache->commentaire] : [];
    }
}
