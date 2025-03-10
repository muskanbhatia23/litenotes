<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
       <x-alert-success> {{ session('success')}}</x-alert-success>
       
       <span class="px-2 py-1 border border-indigo-400 bg-indigo-400 rounded font-semibold text-sm">
        {{ $note->notebook->name}}
       </span>
          
            <div class="flex gap-6 !important">
        <p class="opacity-70"><strong>Created: {{$note->created_at->diffForHumans()}}</strong></p>
        <p class="opacity-70"><strong>Updated: {{$note->updated_at->diffForHumans()}}</strong></p>
        <x-link-button href="{{route('notes.edit', $note)}}" class="ml-auto mr-0">Edit Note </x-link-button>
        <form action="{{route('notes.destroy',$note)}}" method="post">
            @method('delete')
            @csrf

            <x-primary-button href="{{route('notes.edit', $note)}}" class="ml-auto bg-red-500 hover:bg-red-600" 
            onclick=" return confirm('Move to trash?')">Move to Trash </x-primary-button>
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
