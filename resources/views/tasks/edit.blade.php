<x-layout>
    <x-slot:heading>
        Edit "{{ $task->name }}" Task
    </x-slot:heading>
    
    <form method="POST" action="{{ route('tasks.update', ['project' => $project, 'task' => $task]) }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">

            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <x-form-label for="name">Name</x-form-label>
                <div class="mt-2">
                  <x-form-input name="name" id="name" value="{{ $task->name }}" placeholder="Task Name" required></x-form-input>
                  <x-form-error name="name"></x-form-error>
                </div>
              </div>

              <div class="sm:col-span-full">
                <x-form-label for="user_id">Assigned User</x-form-label>
                <div class="mt-2">
                  <x-form-select name="user_id" id="user_id">
                    <option value="" disabled>-- Select User --</option>
                    @foreach ($users as $user)
                      <option value="{{ $user->id }}" {{ $task->user->id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                    @endforeach
                  </x-form-select>
                  <x-form-error name="user_id"></x-form-error>
                </div>
              </div>

              <div class="sm:col-span-full">
                <x-form-label for="status">Status</x-form-label>
                <div class="mt-2">
                  <x-form-select name="status" id="status" value="{{ $task->status }}">
                    <option value="" disabled>-- Select Status --</option>
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                  </x-form-select>
                  <x-form-error name="status"></x-form-error>
                </div>
              </div>

              <div class="col-span-full">
                <x-form-label for="description">Description</x-form-label>
                <div class="mt-2">
                  <x-form-textarea name="description" id="description" rows="15" required>{{ $task->description }}</x-form-textarea>
                </div>
                <x-form-error name="description"></x-form-error>
              </div>
            </div>

          </div>
        </div>
      
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <div class="flex items-center">
                <button form="delete-form" class="text-red-500 text-sm font-bold">Delete</button>
            </div>
            <div class="flex items-center gap-x-6">
                <a href="{{ route('tasks.index', $project) }}" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                <button type="submit" 
                class="rounded-md bg-indigo-600 px-3 py-2 ml-3 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Update
                </button>
            </div>
          </div>
      </form>
      
      <form method="POST" action="{{ route('tasks.destroy', ['project' => $project, 'task' => $task]) }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
      </form>
</x-layout>