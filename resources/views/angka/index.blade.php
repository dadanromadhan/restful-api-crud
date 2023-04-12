@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">
    <div class="box-header" style="display: flex">
        <div id="buttons" style="margin-right: 10px;"></div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Angka</th>
                        <th>Terbilang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($angka as $num)
                    <tr class="data-row">
                        <td class="nama">{{ $loop->iteration }}</td>
                        <td class="angka">{{ $num->angka }}</td>
                        <td class="text-capilatize">{{ terbilang($num->angka) }}</td>
                    </tr>
                    {{-- <tr class="data-row">
                        <td class="nama">{{ $loop->iteration }}</td>
                        <td class="angka">{{ $num->angka }}</td>
                        <td class="text-capilatize">{{ Riskihajar\Terbilang\Facades\Terbilang::make($num->angka) }}</td>
                    </tr> --}}
                    {{-- <tr class="data-row">
                        <td class="nama">{{ $loop->iteration }}</td>
                        <td class="angka">{{ $num->angka }}</td>
                        <td class="text-capilatize">{{ convertToWords($num->angka) }}</td>
                    </tr> --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
