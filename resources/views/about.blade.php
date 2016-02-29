@extends('master')
@section('title', 'About')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title">About</div>
            <a href="https://docs.google.com/document/d/1H1QM1bAbnfIc4IxMwK03D_sIVQ17lr7Q5-XlbLfFA1o/edit"
               target="_blank">Tema</a>
            {{ phpinfo()  }}
        </div>
    </div>
@endsection