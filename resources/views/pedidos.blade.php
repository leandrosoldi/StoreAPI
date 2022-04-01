@extends('layouts.app')
@section('content')   
    <pedidos 
        :pedidos="{{ $pedidos }}"
        :gateways="{{ $gateways }}"
    >
    </pedidos>   
@endsection
