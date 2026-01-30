{{--
@extends('customer.layouts.master')

@section('title', 'Change Password | Dr. Kinjal')

... (rest of the content) ...
--}}
@extends('customer.layouts.master')

@section('title', 'Change Password | Dr. Kinjal')

@push('styles')
<style>
    /* ... existing styles ... */
</style>
@endpush

@section('content')
<div class="py-20 text-center">
    <p>Redirecting to password reset...</p>
    <script>window.location.href = "{{ route('customer.forgot-password') }}";</script>
</div>
@endsection