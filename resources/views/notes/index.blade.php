<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notes
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{--for new note add on--}}
            <x-link-button href="{{route('notes.create')}}"> {{--it created route for create --no error of not found!--}}
                + New Note
            </x-link-button>
            {{--first note--}}
       {{-- @foreach ($notes as $note)--}}
            @forelse ($notes as $note){{--when notes are empty then we use forelse--}}
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                     <h1 class="font-bold text-2xl text-red-600">
                        <a class="hover:underline" href="{{route('notes.show',$note)}}">
                            {{$note->title}}
                        </a>
                        </h1>
                     <p class="mt-2 text-black">{{Str::limit($note->content,200,'...')}} </p>  {{--for setting the limit of chars to show on the screen--}}
                     <span class="block mt-4 text-sm opacity-70">{{$note->updated_at->diffForHumans() }}</span>
                  </div>
             @empty{{--@empty director is for ---if notes are empty--}} 
             <p>You have no notes yet</p>  
            @endforelse
            {{$notes->links()}}
        </div>

    </div>
</x-app-layout>
