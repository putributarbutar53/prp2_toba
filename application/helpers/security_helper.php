<?php

function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('username')) {
		redirect(site_url());
	} else {
		if ($ci->session->userdata('apps') == "prp2sumut") {
			$timeout = $ci->session->userdata('timeout');
			if (time() < $timeout) {
				$ci->session->set_userdata('timeout', time() + 900);
				$user_id = $ci->session->userdata('user_id');
				$role_admin = $ci->session->userdata('role_admin');
				$is_skpd = $ci->session->userdata('is_skpd');
				$data = [
					"user" => $user_id,
					"role" => $role_admin,
					"is_skpd" => $is_skpd
				];
				return $data;
			} else {
				redirect(site_url());
			}
		} else {
			redirect(site_url());
		}
	}
}

function cek_akses_user()
{
	$ci = get_instance();
	$id_level = $ci->session->userdata('id_level');

	$menu = $ci->uri->segment(1);
	$queryMenu = $ci->db->get_where('users_menu', ['menu_link' => $menu])->row_array();
	$menu_id = $queryMenu['menu_id'];

	$userAccess = $ci->db->get_where('users_access', ['role_id' => $id_level, 'menu_id' => $menu_id]);
	if ($userAccess->num_rows() == 0) {
		redirect(site_url('blocked'));
	} else {
		return $userAccess->row_array();
	}
}

function detail_skpd()
{
	$ci = get_instance();
	$id_skpd = $ci->session->userdata('skpd');
	$data = [
		"id_skpd" => $id_skpd
	];
	return $data;
}


function detail_user()
{
	$ci = get_instance();
	$ci->db->select('*');
	$ci->db->from('users');
	$ci->db->where('username', $ci->session->userdata('username'));
	$users = $ci->db->get()->row_array();

	$ci->db->select('*');
	$ci->db->from('users_level');
	$ci->db->where('role_id', $users['level']);
	$users_level = $ci->db->get()->row_array();

	$params = [
		'username' => $users['username'],
		'nama_level' => $users_level['role_name'],
		'id_level' => $users['level'],
		'foto' => $users['foto_profile'],
		'id_skpd' => $users['id_skpd']
	];
	return $params;
}

function encrypt_url($string)
{
	$output = false;
	$security       = parse_ini_file("security.ini");
	$secret_key     = $security["encryption_key"];
	$secret_iv      = $security["iv"];
	$encrypt_method = $security["encryption_mechanism"];
	$key    = hash("sha256", $secret_key);
	$iv     = substr(hash("sha256", $secret_iv), 0, 16);
	$result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	$output = base64_encode($result);
	return $output;
}

function decrypt_url($string)
{
	$output = false;
	$security       = parse_ini_file("security.ini");
	$secret_key     = $security["encryption_key"];
	$secret_iv      = $security["iv"];
	$encrypt_method = $security["encryption_mechanism"];
	$key    = hash("sha256", $secret_key);
	$iv = substr(hash("sha256", $secret_iv), 0, 16);
	$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	if (($output == "") or ($output == false) or ($output == null)) {
		return "error";
	} else {
		return $output;
	}
}
