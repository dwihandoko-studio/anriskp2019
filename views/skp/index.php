<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$header_title = isset($header_title) ? $header_title : '';
$message_error = isset($message_error) ? $message_error : '';
$records = isset($records) ? $records : FALSE;
$field_id = isset($field_id) ? $field_id : FALSE;
$paging_set = isset($paging_set) ? $paging_set : FALSE;
$active_modul = isset($active_modul) ? $active_modul : 'none';
$next_list_number = isset($next_list_number) ? $next_list_number : 1;
$skpt_ouput = get_skpt_output();
$status = get_skpt_status();
$label = get_skpt_label();
//var_dump($access_rules);
?>
<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading ui-draggable-handle label">                                
                <h3 class="panel-title"><?php echo $header_title; ?></h3>
            </div>
            <div class="panel-body"><div class="card-block">
                    <?php echo load_partial("back_end/shared/attention_message"); ?>
                    <form class="form-panel">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="keyword" style="width: calc(100% - 80px);" value="<?php echo $keyword; ?>" class="form-control" placeholder="Silahkan masukkan kata kunci disini"/>
                                <?php echo dropdown_tahun('tahun', $tahun, 5, 'class="form-control" style="width: 80px;"') ?>
                                <div class="input-group-btn">
                                    <button class="btn btn-default"><span class="fa fa-search"></span> Cari</button>

                                    <a href="<?php echo base_url($active_modul . '/detail'); ?>" class="btn btn-default"><span class="fa fa-plus"></span> Tambah</a>

                                </div>
                            </div>
                        </div>
                    </form>
                    <!--<div class="table-responsive">-->
                    <table class="table table-striped table-borderless table-vcenter">
                        <thead>
                            <tr role="row">
                                <th width="5%">No</th>
                                <th class="text-center">Nama Kegiatan</th>
                                <th width="5%">Kuantitas</th>
                                <th width="5%">Kualitas</th>
                                <th width="5%">Waktu</th>
                                <th>Biaya</th>
                                <th width="5%">Status</th>
                                <th width="5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($records != FALSE): ?>
                                <?php foreach ($records as $key => $record): ?>
                                    <tr>
                                        <td class="text-right"><?php echo $next_list_number++ ?></td>
                                        <td><?php echo beautify_str($record->deskripsi_dupnk) ?></td>
                                        <td><?php echo $record->skpt_kuantitas . " " . show_skpt_output($record->skpt_output); ?></td>
                                        <td class="text-right"><?php echo $record->skpt_kualitas ?></td>
                                        <td class="text-right"><?php echo $record->skpt_waktu ?></td>
                                        <td class="text-right"><span class="pull-left">Rp. </span><?php echo number_format($record->skpt_biaya, 0, ',', '.') ?></td>
                                        <td class="text-center"><span class="label <?php echo $label[$record->skpt_status] ?>"><?php echo $status[$record->skpt_status] ?></span></td>
                                        <td class="text-center">
                                            <?php if ($record->skpt_status == 0 || $record->skpt_status == 5): ?>
                                                <div class="btn-group btn-group-sm">
                                                    <a class="btn btn-sm btn-default" href="<?php echo base_url($active_modul . "/detail") . "/" . $record->id_skpt; ?>">Ubah</a>
                                                    <a class="btn btn-sm btn-default" href="<?php echo base_url($active_modul . "/ajukan") . "/" . $record->id_skpt; ?>">Ajukan</a>
                                                    <a class="btn btn-sm btn-default btn-hapus-row" href="javascript:void(0);" rel="<?php echo base_url($active_modul . "/delete") . "/" . $record->id_skpt; ?>">Hapus</a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($record->skpt_status == 2): ?>
                                            <div class="btn-group btn-group-sm">
                                                    <a class="btn btn-sm btn-default" href="<?php echo base_url($active_modul . "/detail") . "/" . $record->id_skpt; ?>">Ubah</a>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="14"> Kosong / Data tidak ditemukan. </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</div>