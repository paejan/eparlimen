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
    Sila Log Masuk Sistem E-Parlimen MOTAC: <a href="http://eparlimen.motac.gov.my/" target="_blank">eparlimen.motac.gov.my/</a>
    <br><br>
    Sekian, terima kasih,<br>
    <b>Urusetia Parlimen MOTAC</b>
    <br><br>
    Sebarang masalah, sila hubungi Pentadbir Sistem atau hubungi Urusetia Parlimen MOTAC
    <br><br>
    ..:::::Notifikasi Emel Permakluman:::::..<br>>>>>Sistem E-Parlimen MOTAC<<<<<br>Kemeneterian Pelancongan, Seni dan Budaya Malaysia (MOTAC)
    <br><br><em>** Emel Ini Dijana Oleh Sistem E-Parlimen MOTAC. Tidak perlu dibalas **</em>
    </p>
</body>
</html>
