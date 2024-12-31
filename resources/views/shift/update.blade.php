@extends('layouts.sidebar')
@section('content')
    <div class="flex items-center mb-4">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 6.50005V9.50005C11.999 10.1627 11.7352 10.7979 11.2666 11.2665C10.798 11.7352 10.1628 11.9989 9.50011 12H6.50011C5.8373 11.9989 5.20209 11.7352 4.73347 11.2665C4.26486 10.7979 4.00117 10.1627 4.00007 9.50005V6.50005C4.00114 5.83723 4.26485 5.20202 4.73347 4.73341C5.2021 4.26479 5.8373 4.0011 6.50011 4H9.50011C10.1628 4.00107 10.798 4.26478 11.2666 4.73341C11.7352 5.20202 11.9989 5.83723 12 6.50005ZM18.3 4H15.3C14.6373 4.00107 14.0021 4.26478 13.5335 4.73341C13.0649 5.20202 12.8012 5.83723 12.8001 6.50005V9.50005C12.8012 10.1627 13.0649 10.7979 13.5335 11.2665C14.0021 11.7352 14.6373 11.9989 15.3 12H18.3C18.9628 11.9989 19.598 11.7352 20.0667 11.2665C20.5353 10.7979 20.799 10.1627 20.8001 9.50005V6.50005C20.799 5.83723 20.5353 5.20202 20.0667 4.73341C19.598 4.26479 18.9628 4.0011 18.3 4ZM9.49991 12.8001H6.50005C5.83723 12.8012 5.20202 13.0649 4.73341 13.5335C4.26479 14.0021 4.0011 14.6373 4 15.3V18.3C4.00107 18.9628 4.26478 19.598 4.73341 20.0667C5.20203 20.5353 5.83723 20.799 6.50005 20.8001H9.50005C10.1627 20.799 10.7979 20.5353 11.2665 20.0667C11.7352 19.598 11.9989 18.9628 12 18.3V15.3C11.9989 14.6373 11.7352 14.0021 11.2665 13.5335C10.7979 13.0649 10.1627 12.8012 9.50005 12.8001H9.49991ZM18.3 12.8001H15.3C14.6373 12.8012 14.0021 13.0649 13.5335 13.5335C13.0649 14.0021 12.8012 14.6373 12.8001 15.3V18.3C12.8012 18.9628 13.0649 19.598 13.5335 20.0667C14.0021 20.5353 14.6373 20.799 15.3 20.8001H18.3C18.9628 20.799 19.598 20.5353 20.0667 20.0667C20.5353 19.598 20.799 18.9628 20.8001 18.3V15.3C20.799 14.6373 20.5353 14.0021 20.0667 13.5335C19.598 13.0649 18.9628 12.8012 18.3 12.8001Z" fill="url(#paint0_linear_9_749)"/>
            <defs>
                <linearGradient id="paint0_linear_9_749" x1="4" y1="4" x2="20.8001" y2="20.8001" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#FFB790"/>
                    <stop offset="1" stop-color="#E8590C"/>
                </linearGradient>
            </defs>
        </svg>
        <h1 class="text-xl font-extrabold text-gray-900">Update Shift</h1>
    </div>

    <form action="{{ route('shift.update', $shift->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Shift Name</label>
            <input type="text" id="name" name="name" value="{{ $shift->name }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" placeholder="Enter shift name">
        </div>

        <div>
            <label for="shift_start" class="block text-sm font-medium text-gray-700">Start Time</label>
            <input type="time" id="shift_start" name="shift_start" value="{{\Carbon\Carbon::parse($shift->shift_start)->format('H:i')}}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
        </div>

        <div>
            <label for="shift_end" class="block text-sm font-medium text-gray-700">End Time</label>
            <input type="time" id="shift_end" name="shift_end" value="{{ \Carbon\Carbon::parse($shift->shift_end)->format('H:i') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Shift</button>
            <a href="{{ route('shift.index') }}" class="ml-2 text-gray-500">Cancel</a>
        </div>
    </form>
@endsection