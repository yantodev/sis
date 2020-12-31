 <div class="container">
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Data Kegiatan</h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th width="50px">No</th>
                             <th width="250px">Tanggal</th>
                             <th>Kegiatan</th>
                             <th width="80px">Absen</th>
                             <th>Jumlah</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($kegiatan as $k) : ?>
                             <tr>
                                 <td><?= $i; ?></td>
                                 <td><?= format_indo($k['tgl']); ?></td>
                                 <td><?= $k['kegiatan']; ?></td>
                                 <td><a href="<?= base_url('home/absen/') . $k['id']; ?>"> <button class="btn btn-primary">ABSENSI</button></a></td>
                                 <td>
                                     <a href="" class="btn btn-warning" title="Klik untuk lihat detail">
                                         <i class="fas fa-users"></i>
                                         <span class="badge bg-info">
                                             <?= $data->kegiatan; ?></span>
                                     </a>
                                 </td>
                             </tr>
                             <?php $i++; ?>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>