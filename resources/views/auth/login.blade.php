@extends('layouts.app')

@section('title', 'login')

@section('content')


<div class="block mx-auto my-12 p-8 bgwhite w-1/3 border border-gary-200 rounded-lg shadow-lg">
<h1 class="text-3xl text-center font-bold">login</h1>

<form class="mt-4" method="POST" action="">
    @csrf
 <input type="email" class="border border-gary-200 rounded-md bg*gary-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bgwhite" placeholder="email" id="email" name="email">
 <input type="password" class="border border-gary-200 rounded-md bg*gary-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bgwhite" placeholder="Password" id="password" name="password">

   @error('message')
    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">*{{$message}}</p>
    @enderror

 <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-indigo-600 focus">Send</button>

</form>

</div>


@endsection