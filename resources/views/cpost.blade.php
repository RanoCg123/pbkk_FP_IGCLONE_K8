<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Posts') }}
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        
            <div class="mb-4">
                <h1 class="text-2xl font-bold">Add a new Post</h1>
            </div>
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-md rounded px-8 pt-6 pb-8 mb-4 py-4" >
                <form action="/cpost" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="user" class="text-gray-700">{{ Auth::user()->name }}</label>
                    </div>
                    <div class="mb-4">
                        <label for="title" class="text-gray-700">Title:</label>
                        <input type="text" name="title" class="form-input" required><br>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="text-gray-700">Image:</label>
                        <input type="file" name="image" class="form-input" accept=".png, .jpg, .jpeg" required><br>
                    </div>
                    <div class="mb-4">
                        <label for="caption" class="text-gray-700">Caption:</label>
                        <textarea name="caption" rows="4" class="form-input"></textarea><br>
                    </div>
                    <input type="submit" value="Add a new post" class="bg-gray-800 text-white px-4 py-2 rounded">
                </form>
            </div>
</div>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
        {{ session('success') }}
    </div>
    @endif
</x-app-layout>