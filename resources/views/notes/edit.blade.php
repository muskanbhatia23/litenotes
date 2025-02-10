<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Edit  Note
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg max-w-2xl">
                 <form action="{{route('notes.update',$note)}}" method="post" >
                    @method('put')
                    @csrf                                                                 {{--old is for to retain the entered value and 2nd
                                                                                             argument is for , in case no changes made--}}
                   <x-text-input name="title" placeholder="Note Title" class="w-full" value="{{ @old('title',$note->title)}}"></x-text-input>

                   @error('title')
                   <div class="text-sm mt-2 text-red-500">{{$message}}</div>   
                   @enderror    

                   <x-text-area name="content" placeholder="Type your Note" rows="8"  value="{{ @old('content',$note->content)}}" class="w-full mt-6"></x-text-area>    
                   @error('content')
                   <div class="text-sm mt-2 text-red-500">{{$message}}</div>  
                   @enderror

                   <select name="notebook_id" class="w-full mt-6 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">--Select Notebook--</option>
                    @foreach ($notebooks as $notebook )
                    
                    <option value="{{$notebook->id}}" 
                        @if($notebook->id === $note->notebook_id)
                        selected
                        @endif>
                        
                        {{$notebook->name}}
                    </option>
                        
                    @endforeach
                </select>

                   <x-primary-button class="mt-6">Save Note</x-primary-button>
                   
                </form> 
            </div>
        </div>
    </div>
</x-app-layout>
