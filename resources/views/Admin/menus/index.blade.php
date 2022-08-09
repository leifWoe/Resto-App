<!-- categories -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex justify-end m-2 p-2">
        <a href="{{ route('admin.menus.create') }}" class="px-4 py-2 focus:bg-indigo-100 hover:bg-gray-900 hover:text-white rounded-lg">Create Menu</a>
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
                    Description
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>
                <th scope="col" class="py-3 px-6">
                    Category
                </th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $menu->name }}
                        </th>
                        <td class="py-4 px-6">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($menu->image) }}" class="w-32 h-32 rounded" alt="">
                        </td>
                        <td class="py-4 px-6">
                            {{ $menu->description }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $menu->price }}
                        </td>
                        <!-- TODO nach category filtern -->
                        <td class="py-4 px-6">
                            {{ $menu->category }}
                        </td>
                        <td class="py-4 px-6">
                            <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Are Your sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                            </form>
                            <form method="POST" action="{{ route('admin.menus.edit', $menu->id) }}" method="POST">
                                @csrf
                                @method('GET')
                                <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Edit</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
