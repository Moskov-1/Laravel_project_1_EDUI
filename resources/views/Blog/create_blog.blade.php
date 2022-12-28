<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/blog" method="POST"  enctype="multipart/form-data"
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
                            <label for="base-input" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Title</label>
                            
                            <input type="text" id="base-input" required name="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="base-input" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Heading</label>
                            
                            <input type="text" id="base-input" required name="heading"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an option</label>
                            <select id="type" required
                                    name="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a layout</option>
                                <option value="left">left</option>
                                <option value="right">right</option>
                                <option value="middle">middle</option>
                            </select>
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="base-input" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Thumb Nail</label>
                            
                            <input type="file" id="base-input" name="image" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6 bg-gray-50 border dark:bg-gray-700 border-gray-300">
                            <label for="message" class="pl-2.5 block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Body</label>
                            <textarea id="message" rows="4" name="content"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
    
</x-app-layout>
