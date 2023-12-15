@extends('layouts.app')

@section('title', 'register')

@section('content')



<div class="block mx-auto my-12 p-8 bgwhite w-1/3 border border-gary-200 rounded-lg shadow-lg">
    <h1 class="text-3xl text-center font-bold">Registro</h1>
    
    <form class="mt-4" method="POST" action="">
        @csrf
    <input type="text" class="border border-gary-200 rounded-md bg-gary-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bgwhite" placeholder="Name" id="name" name="name">
    @error('name')
    <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">*{{$message}}</p>
    @enderror

     <input type="email" class="border border-gary-200 rounded-md bg-gary-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bgwhite" placeholder="email" id="email" name="email">
     @error('email')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">*{{$message}}</p>
     @enderror

     <input type="password" class="border border-gary-200 rounded-md bg-gary-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bgwhite" placeholder="password" id="password" name="password">

     @error('password')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">*{{$message}}</p>
     @enderror

     <input type="password" class="border border-gary-200 rounded-md bg-gary-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bgwhite" placeholder="Password Confirmation" id="PasswordConfirmat" name="PasswordConfirmat">
    
    
     <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-indigo-600 focus">Send</button>
    
    </form>
    
    </div>
    

@endsection