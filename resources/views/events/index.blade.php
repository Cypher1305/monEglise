@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
  <h1 class="text-2xl font-bold mb-4">Liste des Événements</h1>
  
  {{-- Bouton Créer Événement (visible uniquement pour les admins) --}}
  @if(auth()->check() && auth()->user()->role === 'admin')
    <a href="{{ route('admin.events.create') }}"
      style="background-color:#0c6e4f; padding:.5rem 1rem; color:white; border-radius:.25rem;"
      class="transform hover:scale-105 hover:shadow-lg hover:bg-[#0d8e67] transition duration-300">
      Créer un événement
    </a>

  @endif



  <table class="min-w-full bg-white mt-4">
    <thead>
      <tr>
        <th class="px-4 py-2">Titre</th>
        <th class="px-4 py-2">Début</th>
        <th class="px-4 py-2">Fin</th>
        
        {{-- Colonne Actions visible uniquement pour les admins --}}
        @if(auth()->check() && auth()->user()->role === 'admin')
          <th class="px-4 py-2">Actions</th>
        @endif
      </tr>
    </thead>
    <tbody>
      @foreach($events as $event)
      <tr>
        <td class="border px-4 py-2">{{ $event->title }}</td>
        <td class="border px-4 py-2">{{ $event->start_date->format('d/m/Y H:i') }}</td>
        <td class="border px-4 py-2">{{ optional($event->end_date)->format('d/m/Y H:i') }}</td>
        
        {{-- Actions visibles uniquement pour les admins --}}
        @if(auth()->check() && auth()->user()->role === 'admin')
          <td class="border px-4 py-2 flex space-x-2">
            <a href="{{ route('admin.events.show', $event) }}" class="text-blue-600 hover:underline">Voir</a>
            <a href="{{ route('admin.events.edit', $event) }}" class="text-yellow-600 hover:underline">Modifier</a>
            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit"
                      class="text-red-600 hover:underline"
                      onclick="return confirm('Supprimer cet événement ?')">
                Supprimer
              </button>
            </form>
          </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection