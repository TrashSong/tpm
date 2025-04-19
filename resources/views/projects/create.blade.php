<x-layout>
    <x-slot:heading>
      Create Project
    </x-slot:heading>
    
    <form method="POST" action="/projects">
        @csrf

        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Create Project</h2>
            <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly.</p>
      
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <x-form-label for="name">Name</x-form-label>
                <div class="mt-2">
                  <x-form-input name="name" id="name" placeholder="Project Name" required></x-form-input>
                  <x-form-error name="name"></x-form-error>
                </div>
              </div>
      
              <div class="col-span-full">
                <x-form-label for="shortDescription">Short Description</x-form-label>
                <div class="mt-2">
                  <x-form-textarea name="shortDescription" id="shortDescription" rows="15" required></x-form-textarea>
                </div>
                <x-form-error name="shortDescription"></x-form-error>
              </div>
            </div>
          </div>
        </div>
      
        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/projects" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
          <x-form-button>Save</x-form-button>
        </div>
      </form>      
</x-layout>