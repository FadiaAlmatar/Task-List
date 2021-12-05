@extends('layouts.amz')
    <x-auth-card>
        <!-- Validation Errors -->
        <form method="POST" action="{{route('employees.update', $user->id)}}">
            @csrf
            @method('PUT')
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" required />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Save') }}
                </x-button>
                <a href="{{route('dashboard')}}"><x-button type="button" class="btn btn-danger ml-4">{{__('Cancel')}}</x-button></a>
            </div>
        </form>
    </x-auth-card>

