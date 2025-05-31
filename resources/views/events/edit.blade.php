@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
  <h1 class="text-2xl font-bold mb-4">Modifier l’Événement</h1>
  <form action="{{ route('admin.events.update', $event) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label for="title" class="block font-medium">Titre</label>
      <input type="text" name="title" id="title"
             value="{{ old('title', $event->title) }}"
             class="w-full border rounded px-3 py-2 focus:outline-none focus:border-[#0c6e4f]">
      @error('title')
        <p class="text-red-600 mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="description" class="block font-medium">Description</label>
      <textarea name="description" id="description"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:border-[#0c6e4f]" 
                rows="4">{{ old('description', $event->description) }}</textarea>
      @error('description')
        <p class="text-red-600 mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="start_date" class="block font-medium">Date & heure de début</label>
      <input type="datetime-local" name="start_date" id="start_date"
             value="{{ old('start_date', $event->start_date->format('Y-m-d\TH:i')) }}"
             class="w-full border rounded px-3 py-2 focus:outline-none focus:border-[#0c6e4f]">
      @error('start_date')
        <p class="text-red-600 mt-1">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="end_date" class="block font-medium">Date & heure de fin</label>
      <input type="datetime-local" name="end_date" id="end_date"
             value="{{ old('end_date', optional($event->end_date)->format('Y-m-d\TH:i')) }}"
             class="w-full border rounded px-3 py-2 focus:outline-none focus:border-[#0c6e4f]">
      @error('end_date')
        <p class="text-red-600 mt-1">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit"
            style="background-color:#0c6e4f; padding:.5rem 1rem; color:white; border-radius:.25rem;"
            class="transform hover:scale-105 hover:shadow-lg hover:bg-[#0d8e67] transition duration-300">
      Mettre à jour
    </button>
  </form>
</div>
@endsection
