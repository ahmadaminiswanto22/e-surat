<br />
<section class="mt-5 mb-3">
    <div class="container">
        <!-- <div class="flash-data" data-flashdata=" "></div> -->
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">Data
                        <strong>Berhasil</strong> <?= $this->session->flashdata('success'); ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>

        <?php } else if ($this->session->flashdata('gagal')) { ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">Data
                        <strong>Gagal Ditambah</strong> <?= $this->session->flashdata('gagal'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php } ?>
        <h2>Data User</h2>
        <div class="btn">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm tambahUser" data-toggle="modal" data-target="#formUser">
                Tambah Data Baru
            </button>
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="formUser" tabindex="-1" aria-labelledby="judulUser" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="judulUser">Tambah Data User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url(); ?>Registrasi/tambah_user" method="post">
                                <input type="hidden" name="id_user" id="id_user">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username Pengguna">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="example@gmail.com">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Show Password
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nama">Nama User</label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="akses">Hak Akses</label>
                                        <select id="akses" name="akses" class="form-control">
                                            <option selected>Pilih Akses...</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                                    <button type="reset" name="kembali" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.form-check-input').click(function() {
                    if ($(this).is(':checked')) {
                        $('#password').attr('type', 'text');
                    } else {
                        $('#password').attr('type', 'password');
                    }
                });
            });
        </script>
        <table class="table-bordered display" id="example" style="width:100%">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama User</th>
                    <th>Hak Akses</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $us) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $us['username']; ?></td>
                        <td><?= $us['nama']; ?></td>
                        <td><?= $us['akses']; ?></td>
                        <td><?= $us['email']; ?></td>
                        <td>
                            <a data-toggle="modal" data-target="#formUser" data-id="<?= $us['id_user']; ?>" type="submit" class="btn btn-success btn-sm tampilUbahUser"><i class="far fa-edit"></i>Edit</a>

                            <a href="<?= base_url(); ?>Registrasi/hapus_user/<?= $us['id_user']; ?>" type="button" class="btn btn-danger btn-sm tombol"><i class="far fa-trash-alt"></i>Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>
</section>