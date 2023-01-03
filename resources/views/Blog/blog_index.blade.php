<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('blog.index')}}" class="{{Route::currentRouteName()==='blog.index'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Blogs') }}</a>
            <a href="{{route('blog.create')}}" class="{{Route::currentRouteName()==='blog.create'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Create Blog') }}</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session()->has('status'))
                      <div class="p-6 mb-6 bg-green-600 border text-lg text-white border-gray-300">
                          {{-- dark:bg-gray-700 --}}
                          {{session('status')}}
                      </div>
                    @endif
                    <h1 class="text-4xl pb-5"> Blog Table </h1>
                    <table class="border-separate border-spacing-2 border border-slate-500 ...">
                        <thead>
                          <tr>
                            <th class="border border-slate-600 p-3 ...">Id</th>
                            <th class="border border-slate-600 ...">genre</th>
                            <th class="border border-slate-600 ...">heading</th>
                            <th class="border border-slate-600 px-3 ...">tags</th>
                            <th class="border border-slate-600 px-3 ...">orientation</th>
                            <th class="border border-slate-600 ...">Update</th>
                            <th class="border border-slate-600 ...">delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($blogs as $blog)
                            <tr>
                              <td class="border border-slate-700 p-3 px-5 ...">{{$blog->id}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$blog->title}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$blog->heading}}</td>
                              <td class="border border-slate-700 px-5 ...">{{count($blog->tags)}}</td>
                              <td class="border border-slate-700 px-9 ...">{{$blog->type}}</td>
                              
                              <td class="border border-slate-700 bg-lime-500 px-5 ...">
                                <form method="get"
                                  action="{{route('blog.edit',['id' => $blog->id])}}">
                                  @csrf
                                  <input type="submit" name="submit" value="update">
                                </form>
                              </td>
                              
                              <td class="border border-slate-700 bg-red-600 px-5 ...">
                                <form method="POST"
                                  action="{{route('blog.delete',['id' => $blog->id])}}">
                                  @csrf
                                  @method('delete')
                                  <input type="submit" name="submit" value="delete">
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
    
</x-app-layout>
