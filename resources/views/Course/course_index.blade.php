<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('course.index')}}" class="{{Route::currentRouteName()==='course.index'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Courses') }}</a>
            <a href="{{route('course.create')}}" class="{{Route::currentRouteName()==='course.create'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Create Course') }}</a>
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
                    <h1 class="text-4xl pb-5"> Course Table </h1>
                    <table class="border-separate border-spacing-2 border border-slate-500 ...">
                        <thead>
                          <tr>
                            <th class="border border-slate-600 p-3 ...">Id</th>
                            <th class="border border-slate-600 ...">heading</th>
                            <th class="border border-slate-600 ...">skill_level</th>
                            <th class="border border-slate-600 ...">Instructor</th>
                            <th class="border border-slate-600 ...">lectures</th>
                            <th class="border border-slate-600 ...">duration</th>
                            <th class="border border-slate-600 ...">language</th>
                            <th class="border border-slate-600 ...">price</th>
                            <th class="border border-slate-600 ...">update</th>
                            <th class="border border-slate-600 ...">delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($courses as $course)
                            <tr>
                              <td class="border border-slate-700 p-3 ...">{{$course->id}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$course->heading}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$course->skill_level}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$course->instructor->name}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$course->lectures}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$course->duration}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$course->language}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$course->price}}</td>

                              <td class="border border-slate-700 bg-lime-500 px-5 ...">
                                <form method="get"
                                  action="{{route('course.edit',['id' => $course->id])}}">
                                  @csrf
                                  <input type="submit" name="submit" value="update">
                                </form>
                              </td>
                              <td class="border border-slate-700 bg-red-600 px-5  ...">
                                <form method="POST"
                                  action="{{route('course.delete',['id' => $course->id])}}">
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
