<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat</title>
    <style>
        body {
            width: 680px;
            height: 845px;
        }

        .kop {
            text-align: center;
            width: 676px;
            line-height: 0.5px;
            margin: 0px;
        }

        .kop .p1 {
            font-size: 12px;
        }

        .kop .p2 {
            font-size: 22px;
        }

        .kop .p3 {
            font-size: 9px;
        }

        .kop p {
            font-size: 12px;
        }

        .kop tr td img {
            text-align: center;
            width: 69px;
            height: 77px;
            margin: 0px;
        }

        .tgl {
            width: 600px;
            font-size: 12px;
            text-align: right;
        }

        .nosut {
            font-size: 12px;
            width: 520px;
            line-height: 1px;
            margin: 0px;
            padding: 0px;
        }

        .nosut tr .jdl {
            width: 70px;
        }

        .nosut tr .sm {
            width: 8px;
        }

        .yth {
            font-size: 12px;
            width: 380px;
        }

        .isi {
            font-size: 12px;
            text-align: justify;
            width: 660px;
            /* line-height: 1.5px; */
        }

        .isi .p1 {
            text-indent: 10px;
        }

        .isi2 {
            font-size: 12px;
            width: 666px;
            margin: 0px;
            padding: 0px;
        }

        p {
            font-size: 12px;
        }

        .ttd .paraf p {
            text-align: center;
            font-size: 12px;
            line-height: 1px;
            margin-right: -80px;
        }
    </style>
</head>

<body>

    <table class="kop" border="0">
        <tr>
            <td><img src="<?= base_url(); ?>assets/img/logo.png" alt="logo" srcset=""></td>
            <td>
                <p class="p1"><b><i>Yayasan teratai Putih Global</i></b></p>
                <p class="p2"><b>SMK TERATAI PUTIH GLOBAL 2 BEKASI</b></p>
                <p class="p1"><b>BIDANG KEAHLIAN BISNIS MANAJEMEN & TEKNIK INFORMASI KOMUNIKASI</b></p>
                <p class="p3">KOMPENTENSI KEAHLIAN : AKUNTANSI & KEUANGAN LEMBAGA,BISNIS DARING & PEMASARAN,MULTIMEDIA</p>
                <p class="p3">TATA KELOLA PERKANTORAN,REKAYASA PERANGKAT LUNAK,PERBANGKAN & KEUANGAN MIKRO</p>
                <p><b>Jl. Rajawali 5 No. 29 Perumnas 1 Bekasi Selatan Telp. (021) 8894749</b></p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
                <p align="center"><b>STATUS TERAKREDITASI "A" (Amat Baik)</b></p>
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>
    <?php
    foreach ($dtasurat as $sr) {
        $tgl_surat = $sr->tgl_surat;
        $nomor = $sr->nomor;
        $lampiran = $sr->lampiran;
        $perihal = $sr->perihal;
        $perusahaan = $sr->perusahaan;
        $almt_perusahaan = $sr->almt_perusahaan;
    ?>

        <table class="tgl" border="0">
            <tr>
                <td>
                    <p><?php echo $tgl_surat; ?></p>
                </td>
            </tr>
        </table>
        <table class="nosut" border="0">
            <tr>
                <td class="jdl">
                    <p>Nomor</p>
                </td>
                <td class="sm"> :</td>
                <td>
                    <p><?php echo $nomor; ?></p>
                </td>
            </tr>
            <tr>
                <td class="jdl">
                    </p>Perihal</p>
                </td>
                <td class="sm"> :</td>
                <td>
                    <p><?php echo $perihal; ?></p>
                </td>
            </tr>
            <tr>
                <td class="jdl">
                    <p>Lampiran</p>
                </td>
                <td class="sm"> :</td>
                <td>
                    <p><?php echo $lampiran; ?></p>
                </td>
            </tr>

        </table>
        <div class="yth">
            <p>Kepada Yth:</p>
            <p>Bapak/Ibu</p>
            <p><?php echo $perusahaan; ?></p>
            <p><?php echo $almt_perusahaan; ?></p>
        </div>
        <div class="isi">
            <p><i>Dengan Hormat, </i></p>
            <p class="p1">Teriring salam dan doa semoga Bapak/Ibu berada dalam keadaan sehat walafiat, serta sukses selalu dalam melaksanakan aktifitas sehari - hari. </p>
            <p class="p1">Dengan ini kami mengajukan permohonan praktek kerja lapanan (PKL) bagi peserta didik kami pada perusahaan/instansi yang Bapak/Ibu pimpin, sebagai pembelajaran pencapaian kompetensi yang saling keterkaitan dan dengan keterpaduan antara sekolah pihak perusahaan. </p>
            <p>Nama-nama peserta didik yang diajukan adalah sebagai berikut</p>
        </div>

        <table class="isi2" border="1" cellspacing="0">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>NISN/NIS</th>
                    <th>Kompetensi Keahlian</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($detailsurat as $ds) {
                    $nama = $ds->nama;
                    $nis = $ds->nis;
                    $jenjang = $ds->jenjang;
                    $jurusan = $ds->jurusan;

                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $nama; ?></td>
                        <td><?= $nis; ?></td>
                        <td><?= $jenjang; ?>
                            <?= $jurusan; ?>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <div>
            <p>Adapun pelaksanaanya adalah 3 bulan yang waktunya di sesuaikan kebutuhan perusahaan/instansi.</p>
            <p>Demikian surat pengajuan ini dibuat, atas perhatian dan kerjasamanya di ucapkan terima kasih.</p>
        </div>
        <div>
            <table width="660" class="ttd" border="0">

                <td></td>
                <td class="paraf">
                    <p>Hormat Kami</p>
                    <p>An. Kepala SMK Teratai Putih Global 2</p>
                    <p>Waka Hubungan Industri</p><br>
                    <p>Nuraini Sarofah, SE.</p>
                </td>

            </table>
        </div>
    <?php } ?>

</body>

</html>