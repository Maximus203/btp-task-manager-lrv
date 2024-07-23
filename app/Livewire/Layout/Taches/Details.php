<?php

// namespace App\Livewire\Layout\Taches;

// use App\Models\Tache;
// use Illuminate\Support\Facades\Auth;
// use Livewire\Component;
// use Livewire\WithFileUploads;

// class Details extends Component
// {
//     use WithFileUploads;

//     public $idTache;
//     public $commentaire;
//     public $commentaires = [];
//     public $commentToDelete;
//     public $image;
//     public $imagePath;
//     public $cheminImage;


//     public function mount($id)
//     {
//         $this->idTache = $id;
//         $this->loadCommentaires();
//         $this->loadImage();
//     }

//     public function render()
//     {
//         $tache = Tache::with('responsable', 'projet')->find($this->idTache);

//         return view('livewire.layout.taches.details', [
//             'tache' => $tache,
//         ]);
//     }

//     public function submitComment()
//     {
//         $this->validate([
//             'commentaire' => 'required|string|max:255',
//         ]);

//         $tache = Tache::find($this->idTache);

//         // Vérifier le rôle de l'utilisateur
//         $userRole = Auth::user()->idRole;
//         $mention = $userRole === 4 ? ' (Commentaire du client)' : '';

//         $tache->commentaire = $this->commentaire . $mention;
//         $tache->save();

//         $this->commentaire = '';
//         $this->loadCommentaires();
//     }

//     public function confirmDeleteComment($comment)
//     {
//         $this->commentToDelete = $comment;
//         $this->dispatchBrowserEvent('confirmDeleteComment');
//     }

//     public function deleteComment()
//     {
//         $tache = Tache::find($this->idTache);
//         $tache->commentaire = null;
//         $tache->save();

//         $this->commentToDelete = null;
//         $this->loadCommentaires();
//     }

//     protected function loadCommentaires()
//     {
//         $tache = Tache::find($this->idTache);
//         $this->commentaires = $tache->commentaire ? [$tache->commentaire] : [];
//     }

//     protected function loadImage()
//     {
//         $tache = Tache::find($this->idTache);
//         $this->imagePath = $tache->image;
//     }

//     public function save()
//     {
//         $this->validate([
//             'image' => 'image|mimes:jpg,jpeg,png,gif,bmp,svg|max:1024', // 1 Mo maximum
//         ]);

//         $nomImage = $this->image->getClientOriginalName();
//         $cheminImage = $this->image->storeAs('images', $nomImage, 'public');

//         $tache = Tache::find($this->idTache);

//         if ($tache->image) {
//             $imagesExistants = explode(',', $tache->image);
//             $imagesExistants[] = $cheminImage;
//             $tache->image = implode(',', $imagesExistants);
//         } else {
//             $tache->image = $cheminImage;
//         }

//         $tache->save();

//         $this->imagePath = $tache->image; // Ajoutez cette ligne pour mettre à jour $imagePath
//         $this->image = null;
//     }



//     public function deleteImage($index)
//     {
//         $tache = Tache::find($this->idTache);
//         $images = explode(',', $tache->image);

//         if (count($images) > 1) {
//             unset($images[$index]);
//             $tache->image = implode(',', $images);
//         } else {
//             $tache->image = null;
//         }

//         $tache->save();

//         // Émettre un événement pour mettre à jour les images du tableau de bord
//         // $this->emitUp('imageDeleted');
//         // session()->flash('message', 'Image supprimée avec succès !');
//     }
// }
namespace App\Livewire\Layout\Taches;

use App\Models\Tache;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Details extends Component
{
    use WithFileUploads;

    public $idTache;
    public $commentaire;
    public $commentaires = [];
    public $commentToDelete;
    public $image;
    public $imagePath;
    public $rapport;
    public $rapportPath;

    public function mount($id)
    {
        $this->idTache = $id;
        $this->loadCommentaires();
        $this->loadImage();
        $this->loadRapport();
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

        $userRole = Auth::user()->idRole;
        $mention = $userRole === 4 ? ' (Commentaire du client)' : '';

        $tache->commentaire = $this->commentaire . $mention;
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

    protected function loadImage()
    {
        $tache = Tache::find($this->idTache);
        $this->imagePath = $tache->image;
    }

    protected function loadRapport()
    {
        $tache = Tache::find($this->idTache);
        $this->rapportPath = $tache->rapport;
    }

    public function saveImage()
    {
        $this->validate([
            'image' => 'image|mimes:jpg,jpeg,png,gif,bmp,svg|max:1024', // 1 Mo maximum
        ]);

        $nomImage = $this->image->getClientOriginalName();
        $cheminImage = $this->image->storeAs('images', $nomImage, 'public');

        $tache = Tache::find($this->idTache);

        if ($tache->image) {
            $imagesExistants = explode(',', $tache->image);
            $imagesExistants[] = $cheminImage;
            $tache->image = implode(',', $imagesExistants);
        } else {
            $tache->image = $cheminImage;
        }

        $tache->save();

        $this->imagePath = $tache->image;
        $this->image = null;
    }

    public function saveRapport()
    {
        $tache = Tache::find($this->idTache);

        // Vérifiez si le statut de la tâche est 'terminé'
        if ($tache->statut !== 'terminer') {
            session()->flash('error', 'La tâche n\'est pas encore terminée. Impossible d\'uploader le rapport.');
            return;
        }

        $this->validate([
            'rapport' => 'file|mimes:pdf|max:10240', // 10 Mo maximum
        ]);

        $nomRapport = $this->rapport->getClientOriginalName();
        $cheminRapport = $this->rapport->storeAs('rapports', $nomRapport, 'public');

        $tache->rapport = $cheminRapport;
        $tache->save();

        $this->rapportPath = $tache->rapport;
        $this->rapport = null;
    }


    public function deleteImage($index)
    {
        $tache = Tache::find($this->idTache);
        $images = explode(',', $tache->image);

        if (count($images) > 1) {
            unset($images[$index]);
            $tache->image = implode(',', $images);
        } else {
            $tache->image = null;
        }

        $tache->save();
    }
}
