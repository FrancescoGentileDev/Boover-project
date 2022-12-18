@extends('layouts.app')

@section('head')
{{-- Braintree DropIn Gateway JS --}}
<script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
@endsection

@section('content')

<form action="#">
    @csrf
    <input type="hidden" name="clientToken" id="clientToken" value="{{ $clientToken }}">

    <div id="dropin-container"></div>
    <button id="submit-button">Request payment method</button>
</form>

@dump('Auth Debug')
@dump($clientToken)
@dump($gateway)

@endsection
