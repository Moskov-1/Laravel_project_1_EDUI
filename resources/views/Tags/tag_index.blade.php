<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('tag.index')}}" class="{{Route::currentRouteName()==='tag.index'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Tags') }}</a>
            <a href="{{route('tag.create')}}" class="{{Route::currentRouteName()==='tag.create'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Create Tags') }}</a>
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
                    <h1 class="text-4xl pb-5"> Tag Table </h1>
                    <table class="border-separate border-spacing-2 border border-slate-500 ...">
                        <thead>
                          <tr>
                            <th class="border border-slate-600 p-3 ...">Id</th>
                            <th class="border border-slate-600 ...">heading</th>
                            <th class="border border-slate-600 ...">Field</th>
                            <th class="border border-slate-600 px-3 ...">courses</th>
                            <th class="border border-slate-600 px-3 ...">blogs</th>
                            {{-- <th class="border border-slate-600 px-3 ...">instructors</th> --}}
                            <th class="border border-slate-600 ...">Update</th>
                            <th class="border border-slate-600 ...">delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($tags as $tag)
                            <tr>
                              <td class="border border-slate-700 p-3 px-5 ...">{{$tag->id}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$tag->title}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$tag->Field}}</td>
                              <td class="border border-slate-700 px-9 ...">{{$tag->courses_count}}</td>
                              <td class="border border-slate-700 px-9 ...">{{$tag->blogs_count}}</td>
                              {{-- <td class="border border-slate-700 px-9 ...">{{$tag->instructors_count}}</td> --}}
                              
                              <td class="border border-slate-700 bg-lime-500 px-5 ...">
                                <form method="get"
                                  action="{{route('tag.edit',['id' => $tag->id])}}">
                                  @csrf
                                  <input type="submit" name="submit" value="update">
                                </form>
                              </td>
                              
                              <td class="border border-slate-700 bg-red-600 px-5 ...">
                                <form method="POST"
                                  action="{{route('tag.delete',['id' => $tag->id])}}">
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
