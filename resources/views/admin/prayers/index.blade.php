@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
  <h1 class="text-2xl font-bold mb-4">Gestion des prières</h1>

  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  @if($prayers->isEmpty())
    <p class="text-gray-600">Aucune demande de prière à afficher.</p>
  @else
    <div class="space-y-6">
      @foreach($prayers as $prayer)
        {{-- Carte prière avec actions et commentaires Ajax --}}
        <div class="bg-white rounded shadow p-6 post" data-id="{{ $prayer->id }}" data-type="prayer">
          <h2 class="text-xl font-semibold">{{ $prayer->title }}</h2>
          <p class="text-gray-600 text-sm">
            Par {{ $prayer->user->name }} le {{ $prayer->created_at->format('d/m/Y H:i') }}
          </p>
          <div class="mt-2 text-gray-800">
            {{ $prayer->message }}
          </div>

          {{-- Boutons admin --}}
          <div class="mt-4 space-x-2">
            @if($prayer->status === 'pending')
              <form action="{{ route('admin.prayers.publish', $prayer) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600">Publier</button>
              </form>
              <form action="{{ route('admin.prayers.reject', $prayer) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">Rejeter</button>
              </form>
            @endif
            <form action="{{ route('admin.prayers.destroy', $prayer) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cette prière ?')">
              @csrf @method('DELETE')
              <button class="px-3 py-1 bg-gray-500 text-white rounded-md hover:bg-gray-600">Supprimer</button>
            </form>
          </div>

          {{-- Section commentaires --}}
          <div class="bg-gray-50 rounded shadow p-4 mt-4">
            <h3 class="font-semibold mb-2">Commentaires</h3>
            <div class="comments" id="comments-{{ $prayer->id }}">
              @forelse($prayer->comments as $comment)
                <div class="comment flex justify-between items-start py-2" data-id="{{ $comment->id }}">
                  <div><strong>{{ $comment->user->name }}</strong> : {{ $comment->content }}</div>
                  @can('delete', $comment)
                    <button class="text-red-500 btn-delete-comment" data-id="{{ $comment->id }}">×</button>
                  @endcan
                </div>
              @empty
                <p class="text-sm text-gray-600">Pas encore de commentaires.</p>
              @endforelse
            </div>

            @auth
              <div class="mt-4 flex space-x-2">
                <textarea class="new-comment flex-1 border rounded px-2 py-1" placeholder="Écrire un commentaire…" rows="2"></textarea>
                <button
                    class="btn-add-comment transform hover:scale-105 hover:shadow-lg hover:bg-[#0d8e67] transition duration-300"
                    style="background-color:#0c6e4f; padding:.5rem 1rem; color:white; border-radius:.25rem;">
                    Commenter
                  </button>

              </div>
            @endauth
          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>

{{-- Charger identifiants pour JS --}}
<script>window.AUTH_ID = {{ auth()->id() }}; window.AUTH_ROLE = '{{ auth()->user()->role }}';</script>
<script src="{{ asset('js/comments.js') }}"></script>
@endsection
