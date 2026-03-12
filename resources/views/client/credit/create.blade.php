@extends('layouts.client')

@section('title', 'Credit Application')

@section('content')

    <div class="max-w-xl mx-auto">

        <h1 class="text-3xl font-bold mb-6">
            Credit Application
        </h1>

        <form action="{{ route('client.credit.store') }}" method="POST" class="space-y-4">

            @csrf

            <input type="hidden" name="order_id" value="{{ $order->id }}">

            <div>
                <label class="font-semibold">Down Payment (DP)</label>
                <input type="number" name="dp" class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label>Tenor</label>
                <select name="tenor" class="border p-2 w-full">
                    <option value="12">12 Months</option>
                    <option value="24">24 Months</option>
                    <option value="36">36 Months</option>
                    <option value="48">48 Months</option>
                </select>
            </div>

            {{-- <div>
                <label class="font-semibold">Interest Rate (%)</label>
                <input type="number" step="0.01" name="interest_rate" class="w-full border rounded-lg p-2">
            </div> --}}

            <button class="bg-black text-white px-6 py-3 rounded-lg">
                Submit Credit Application
            </button>

        </form>

    </div>

@endsection
