@include('components.dateformat')
<!doctype html>
<html>
<head>
    <title>Pemberitahuan Jadual Bertugas</title>
</head>
<body>
    <p>
    Assalamualaikum,
    <br><br>
    Untuk makluman pihak Tuan/Puan dikehendaki untuk bertugas di Parliman pada ketetapan berikut:<br><br>
    Sidang :  <b>{{ strtoupper($data['dewan_desc']) }}</b><br>
    Persidangan Parlimen :  <b>{{ $data['sidang'] }}</b><br>
    Tarikh Persidangan :  <b>{{ DisplayDate($data['tarikh']) }}, ({{ $data['hari'] }})</b><br><br>
    Sila Log Masuk Sistem E-Parlimen Jakim: <a href="http://eparlimen.islam.gov.my" target="_blank">eparlimen.islam.gov.my</a>
    <br><br>
    Sekian, terima kasih,<br>
    <b>Urusetia Parlimen Jakim</b>
    <br><br>
    Sebarang masalah, sila hubungi Pentadbir Sistem atau hubungi Urusetia Parlimen Jakim
    <br><br>
    ..:::::Notifikasi Emel Permakluman:::::..<br>>>>>Sistem E-Parlimen Jakim<<<<<br>Jabatan Kemajuan Islam Malaysia (Jakim)
    <br><br><em>** Emel Ini Dijana Oleh Sistem E-Parlimen Jakim. Tidak perlu dibalas **</em>
    </p>
</body>
</html>