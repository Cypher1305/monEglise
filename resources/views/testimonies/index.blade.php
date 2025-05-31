@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
  <h1 class="text-2xl font-bold mb-4">Témoignages</h1>

  @if($testimonies->isEmpty())
    <p>Aucun témoignage publié pour l’instant.</p>
  @else
    <div class="space-y-6">
      @foreach($testimonies as $testimony)
        {{-- Carte témoignage --}}
        <div class="bg-white rounded shadow p-6">
          <h2 class="text-xl font-semibold">{{ $testimony->title }}</h2>
          <p class="text-gray-600 text-sm">
            Par {{ $testimony->user->name }} le {{ $testimony->created_at->format('d/m/Y H:i') }}
          </p>
          <div class="mt-2 text-gray-800">
            {{ $testimony->content }}
          </div>
        </div>

        {{-- Bloc AJAX & commentaires --}}
        <div class="post" data-id="{{ $testimony->id }}" data-type="testimony">
          <div class="bg-gray-50 rounded shadow p-4">
            <h3 class="font-semibold mb-2">Commentaires</h3>

            <div class="comments" id="comments-{{ $testimony->id }}">
              @forelse($testimony->comments as $comment)
                <div class="comment flex justify-between items-start py-2" data-id="{{ $comment->id }}">
                  <div>
                    <strong>{{ $comment->user->name }}</strong> : {{ $comment->content }}
                  </div>
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
                <textarea
                  class="new-comment flex-1 border rounded px-2 py-1"
                  placeholder="Écrire un commentaire…"
                  rows="2"
                ></textarea>
                  <button
                    class="btn-add-comment transform hover:scale-105 hover:shadow-lg hover:bg-[#0d8e67] transition duration-300"
                    style="background-color:#0c6e4f; padding:.5rem 1rem; color:white; border-radius:.25rem;"
                  >
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

<script>
  window.AUTH_ID = {{ auth()->check() ? auth()->id() : 'null' }};
  window.AUTH_ROLE = {{ auth()->check() ? "'".auth()->user()->role."'" : 'null' }};
</script>


{{-- Inclusion du script AJAX unique --}}
<script src="{{ asset('js/comments.js') }}"></script>
@endsection
