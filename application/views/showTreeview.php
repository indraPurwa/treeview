<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Tutorial Membuat Tree-view dinamis dengan Codeigniter + Bootstrap-treeview.js</title>
      <link href="<?=base_url();?>assets/bootstrap-treeview-1.2.0/public/css/bootstrap.css" rel="stylesheet">
      <link href="<?=base_url();?>assets/bootstrap-treeview-1.2.0/public/css/bootstrap.css" rel="stylesheet">

      <script src="<?=base_url();?>assets/bootstrap-treeview-1.2.0/public/js/jquery.js"></script>
      <script src="<?=base_url();?>assets/bootstrap-treeview-1.2.0/public/js/bootstrap-treeview.js"></script>
   </head>
<body>
<div class="container">
   <div class="col-sm-4">
      <h2>Daftar Kota</h2>
      <div id="treeview2" ></div>
   </div>
</div>
<script>
   var defaultData = [
      <?php
         $kota=$this->treeview_m->kotaGetAll();
         foreach ($kota as $key => $value) {
            $kecamatan=$this->treeview_m->kecamatanGetBykota_id($value['id']);
            echo "{text: '$value[nama]',
            tags: ['".count($kecamatan)."'],
            nodes: [
               ";
               foreach ($kecamatan as $key2 => $value2) {
                  $desa=$this->treeview_m->desaGetBykecamatan_id($value2['id']);
                  echo "{
                     text: '$value2[nama]',
                     tags: ['".count($desa)."'],
                     nodes: [
                           ";
                           foreach ($desa as $key3 => $value3) {
                              echo "{text: '$value3[nama]',enableLinks:true,href: 'https://www.google.com'},";
                           }
                  echo "
                     ]
                     },";
               }
            echo "]},";
         }
         ?>
   ];
   $('#treeview2').treeview({
      levels: 1,
      showTags: true,
      data: defaultData,
      enableLinks: true
   });
</script>
</body>
</html>