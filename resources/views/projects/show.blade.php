<x-layout>
    <x-slot:heading>
        Project
    </x-slot:heading>
    
    <h1 class="font-bold text-lg">{{ $project->name }}</h1>
    <h2 class="mt-3">{{ $project->shortDescription }}</h2>

    @can('update', $project)
        <p class="mt-6">
            <x-button href="/projects/{{ $project->id }}/edit">Edit</x-button>
        </p>
        <p class="mt-6">
            <x-button href="{{ route('tasks.index', $project) }}">Tasks</x-button>
        </p>
    @endcan
</x-layout>