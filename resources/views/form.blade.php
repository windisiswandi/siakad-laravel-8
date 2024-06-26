@extends('components.layout')

@section('content')
    
    @if($purpose == 'create')
    <h1 class="text-center font-bold text-3xl">Tambah catatan</h1>
    <form action="{{route('create-note')}}" method="POST" class="w-1/2 mx-auto mt-10">
        {{ csrf_field() }}
        <div class="mb-4 ">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title:</label>
            <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500 shadow" placeholder="Enter title" required>
        </div>
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Category</label>
            <div class="inline-block relative w-full">
                <select class="block appearance-none w-full bg-white px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="category">
                    @foreach($categories as $category)
                    <option value="{{$category->category_id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description:</label>
            <textarea id="description" name="description" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500 shadow" placeholder="Enter description" rows="4" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Create</button>
        </div>
    </form>
    @else
    <h1 class="text-center font-bold text-3xl">Update catatan</h1>
    <form action="{{route('update-note')}}" method="post" class="w-1/2 mx-auto mt-10">
        {{ csrf_field() }}
        @method('put')
        <input type="hidden" name="id" value="{{$note->note_id}}">
        <div class="mb-4 ">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title:</label>
            <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-teal-500" value="{{$note->title}}" required>
        </div>
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Category</label>
            <div class="inline-block relative w-full">
                <select class="block appearance-none w-full bg-white px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="category">
                    @foreach($categories as $category)
                        @if($category->category_id === $note->category_id)
                        <option value="{{$category->category_id}}" selected>{{$category->name}}</option>
                        @else
                        <option value="{{$category->category_id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description:</label>
            <textarea id="description" name="catatan" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-teal-500" rows="4" required>{{$note->catatan}}</textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="px-6 py-2 bg-teal-500 text-white rounded hover:bg-teal-600 focus:outline-none focus:bg-teal-600">Update</button>
        </div>
    </form>

    @endif
@endsection
