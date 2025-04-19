<x-layout>
    <x-slot:heading>
        Task
    </x-slot:heading>
    
    <h1 class="font-bold text-lg">{{ $task->name }}</h1>
    <h2 class="mt-3">{{ $task->description }}</h2>
    <div class="flex">
        <p class="mt-3 pr-3"><strong>Status: </strong>{{ $task->status }}</p>
        <p class="mt-3"><strong>Assigned: </strong>{{ $task->user->name }}</p>
    </div>

    @can('update', $project)
        <p class="mt-6">
            <x-button href="{{ route('tasks.edit', ['project' => $project, 'task' => $task]) }}">Edit</x-button>
        </p>
    @endcan
</x-layout>