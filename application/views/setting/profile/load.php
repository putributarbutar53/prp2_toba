<div class="row">
    <div class="col-md-3 text-center">
        <img src="<?= cek_file("uploads/users/" . $user['foto_profile']); ?>" alt="" style="max-width: 100%; margin-bottom: 15px;">
    </div>
    <div class="col-md-9">
        <table class="table-default" style="width: 100%;">
            <tr>
                <td>Username</td>
                <td>: <?= $user['username']; ?></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <?php
                    if ($user['role_admin'] == 'master') {
                        echo ": Administrator";
                    } else if ($user['role_admin'] == 'fisik') {
                        echo ": Admin Realisasi Fisik";
                    } else if ($user['role_admin'] == 'keuangan') {
                        echo ": Admin Realisasi Keuangan";
                    } else if ($user['role_admin'] == 'pakar') {
                        echo ": User Pengunjung";
                    } else if ($user['role_admin'] == 'biro') {
                        echo ": Admin Biro Pembangunan";
                    } else {
                        echo ": User ";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button id="tombol-foto" data-id="<?= encrypt_url($user['id_user']); ?>" data-toggle="modal" data-target="#modal-foto" class="btn btn-sm btn-success"><i class="fa fa-user"></i> EDIT PHOTO PROFILE</button>
                    &nbsp;&nbsp;
                    <button id="tombol-password" data-id="<?= encrypt_url($user['id_user']); ?>" data-toggle="modal" data-target="#modal-password" class="btn btn-sm btn-danger"><i class="fa fa-key"></i> EDIT PASSWORD</button>
                </td>
            </tr>
        </table>
    </div>
</div>