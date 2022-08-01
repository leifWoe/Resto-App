<!-- categories index -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex justify-end m-2 p-2">
        <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 focus:bg-indigo-100 hover:bg-gray-900 hover:text-white rounded-lg">Create Category</a>
    </div>
    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Image
                </th>
                <th scope="col" class="py-3 px-6">
                    Category
                </th>
                <th scope="col" class="py-3 px-6">
                    Created at
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $category->name }}
                        </th>
                        <td class="py-4 px-6">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($category->image) }}" class="w-16 h-16 rounded" alt="">
                        </td>
                        <td class="py-4 px-6">
                            {{ $category->description }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $category->created_at }}
                        </td>
                        <td class="py-4 px-6">
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are Your sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                            <form action="{{ route('admin.categories.edit', $category->id) }}" method="POST">
                                @csrf
                                @method('GET')
                                <button type="submit">Edit</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
