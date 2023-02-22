<!DOCTYPE html>
<html>

<head>
    <title>Order Detail</title>
</head>

<body>
    <p>Terima Kasih atas kepercayaan anda sudah melakukan pemanggilan montir di perusahaan kami untuk menyelesaikan
        masalah anda</p>
    <p>Berikut Merupakan Detail Pemesanan Anda</p>
    <div style="display: flex;">
        <div style="flex:1">
            <p>ORDER ID</p>
            <p>Tanggal</p>
            <p>Nama</p>
            <p>Email</p>
            <p>Telp.</p>
            <p>Montir</p>
            <p>Status</p>
        </div>
        <div style="flex: 1">
            <p>: {{ $data->order_id }}</p>
            <p>: {{ $data->date }}</p>
            <p>: {{ $data->name }}</p>
            <p>: {{ $data->email }}</p>
            <p>: {{ $data->phone }}</p>
            <p>: {{ $data->montir->name ?? '' }}</p>
            <p>: {{ $data->status }}</p>
        </div>
    </div>
    <p>Anda akan mendapatkan email balasan kalo montir sudah menuju ketempatmu</p>
    <br>
    <br>
    <p>Mutiara Variasi</p>
</body>

</html>
