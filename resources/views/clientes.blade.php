@extends('layouts.app')
@section('onLoadScript')
    formatCPFCNPJTableColumns();
    formatDateTableColumns();
    formatMoney();
@endsection
@section('content')
    <div class="d-flex justify-content-center mt-4 ">
        <span class="fs-1">Lista de Clientes</span>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Documento</th>
                    <th>Cliente</th>
                    <th>E-mail</th>
                    <th class="text-center">Tipo Pessoa</th>
                    <th class="text-center">Dt. Nasc.</th>
                    <th>Loja</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cli )
                    <tr>
                        <td class="cpf-cnpj text-center">{{ $cli->cpf_cnpj}}</td>
                        <td>{{ $cli->nome}}</td>
                        <td>{{ $cli->email}}</td>
                        <td class="text-center">{{ $cli->tipo_pessoa}}</td>
                        <td class="date text-center">{{ $cli->data_nasc}}</td>
                        <td>{{ $cli->loja->nome}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    

@endsection