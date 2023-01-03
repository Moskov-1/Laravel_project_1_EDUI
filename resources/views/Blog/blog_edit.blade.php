<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('blog.index')}}" class="{{Route::currentRouteName()==='blog.index'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Blogs') }}</a>
            <a href="{{route('blog.create')}}" class="{{Route::currentRouteName()==='blog.create'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Create Blog') }}</a>
           @if(Route::currentRouteName() === 'blog.edit')
            <span class="border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white">
                {{ __('Edit Blog') }}</span>
           @endif
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('blog.update',['id'=>$blog->id])}}" method="POST"  enctype="multipart/form-data"
                        class="w-4/5 mx-auto mt-6">
                        {{-- {{route('blog.store')}} --}}
                        @csrf
                        @method('put')
                        @if(session()->has('status'))
                                <div class="p-6 mb-6 bg-green-600 border text-lg text-white border-gray-300">
                                    {{-- dark:bg-gray-700 --}}
                                    {{session('status')}}
                                </div>
                        @endif
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="base-input" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Title</label>
                            
                            <input type="text" id="base-input" required name="title" value="{{$blog->title}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="base-input" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Heading</label>
                            
                            <input type="text" id="base-input" required name="heading" value="{{$blog->heading}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="type" class="block mb-2 text-sm font-medium text-white">Select an option</label>
                            <p class="pl-5 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                              old:  {{$blog->type}}</p>
                            <select id="type"
                                    name="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="left"
                                {{$blog->type === 'left' ? 'selected' : ''}}>
                                    left</option>
                                <option value="right"
                                {{$blog->type === 'right' ? 'selected' : ''}}>right</option>
                                <option value="middle"
                                {{$blog->type === 'middle' ? 'selected' : ''}}>middle</option>
                            </select>
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="base-less" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                Select tags</label>
                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                    Old tags: 
                                 </p>
                                @foreach ($blog->tags as $tag)
                                    <span class='border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white'>
                                        {{$tag->title}}</span>
                                @endforeach <br><br>
                                @foreach ($tags as $tag)
                                    <input type="checkbox" class="ml-2" id="tag-{{$tag->id}}" 
                                        {{
                                            ($blog->tags->contains($tag) === true)
                                            ? "checked" : ""
                                        }}    
                                    name="tags[]" value="{{$tag->id}}" >
                                        <label id="tag-{{$tag->id}}" class="pl-2 mb-5 text-sm font-medium text-white dark:text-white">{{$tag->title}}: {{$tag->Field}}</label><br/><br>
                                @endforeach

                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="base-input" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Thumb Nail</label>
                            <img src="{{$blog->getFirstMediaUrl('thumbnail')}}" alt="">
                            <input type="file" id="base-input" name="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="message" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Body</label>
                            <textarea id="message" rows="4" name="content" placeholder="{{$blog->content}}"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    
</x-app-layout>
