@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
  <h1 class="text-2xl font-bold mb-4">Soumettre un témoignage</h1>

  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <form action="{{ route('testimonies.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
      <label for="title" class="block font-medium">Titre</label>
      <input type="text" name="title" id="title"
             value="{{ old('title') }}"
             class="w-full border rounded px-3 py-2 @error('title') border-red-500 @enderror">
      @error('title')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <label for="content" class="block font-medium">Contenu</label>
      <textarea name="content" id="content" rows="5"
                class="w-full border rounded px-3 py-2 @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
      @error('content')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit"
            style="background-color:#0c6e4f; padding:.5rem 1rem; color:white; border-radius:.25rem;"
            class="transform hover:scale-105 hover:shadow-lg hover:bg-[#0d8e67] transition duration-300">
      Envoyer le témoignage
    </button>
  </form>
</div>
@endsection
