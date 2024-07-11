<?php echo view('layout/v_header'); ?>
<div class="container mt-5">
    <?php if (session()->getFlashdata('insert')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('insert'); ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('update')) : ?>
        <div class="alert alert-primary"><?= session()->getFlashdata('update'); ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('delete')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('delete'); ?></div>
    <?php endif; ?>
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
    <div class="table-responsive">
        <table id="datatable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kelola as $value) : ?>
                    <tr>
                        <td scope="row"><?= $i++; ?></td>
                        <td><?= esc($value['nama']); ?></td>
                        <td><?= esc($value['latitude']); ?></td>
                        <td><?= esc($value['longitude']); ?></td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $value['idtambahan']; ?>">Edit</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $value['idtambahan']; ?>">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal<?= $value['idtambahan']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $value['idtambahan']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('kelola/updatedata/' . $value['idtambahan']) ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel<?= $value['idtambahan']; ?>">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control <?= session()->getFlashdata('error') && session()->getFlashdata('idtambahan') == $value['idtambahan'] && session()->getFlashdata('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= esc(old('nama', $value['nama'])); ?>">
                                <?php if (session()->getFlashdata('error') && session()->getFlashdata('idtambahan') == $value['idtambahan'] && session()->getFlashdata('nama')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('nama') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" class="form-control <?= session()->getFlashdata('error') && session()->getFlashdata('idtambahan') == $value['idtambahan'] && session()->getFlashdata('latitude') ? 'is-invalid' : '' ?>" id="latitude" name="latitude" value="<?= esc(old('latitude', $value['latitude'])); ?>">
                                <?php if (session()->getFlashdata('error') && session()->getFlashdata('idtambahan') == $value['idtambahan'] && session()->getFlashdata('latitude')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('latitude') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="text" class="form-control <?= session()->getFlashdata('error') && session()->getFlashdata('idtambahan') == $value['idtambahan'] && session()->getFlashdata('longitude') ? 'is-invalid' : '' ?>" id="longitude" name="longitude" value="<?= esc(old('longitude', $value['longitude'])); ?>">
                                <?php if (session()->getFlashdata('error') && session()->getFlashdata('idtambahan') == $value['idtambahan'] && session()->getFlashdata('longitude')) : ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('longitude') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Edit Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal<?= $value['idtambahan']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $value['idtambahan']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?= base_url('kelola/delete/' . $value['idtambahan']) ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel<?= $value['idtambahan']; ?>">Hapus Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus data ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('kelola/insertdata') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama') ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('nama') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control <?= validation_show_error('latitude') ? 'is-invalid' : '' ?>" id="latitude" name="latitude" value="<?= old('latitude') ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('latitude') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control <?= validation_show_error('longitude') ? 'is-invalid' : '' ?>" id="longitude" name="longitude" value="<?= old('longitude') ?>">
                        <div class="invalid-feedback">
                            <?= validation_show_error('longitude') ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo view('layout/v_footer'); ?>