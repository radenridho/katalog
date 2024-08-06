@extends('layouts.dashboard-index')

@section('content')
 <div class="p-4 sm:ml-64">
    <div class="p-4">
        <div class="grid grid-cols-6 gap-4 mb-4">
            <div class="flex items-center justify-center h-24">
                <svg class="w-6 h-6 text-purple-800 dark:text-white mx-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.75 4H19M7.75 4a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 4h2.25m13.5 6H19m-2.25 0a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 10h11.25m-4.5 6H19M7.75 16a2.25 2.25 0 0 1-4.5 0m4.5 0a2.25 2.25 0 0 0-4.5 0M1 16h2.25"/>
                </svg>
                <p class="text-2xl text-semibold"> Dashboard </p>
            </div>
        </div>  
    </div>
 </div>
@endsection

