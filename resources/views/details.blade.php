@extends('layout')

@section('title','Details')

@section('index')
@foreach ($offers as $offer)
    <tr>
    <td>{{ $offer['size'] . 'GB ' }}</td>
    <td>{{ $offer['language'] }}</td>
    <td>{{ $offer['programming'] }}</td>
    <td>{{ $offer['price'] . '$' }}</td>
    <td>{{ $offer['time'] }}</td>
    <td>{{ $offer['discount'] }}</td>
@endforeach
@endsection

<style scoped>
    .intro{
        display: none;
    }
</style>