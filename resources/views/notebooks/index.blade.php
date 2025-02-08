<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notebooks
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{--for new note add on--}}
            <x-link-button href="{{route('notebooks.create')}}"> {{--it created route for create --no error of not found!--}}
                + New Notebook
            </x-link-button>
            {{--first note--}}
       {{-- @foreach ($notes as $note)--}}
            @forelse ($notebooks as $note){{--when notes are empty then we use forelse--}}
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                     <h1 class="font-bold text-lg text-red-600">
                       {{-- <a class="hover:underline" href="{{route('notes.show',$note)}}">--}}
                            {{$note->name}}
                        </a>
                        </h1>
                    </div>
             @empty{{--@empty director is for ---if notes are empty--}} 
             <p>You have no notebooks yet</p>  
            @endforelse
        </div>

    </div>
</x-app-layout>
