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
				$data = [
					"user" => $user_id,
					"role" => $role_admin
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

	if ($users['role_admin'] == 'master') {
		$level = "Administrator";
	} elseif ($users['role_admin'] == 'fisik') {
		$level = "Admin Realisasi Fisik";
	} elseif ($users['role_admin'] == 'keuangan') {
		$level = "Admin Realisasi Keuangan";
	} elseif ($users['role_admin'] == 'pakar') {
		$level = "User Pengunjung";
	} elseif ($users['role_admin'] == 'biro') {
		$level = "Admin Biro Pembangunan";
	} else {
		$level = "User";
	}

	
	$params = [
		'username' => $users['username'],
		'role' => $level,
		'role_admin' => $users['role_admin'],
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
