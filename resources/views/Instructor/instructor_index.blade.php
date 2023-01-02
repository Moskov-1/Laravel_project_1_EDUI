<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('instructor.index')}}" class="{{Route::currentRouteName()==='instructor.index'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Insturctors') }}</a>
            <a href="{{route('instructor.create')}}" class="{{Route::currentRouteName()==='instructor.create'?'border border-blue-500 rounded py-1 px-3 bg-blue-500 text-white':''}}">
                {{ __('Add Insturctors') }}</a>
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
                    <h1 class="text-4xl pb-5"> instructor Table </h1>
                    <table class="border-separate border-spacing-2 border border-slate-500 ...">
                        <thead>
                          <tr>
                            <th class="border border-slate-600 p-3 ...">Id</th>
                            <th class="border border-slate-600 ...">name</th>
                            <th class="border border-slate-600 ...">tag</th>
                            <th class="border border-slate-600 p-3 ...">courses</th>
                            <th class="border border-slate-600 p-3 ...">facebook</th>
                            <th class="border border-slate-600 p-3 ...">instagram</th>
                            <th class="border border-slate-600 p-3 ...">twitter</th>
                            <th class="border border-slate-600 ...">youtube</th>
                            <th class="border border-slate-600 ...">linkedin</th>
                            <th class="border border-slate-600 ...">Update</th>
                            <th class="border border-slate-600 ...">delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($instructors as $instructor)
                            <tr>
                                <td class="border border-slate-700 p-3 px-5 ...">{{$instructor->id}}</td>
                                <td class="border border-slate-700 px-5 ...">{{$instructor->name}}</td>
                                <td class="border border-slate-700 px-5 ...">{{$instructor->tag->title}}</td>
                                <td class="border border-slate-700 px-5 ...">{{count($instructor->courses)}}</td>
                                <td class="border border-slate-700 px-5 ...">
                                    @if (isset($instructor->facebook))
                                    <a class="mx-1 p-1" target="_blank" href="{{$instructor->facebook}}"><i class="fab fa-facebook-f">yes</i></a>
                                    @endif
                                </td>
                                <td class="border border-slate-700 px-5 ...">
                                    @if (isset($instructor->instagram))
                                    <a class="mx-1 p-1" target="_blank" href="{{$instructor->instagram}}"><i class="fab fa-instagram">yes</i></a>
                                    @endif
                                </td>
                                <td class="border border-slate-700 px-5 ...">
                                    @if (isset($instructor->twitter))
                                        <a class="mx-1 p-1" target="_blank" href="{{$instructor->twitter}}"><i class="fab fa-twitter">yes</i></a>                            
                                    @endif
                                </td>
                                <td class="border border-slate-700 px-5 ...">
                                    @if (isset($instructor->youtube))
                                        <a class="mx-1 p-1" target="_blank" href="{{$instructor->youtube}}"><i class="fab fa-youtube">yes</i></a> 
                                    @endif
                                </td>
                                <td class="border border-slate-700 px-5 ...">
                                    @if (isset($instructor->linkedin))
                                        <a class="mx-1 p-1" target="_blank" href="{{$instructor->linkedin}}"><i class="fab fa-linkedin-in">yes</i></a>
                                    @endif
                                </td>
                              
                              <td class="border border-slate-700 bg-lime-500 px-5 ...">
                                <form method="get"
                                  action="{{route('instructor.edit',['id' => $instructor->id])}}">
                                  @csrf
                                  <input type="submit" name="submit" value="update">
                                </form>
                              </td>
                              
                              <td class="border border-slate-700 bg-red-600 px-5 ...">
                                <form method="POST"
                                  action="{{route('instructor.delete',['id' => $instructor->id])}}">
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
