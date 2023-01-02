<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('course.index')}}" class="{{Route::currentRouteName()==='course.index'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Courses') }}</a>
            <a href="{{route('course.create')}}" class="{{Route::currentRouteName()==='course.create'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Create Course') }}</a>
            @if (Route::currentRouteName()==='course.edit')
                <span class="{{Route::currentRouteName()==='course.edit'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                    {{ __('Course Edit') }}</span>
            @endif
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('course.update',['id'=>$course->id])}}" method="POST"  enctype="multipart/form-data"
                        class="w-4/5 mx-auto mt-6">
                        {{-- {{route('blog.store')}} --}}
                        @csrf
                        @method('put')
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="heading" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Heading</label>
                            
                            <input type="text" id="heading" required name="heading"
                                value="{{$course->heading}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="lectures" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Lectures</label>
                            
                            <input type="number" id="lectures" required name="lectures"
                                value="{{$course->lectures}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="duration" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Duration</label>
                            
                            <input type="text" id="duration" required name="duration"
                                value="{{$course->duration}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="skill_level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                Select a Learning Level</label>
                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                    Old: {{$course->skill_level}}
                                 </p>
                            <select id="skill_level" required
                                    name="skill_level"
                                    defaultValue = 'value="{{$course->skill_level}}"'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="begginer">begginer level</option>
                                <option value="intermediate">intermediate level</option>
                                <option value="advanced">advanced level</option>
                                <option value="all">all level</option>
                            </select>
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="instructor" 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Pick a Tutor</label>
                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                   Old: {{$course->instructor->name}}
                                </p>
                            <select id="instructor" required 
                                    defaultValue="{{$course->instructor->id}}"
                                    name="instructor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($instructors as $instructor)                                
                                    <option value="{{$instructor->id}}" {{
                                        ($course->instructor->id === $instructor->id)
                                        ? "selected" : ""}}>
                                    {{$instructor->name}}: {{$instructor->tag->Field}}</option>
                                @endforeach    
                            </select>
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="base-less" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                Select tags</label>
                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                    Old tags: 
                                 </p>
                                @foreach ($course->tags as $tag)
                                    <span class='border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white'>
                                        {{$tag->title}}</span>
                                @endforeach <br><br>
                                @foreach ($tags as $tag)
                                    <input type="checkbox" class="ml-2" id="tag-{{$tag->id}}" 
                                        {{
                                            ($course->tags->contains($tag) === true)
                                            ? "checked" : ""
                                        }}    
                                    name="tags[]" value="{{$tag->id}}" >
                                        <label id="tag-{{$tag->id}}" class="pl-2 mb-5 text-sm font-medium text-white dark:text-white">{{$tag->title}}: {{$tag->Field}}</label><br/><br>
                                @endforeach

                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                Pick a Language</label>
                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                    Old: {{$course->language}}
                                 </p>
                            <select id="language" required
                                    name="language"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="English" {{
                                    ($course->language ==='English')
                                    ? "selected" : ""  }}>English</option>
                                <option value="Germen" {{
                                    ($course->language ==='Germen')
                                    ? "selected" : ""  }}>Germen</option>
                                <option value="Bangla" {{
                                    ($course->language ==='Bangla')
                                    ? "selected" : ""  }}>Bangla</option>
                            </select>
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="price" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Price</label>
                            
                            <input type="number" id="price" required name="price"
                                value="{{$course->price}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="thumbnail" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Thumb Nail</label>
                                <img src="{{$course->getFirstMediaUrl('thumbnail')}}" alt="">
                            <input type="file" id="thumbnail" name="thumbnail"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="banner" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Banner</label>
                                <img src="{{$course->getFirstMediaUrl('banner')}}" alt="">
                            <input type="file" id="banner" name="banner"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="body" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Body</label>
                            <textarea id="body" rows="4" name="body"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="{{$course->body}}"></textarea>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    
</x-app-layout>
