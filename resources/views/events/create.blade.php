@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Nouvel Événement</h1>

    <form action="{{ route('admin.events.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Titre</label>
            <input type="text" name="title" required 
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:border-[#0c6e4f]">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Description</label>
            <textarea name="description"
                      class="w-full px-4 py-2 border rounded focus:outline-none focus:border-[#0c6e4f]" 
                      rows="3"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Date de début</label>
            <input type="datetime-local" name="start_date" required 
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:border-[#0c6e4f]">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 mb-2">Date de fin (optionnelle)</label>
            <input type="datetime-local" name="end_date"
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:border-[#0c6e4f]">
        </div>

        <button type="submit"
                style="background-color:#0c6e4f; padding:.5rem 1rem; color:white; border-radius:.25rem;"
                class="transform hover:scale-105 hover:shadow-lg hover:bg-[#0d8e67] transition duration-300">
            Créer l'événement
        </button>
    </form>
</div>
@endsection
