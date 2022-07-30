<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Penjualan</th>
                <th>Kredit</th>
                <th>Kredit di Bayar</th>
                <th>Pembelian</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($datas as $data)    
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $data['date']}}</td>
                        <td>{{ $data['purchase']}}</td>
                        <td>{{ $data['credit']}}</td>
                        <td>{{ $data['pay']}}</td>
                        <td>{{ $data['invoice']}}</td>
                        <td>{{ $data['income']}}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</div>
<hr>
<div class="row">
    <div class="col-7">
    </div>
    <div class="col-5 form-group row">
        <table class="table table-borderless float-right">
            <tbody>
                <tr>
                    <td><h5 for="payTotal" class="col-sm-5 col-form-label">Total Pendapatan</h5></td>
                    <td class="float-lg-right"><h5 for="payTotal" class="col-sm-5 col-form-label">Rp. {{ number_format($total,0)}}</h5></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>