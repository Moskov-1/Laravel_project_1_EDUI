<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Demo') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <form action="/demo" method="POST">
                        @csrf
                        <label>Your Name</label>
                        <input type="text" name="name"/><br/><br/>
                        <label>Which Fruit Do you Like</label><br/>
                        <input type="checkbox" name="fruits[]" value="Man" 
                            id="myCheckbox1" />
                        <label for="myCheckbox1"><img src="/storage/1/hover2.gif" /></label>

                        <input type="checkbox" name="fruits[]" value="Mango" >A<br/>
                        <input type="checkbox" name="fruits[]" value="Orange"> Orange <br/>
                        <input type="checkbox" name="fruits[]" value="Apple"> Apple <br/>
                        <input type="checkbox" name="fruits[]" value="Banana"> Banana <br/>
                        <input type="checkbox" name="fruits[]" value="Strawberry"> Strawberry <br/><br/>
                
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>