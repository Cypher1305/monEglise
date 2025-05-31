<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrayerController extends Controller
{
    // Affiche le mur public
    public function publicIndex()
    {
        $prayers = Prayer::where('status', 'published')
                         ->latest()
                         ->get();
        return view('prayers.index', compact('prayers'));
    }

    // Formulaire de création (membre)
    public function create()
    {
        return view('prayers.create');
    }

    // Enregistre une nouvelle prière (status = pending)
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data['user_id'] = Auth::id();

        // Si admin, publier directement, sinon mettre en attente
        if (Auth::user()->role == 'admin') {
            $data['status'] = 'published';
        } else {
            $data['status'] = 'pending'; // ou null si tu préfères
        }

        Prayer::create($data);

        return redirect()->route('prayers.index')
                        ->with('success', Auth::user()->role === 'admin'
                            ? 'Votre prière a été publiée avec succès.'
                            : 'Votre prière a été soumise et sera examinée.');
    }

    // Liste admin des prières en attente
    public function adminIndex()
    {
        $prayers = Prayer::orderBy('created_at', 'desc')->get();
        return view('admin.prayers.index', compact('prayers'));
    }

    // Publier (valider) une prière
    public function publish(Prayer $prayer)
    {
        $prayer->update(['status' => 'published']);
        return back()->with('success', 'Prière publiée.');
    }

    // Rejeter une prière
    public function reject(Prayer $prayer)
    {
        $prayer->update(['status' => 'rejected']);
        return back()->with('success', 'Prière rejetée.');
    }

    public function destroy(Prayer $prayer)
    {
        $prayer->delete();
        return back()->with('success', 'Prière supprimée.');
    }

}

