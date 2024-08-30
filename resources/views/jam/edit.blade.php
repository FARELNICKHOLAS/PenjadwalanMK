@extends('layout')

@section('konten')
<h4>Edit Jam</h4>
<form action="{{ route ('jam.update', $jam->id) }}" method="post">
    @csrf
    <label for="jam"></label>
    <input type="text" name="sesi" value='{{ $jam->sesi }}' class="form-control mb-2">
    <button class='btn btn-outline-dark'>Edit</button>
</form>
@endsection