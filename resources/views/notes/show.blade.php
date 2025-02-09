<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @if(session('success'))
        <p class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md">
            {{session('success')}}
        </p>
        @endif
    
          
            <div class="flex gap-6 !important">
        <p class="opacity-70"><strong>Created: {{$note->created_at->diffForHumans()}}</strong></p>
        <p class="opacity-70"><strong>Updated: {{$note->updated_at->diffForHumans()}}</strong></p>
        <x-link-button href="{{route('notes.edit', $note)}}" class="ml-auto mr-0">Edit Note </x-link-button>
        <form action="{{route('notes.destroy',$note)}}" method="post">
            @method('delete')
            @csrf

            <x-primary-button href="{{route('notes.edit', $note)}}" class="ml-auto bg-red-500 hover:bg-red-600" 
            onclick=" return confirm('Are you sure you want to delete this note')">Delete Note </x-primary-button>
    </div>
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                     <h1 class="font-bold text-3xl text-center text-red-600">
                       
                            {{$note->title}}
                        
                        </h1>
                     <p class="mt-4 text-black whitespace-pre-wrap">
                        {{$note->content}}
                     </p>  
                  </div> 
            
        </div>
    </div>
</x-app-layout>
