<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class='mr-5 p-2 hover:bg-[#fec] hover:text-[blue]' href="/">{{ __('Home') }}</a>
            <a class='mr-5  p-2 hover:bg-[#000] hover:text-[blue]' href="/">{{ __('Dashboard') }}</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl pb-5"> User Table </h1>
                    <table class="border-separate border-spacing-2 border border-slate-500 ...">
                        <thead>
                          <tr>
                            <th class="border border-slate-600 p-3 ...">Id</th>
                            <th class="border border-slate-600 ...">name</th>
                            <th class="border border-slate-600 ...">email</th>
                            <th class="border border-slate-600 ...">role</th>
                            
                            <th class="border border-slate-600 ...">update</th>
                            <th class="border border-slate-600 ...">delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                            <tr>
                              <td class="border border-slate-700 p-3 ...">{{$user->id}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$user->name}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$user->email}}</td>
                              <td class="border border-slate-700 px-5 ...">{{$user->role}}</td>

                              <td class="border border-slate-700 bg-lime-500 px-5 ...">
                                <form method="get"
                                  action="{{route('course.edit',['id' => $user->id])}}">
                                  @csrf
                                  <input type="submit" name="submit" value="update">
                                </form>
                              </td>
                              <td class="border border-slate-700 bg-red-600 px-5  ...">
                                <form method="POST"
                                  action="{{route('course.delete',['id' => $user->id])}}">
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
