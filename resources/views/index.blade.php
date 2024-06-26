@extends('components.layout')

@section('content')
    <h1 class="text-center font-bold text-3xl">My Note</h1>
    <h3 class="font-black italic mt-10">Category : {{@$by_category ? @$by_category : "All"}}</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-7 p-4 sm:p-0 gap-3">
        @if(count($notes))
            @foreach($notes as $note)
            <a href="{{ route('detail-note', $note->slug) }}" class="bg-slate-100 rounded-md shadow p-4 hover:shadow-lg hover:translate-y-[-6px] transition h-[100px]">
                <h2 class="text-[16px] truncate font-bold">{{ $note->title }}</h2>
                <p class="text-slate-500 text-[12px] italic">{{$note->category->name}}</p>
                <p class="text-slate-800 text-[12px] mt-4 truncate overflow-hidden">{{$note->catatan}}</p>
            </a>
            @endforeach
        @endif
    </div>
@endsection
