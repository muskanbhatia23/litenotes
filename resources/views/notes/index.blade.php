<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notes
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{--first note--}}
        @foreach ($notes as $note)
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                     <h1 class="font-bold text-2xl text-red-600">{{$note->title}}</h1>
                     <p class="mt-2 text-black">{{$note->text}} </p>  
                  </div>
                
            @endforeach
        </div>

    </div>
</x-app-layout>
