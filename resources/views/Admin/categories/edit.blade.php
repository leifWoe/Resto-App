<!-- categories create -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!-- RETURN BUTTON -->
    <div class="flex justify-end m-2 p-2">
        <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 focus:bg-indigo-100 hover:bg-gray-900 hover:text-white rounded-lg">Categories</a>
    </div>
    <!-- INPUTS -->
    <div class="m-2 p-2">
        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!--NAME TODO middleware für was erlaubt ist-->
            <div class="mb-8">
                <label for="name" class="mb-2 block pl-4 text-sm text-lg text-gray-900 dark:text-slate-900">Name</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}" style="font-size:16px;" class="block w-full font-semibold rounded-lg border border-gray-300 bg-gray-50 p-2 text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-xs"/>
            </div>
            <!-- PICTURE TODO middleware für was für bilder erlaubt sind-->
            <div class="mb-6">
                <label for="image"></label>
                <div>
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($category->image) }}" class="w-32 h-32" alt="">
                </div>
                <input type="file" id="image" name="image" style="font-size:16px;" class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-blue-50 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100" />
            </div>
            <!-- DESCRIPTION TODO middleware -->
            <div class="mb-6">
                <label for="description" class="mb-2 block pl-4 text-sm text-lg text-gray-900 dark:text-slate-900">Description</label>
                <!-- TODO textarea text start, when edited, at top left corner-->
                <textarea rows="5" placeholder="Enter text" style="font-size:16px;" name="description" id="description" class="w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    {{ $category->description }}
                </textarea>
            </div>
            <!-- UPDATE BUTTON -->
            <div class="flex justify-end m-2 p-2">
                <button type="submit" class="flex px-4 py-2 focus:bg-indigo-100 hover:bg-gray-900 hover:text-white rounded-lg pb-2">
                        Update
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
