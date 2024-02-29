<?php
$result = $this->mquery->select_by('data_kontrak_real', ['id_kontrak ' => 0]);
foreach ($result as $r) {
    $no_kontrak=$r['no_kontrak'];
    $ta_kontrak = $this->mquery->select_id('ta_kontrak', ['no_kontrak' => $no_kontrak]);
    $data =  [
        'id_kontrak' => $ta_kontrak['id_kontrak']
    ];
    $this->db->update('data_kontrak_real', $data, ['id_real' => $r['id_real']]);
    //echo $no_kontrak." ";
}
?>