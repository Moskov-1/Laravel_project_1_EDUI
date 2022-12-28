<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Instructor') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('instructor.store')}}" method="POST"  enctype="multipart/form-data"
                        class="w-4/5 mx-auto mt-6">
                        {{-- {{route('blog.store')}} --}}
                        @csrf
                        
                        @if(session()->has('status'))
                                <div class="p-6 mb-6 bg-green-600 border text-lg text-white border-gray-300">
                                    {{-- dark:bg-gray-700 --}}
                                    {{session('status')}}
                                </div>
                        @endif
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="tutor name" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Name: </label>
                            
                            <input type="text" id="tutor name" required name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="base-image" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Profile Picture</label>
                            
                            <input type="file" id="base-image" name="image" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="field" class="block mb-2 text-sm font-medium text-white dark:text-gray-400">Select an option</label>
                            <select id="field" required
                                    name="field"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->title}}: {{$tag->Field}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="tutor-link" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                               Social Media Links: </label>
                               
                               <label for="tutor-fb" class="pl-5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    facebook: </label>
                                <input type="text" id="tutor-fb" name="fb"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                 
                                <label for="tutor-yt" class="pl-5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    youtube: </label>
                                <input type="text" id="tutor-yt" name="yt"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                
                                <label for="tutor-Ln" class="pl-5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    linkedin: </label>
                                <input type="text" id="tutor-Ln" name="Ln"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                
                                <label for="tutor-insta" class="pl-5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    instagram: </label>
                                <input type="text" id="tutor-insta" name="insta"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                  
                                <label for="tutor-tw" class="pl-5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    twitter: </label>
                                <input type="text" id="tutor-tw" name="tw"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                
                            </div>
                        
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    
</x-app-layout>
