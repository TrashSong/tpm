<x-layout>
    <x-slot:heading>
        Projects
    </x-slot:heading>
    
    <div class="space-y-4">
        @foreach ($projects as $project)
            <a href="/projects/{{ $project['id'] }}" class="hover:underline block px-4 py-6 border border-gray-200">
                <strong>{{ $project['name'] }}</strong>
            </a>
        @endforeach

        <div>
            {{ $projects->links() }}
        </div>
    </div>
</x-layout>