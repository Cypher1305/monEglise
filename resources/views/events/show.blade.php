@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
  <h1 class="text-2xl font-bold mb-4">Détail de l’Événement</h1>
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold">{{ $event->title }}</h2>
    <p class="text-gray-600 mt-2">{{ $event->description }}</p>
    <p class="mt-4"><strong>Début :</strong> {{ $event->start_date->format('d/m/Y H:i') }}</p>
    @if($event->end_date)
      <p><strong>Fin :</strong> {{ $event->end_date->format('d/m/Y H:i') }}</p>
    @endif
    <a href="{{ route('admin.events.index') }}"
      style="background-color:#0c6e4f; padding:.2rem 1rem; color:white; border-radius:.25rem;"
      class="transform hover:scale-105 hover:shadow-lg hover:bg-[#0d8e67] transition duration-300">
       Retour à la liste
    </a>
  </div>
</div>
@endsection
