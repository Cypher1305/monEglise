<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonyController extends Controller
{
    // Affiche les témoignages publiés
    public function publicIndex()
    {
        $testimonies = Testimony::where('status', 'published')
                                 ->latest()
                                 ->get();
        return view('testimonies.index', compact('testimonies'));
    }

    // Formulaire de création (membre)
    public function create()
    {
        return view('testimonies.create');
    }

    // Stocke un nouveau témoignage (pending)
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $data['user_id'] = Auth::id();

        // Auto-publier si admin
        if (Auth::user()->role === 'admin') {
            $data['status'] = 'published';
        } else {
            $data['status'] = 'pending';
        }

        Testimony::create($data);

        return redirect()->route('testimonies.index')
                        ->with('success', Auth::user()->role === 'admin'
                            ? 'Votre témoignage a été publié avec succès.'
                            : 'Votre témoignage a été soumis et sera examiné.');
    }


    // Liste admin de tous les témoignages
    public function adminIndex()
    {
        $testimonies = Testimony::orderBy('created_at', 'desc')->get();
        return view('admin.testimonies.index', compact('testimonies'));
    }

    // Publier un témoignage
    public function publish(Testimony $testimony)
    {
        $testimony->update(['status' => 'published']);
        return back()->with('success', 'Témoignage publié.');
    }

    // Rejeter un témoignage
    public function reject(Testimony $testimony)
    {
        $testimony->update(['status' => 'rejected']);
        return back()->with('success', 'Témoignage rejeté.');
    }

    public function destroy(Testimony $testimony)
    {
        $testimony->delete();
        return back()->with('success', 'Témoignage supprimé.');
    }

}
