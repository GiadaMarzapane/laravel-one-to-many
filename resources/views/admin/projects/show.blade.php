@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col">
            {{-- messaggio per post aggiunto correttamente --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <h2 class="mb-3">
                {{ $project->title }}
            </h2>
            <h5>
                Anno del viaggio: 
                {{ $project->date }}
            </h5>
            <h5>
                Tipo di viaggio:
                {{ $project->type ? $project->type->name : 'Nessun tipo impostato' }}
            </h5>
            {{-- IF per photo link --}}
            @if (isset($project->photo_link))
            <div class="py-4">
                <img src="{{ $project->photo_link }}" alt="{{ $project->title }}">
            </div>
            @endif

            {{-- IF per img caricata --}}
            @if (isset($project->localimg))
            <div class="py-4">
                <img src="{{ asset('storage/' . $project->localimg) }}" alt="{{ $project->title }}">
            </div>
            @endif
            <p>
                {{ $project->content }}
            </p>
            <div class="mt-3 text-end">
                <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->id) }}">
                Modifica viaggio
                </a>
            </div>
        </div>
    </div>
</div>
@endsection