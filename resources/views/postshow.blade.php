<x-app-layout>
<div class="flex">
    <div class="w-full">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white text-dark p-4">
                <h3 class="text-lg">User Posts Data Table</h3>
            </div>
            <div class="p-4">
                <table class="min-w-full table-auto border rounded">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">User</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $post)
                            <tr>
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ Auth::user()->name }}</td>
                                <td class="border px-4 py-2">{{ $post->title }}</td>
                                <td class="border px-4 py-2"><img class="h-20 w-20 object-cover" src="{{ asset('storage/postimage/' . $post->image) }}" alt="Post Image">
                                <td class="border px-4 py-2">{{ $post->caption }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</x-app-layout>