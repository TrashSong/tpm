<x-layout>
    <x-slot:heading>
        Tasks
    </x-slot:heading>
    
    <div class="space-y-4">
        @can('update', $project)
            <p class="mt-6">
                <x-button href="{{ route('tasks.create', $project) }}">Create Task</x-button>
            </p>
        @endcan

        @foreach ($tasks as $task)
            <a href="{{ route('tasks.show', [$project, $task]) }}" class="flex items-center justify-between block px-4 py-6 border border-gray-200">
                <div class="hover:underline">
                    <strong>{{ $task['name'] }}</strong>
                </div>
                <div class="flex">
                    <p class="pr-3"><strong>Status: </strong>{{ $task['status'] }}</p>
                    <p><strong>Assigned: </strong>{{ $task->user['name'] }}</p>
                </div>
            </a>
        @endforeach

        <div>
            {{ $tasks->links() }}
        </div>
    </div>
</x-layout>