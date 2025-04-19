<x-layout>
    <x-slot:heading>
      Create Task
    </x-slot:heading>
    
    <form method="POST" action="{{ route('tasks.store', $project) }}">
        @csrf

        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Create Task</h2>
            <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly.</p>
      
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <x-form-label for="name">Name</x-form-label>
                <div class="mt-2">
                  <x-form-input name="name" id="name" placeholder="Task Name" required></x-form-input>
                  <x-form-error name="name"></x-form-error>
                </div>
              </div>

              <div class="sm:col-span-full">
                <x-form-label for="user_id">Assigned User</x-form-label>
                <div class="mt-2">
                  <x-form-select name="user_id" id="user_id">
                    <option value="" disabled>-- Select User --</option>
                    @foreach ($users as $user)
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </x-form-select>
                  <x-form-error name="user_id"></x-form-error>
                </div>
              </div>

              <div class="sm:col-span-full">
                <x-form-label for="status">Status</x-form-label>
                <div class="mt-2">
                  <x-form-select name="status" id="status">
                    <option value="" disabled>-- Select Status --</option>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                  </x-form-select>
                  <x-form-error name="status"></x-form-error>
                </div>
              </div>

              <div class="col-span-full">
                <x-form-label for="description">Description</x-form-label>
                <div class="mt-2">
                  <x-form-textarea name="description" id="description" rows="15" required></x-form-textarea>
                </div>
                <x-form-error name="description"></x-form-error>
              </div>
            </div>
          </div>
        </div>
      
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="{{ route('tasks.index', $project) }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
          <x-form-button>Save</x-form-button>
        </div>
      </form>      
</x-layout>