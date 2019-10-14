<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* custom setting */

$config['appname'] = 'SKP Arsiparis';
$config['maintenance'] = FALSE;
$config['maintenance_url'] = 'http://' . $_SERVER['SERVER_NAME'];
$config['copyright'] = 'Copyright Lahir Wisada Santoso &copy; 2019.';
$config['tahun_pembuatan'] = 2019;


$config['hashed'] = 'VFUUl2rWS6I5EdSFU2JJyQ==';

$config['appkey'] = '1029384756';

$config['appsalt'] = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

//$config['resource_api_link'] = 'http://localhost/2017apik/lws_api/';

$config['lmanuser.usingbackendfrontend'] = FALSE;
$config['user_id_column_name'] = "id_user";
$config['profil_id_column_name'] = "id_profil";

/**
 * tabel profil lain yang digunakan selain backbone_profil
 */
$config['another_profil_tablename'] = "sc_master.master_pegawai";
$config['another_profil_properties']['partial_form_view'] = "back_bone/member/atlant/tr_pegawai_profil";
$config['another_profil_properties']['form_config'] = array(
    "using_select2" => TRUE,
    "input_name" => "pegawai_id",
    "input_type" => "select",
    "additional_js" => array(
        "back_bone/member/atlant/js/tr_pegawai_profil_js",
    ),
    "add_cssfiles" => array("plugins/select2/select2.min.css"),
    "add_jsfiles" => array(
        "plugins/select2/select2.full.min.js",
        "atlant/plugins/summernote/summernote.js",
    ),
);

$config['another_profil_properties']['foreign_key'] = "id_profil";
$config['another_profil_properties']['foreign_key_to_another_profile'] = "pegawai_id";
$config['another_profil_properties']['insert_new_data'] = TRUE;

$config['another_profil_properties']['columns'] = array(
    "sc_master.master_pegawai.pegawai_id",
    "sc_master.master_pegawai.pegawai_nip",
    "sc_master.master_pegawai.pegawai_nama",
    "sc_master.master_pegawai.id_organisasi"
);
//$config['another_profil_properties']['related_tables'] = array(
//    "sc_akrifwz.master_jabatan" => array(
//        "fkey" => "jabatan_id",
//        "reference_to" => "sc_akrifwz.master_pegawai",
//        "columns" => array(
//            "keljab_id",
//            "jabatan_nama"
//        ),
//        "referenced" => "LEFT"
//    ),
//);
$config['backend_login_uri'] = 'back_bone/login';

$config['application_upload_location'] = '_assets/uploads/';

$config['application_active_layout'] = 'appui';

/**
 * ini digunakan untuk memberikan nama schema
 * ketika menggunakan basis data postgres
 */
//$config['application_db_schema_name'] = 'sc_master';
$config['application_db_schema_name'] = '';

/** ini digunakan ketika aplikasi telah diupload ke hosting */
//$config['application_path_location'] = '/home/ikatifau/public_html/';

$config['front_end_css_files'] = array("bootstrap/bootstrap.css", "bootstrap/bootstrap-theme.css");

$config['paging_using_template_name'] = TRUE;


$config["pdf_paper_size"] = 'A5';
$config["pdf_paper_orientation"] = 'L';


/**
 * core/LW_Model.php
 * 
 */
$config['using_insert_and_update_properties'] = TRUE;

$config['created_date'] = 'created_date';
$config['modified_date'] = 'modified_date';
$config['created_by'] = 'created_by';
$config['modified_by'] = 'modified_by';
$config['record_active'] = 'record_active';

$config['default_limit_row'] = 10;
$config['limit_key_param'] = 'limit';
$config['offset_key_param'] = 'offset';
$config['keyword_key_param'] = 'keyword';

/**
 * modul configuration
 * array(
 * 		"nama_modul"=>array(
 * 							"nama_aksi"=>array(
  "nama_aksi_dikontroller"
 * )));
 *
 * @example 
 * "cref_pegawai" => array(
 *       "insert" => array("detail", "history_detail"),
 *       "update" => array("detail", "history_detail"),
 *       "delete" => array("delete"),
 *       "read" => array("index", "get_like", "history"),
 *   );
 */
$config['modul_action_configuration'] = array(
//    ga perlu didaftarkan jika cuma ini saja di controller
//    "default" => array(
//        "insert" => array('insert', 'detail'),
//        "update" => array('update', 'detail'),
//        "delete" => array('delete'),
//        "read" => array('read', 'index', 'get_like')
//    ),
    "home" => array(
        "read" => array("lihataktifitas", "landingpage2", "test"),
    ),
    "msusulan" => array(
        "update" => array("validasi"),
    ),
    "aktifitasharian" => array(
		/*** FIX: BAMBANG SUGIARTO -- 11/07/2018 18:11 ***/
        "read" => array("get_waktu", "rkbulanan", "test", "calendareventslibur", "download_rk_bulanan")
    ),
    "aktifitasbawahan" => array(
        "read" => array("lihataktifitas", "test")
    ),
    "validasiaktifitas" => array(
        "read" => array("test"),
        "update" => array("validasi", "reject"),
    ),
    "msapi" => array(
        "read" => array("like_nip"),
    ),
    "tpaktifitas" => array(
        "insert" => array("pilihaktifitas", "tambahaktifitas", "getaktifitas"),
    ),
    "setkegiatan" => array(
        "insert" => array("pilihpegawai", "tambahpegawai", "getkegiatan", "pilihkegiatan", "tambahkegiatan"),
    ),
    "setaktifitas" => array(
        "insert" => array("getaktifitas", "pilihaktifitas", "tambahaktifitas", "pilihkegiatan", "tambahkegiatan"),
    ),
    "inputaktifitas" => array(
        "insert" => array("laporan"),
    ),
    "trpenilaian" => array(
        "insert" => array("aktifitas", "perilaku", "capaian"),
    ),
    "rekaptpp" => array(
        "read" => array("test", "rkbulanan", "download_admin_keuangan", "index_test"),
        "insert" => array("download")
    ),
    "kelolaaktivitas" => array(
        "read" => array("reset_umpeg", "hapus_umpeg"),
        "insert" => array("reset"),
        "delete" => array("hapus")
    ),
    "validasiaktifitas_cli" => array(
        "read" => array("revoke_presence_when_zero_activity")
    ),
);

/**
 * konstanta id role dengan nama role pegawai negeri sipil
 * digunakan untuk memberikan role secara otomatis pada PNS ketika menambahkan PNS pada referensi data PNS
 * karena ketika menambahkan PNS aplikasi membuatkan username dan password secara otomatis
 */
$config['id_role_pegawai_negeri_sipil'] = 5;
$config['id_role_admin_opd'] = 7;


$config['pass_auth_key_index'] = "pass";