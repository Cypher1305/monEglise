@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
  <h1 class="text-2xl font-bold mb-4">Gestion des témoignages</h1>

  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  @if($testimonies->isEmpty())
    <p class="text-gray-600">Aucun témoignage soumis.</p>
  @else
    <div class="space-y-6">
      @foreach($testimonies as $testimony)
        {{-- Carte témoignage avec actions et commentaires Ajax --}}
        <div class="bg-white rounded shadow p-6 post" data-id="{{ $testimony->id }}" data-type="testimony">
          <h2 class="text-xl font-semibold">{{ $testimony->title }}</h2>
          <p class="text-gray-600 text-sm">
            Par {{ $testimony->user->name }} le {{ $testimony->created_at->format('d/m/Y H:i') }}
          </p>
          <div class="mt-2 text-gray-800">
            {{ $testimony->content }}
          </div>

          {{-- Boutons admin --}}
          <div class="mt-4 space-x-2">
            @if($testimony->status === 'pending')
              <form action="{{ route('admin.testimonies.publish', $testimony) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600">Publier</button>
              </form>
              <form action="{{ route('admin.testimonies.reject', $testimony) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">Rejeter</button>
              </form>
            @endif
            <form action="{{ route('admin.testimonies.destroy', $testimony) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce témoignage ?')">
              @csrf @method('DELETE')
              <button class="px-3 py-1 bg-gray-500 text-white rounded-md hover:bg-gray-600">Supprimer</button>
            </form>
          </div>

          {{-- Section commentaires --}}
          <div class="bg-gray-50 rounded shadow p-4 mt-4">
            <h3 class="font-semibold mb-2">Commentaires</h3>
            <div class="comments" id="comments-{{ $testimony->id }}">
              @forelse($testimony->comments as $comment)
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
                <button class="btn-add-comment px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Commenter</button>
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
