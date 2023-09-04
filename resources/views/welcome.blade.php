@extends('layouts.landing')
@section('BTcss')<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">@endsection

@section('titulo','practica crud')

@section('BTscript')<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>@endsection


@section('contenido')

<livewire:lvcrud></livewire:lvcrud>

@endsection