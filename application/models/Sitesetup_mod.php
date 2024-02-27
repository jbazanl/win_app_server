<?php

// ##############################################################################
// OV500 - Open Source SIP Switch & Pre-Paid & Post-Paid VoIP Billing Solution
// OV500 Version 2.0.0
// Copyright (C) 2019-2021 Openvoips Technologies   
// http://www.openvoips.com  http://www.openvoips.org
// 
// The Initial Developer of the Original Code is
// Anand Kumar <kanand81@gmail.com> & Seema Anand <openvoips@gmail.com>
// Portions created by the Initial Developer are Copyright (C)
// the Initial Developer. All Rights Reserved.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with this program. If not, see <http://www.gnu.org/licenses/>.
// ##############################################################################


class Sitesetup_mod extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function update_sitesetup($data) {

        $where = "sitesetup_id=1";
        $str = $this->db->update_string('sys_sitesetup', $data, $where);
        $result = $this->db->query($str);

        if (!$result) {
            $error_array = $this->db->error();
            return $error_array['message'];
        }
        return true;
    }

    function update_sitesetup_with_file($filename) {
        $sql = " UPDATE sys_sitesetup SET 
		admin_logo=" . $this->db->escape($filename) . " ";
        $query = $this->db->query($sql);
    }

    function get_sitesetup_data() {
        $row = array(
            'site_name' => 'TEST',
            'mail_sent_from' => 'openvoips@gmail.com',
            'mail_sent_to' => 'openvoips@gmail.com',
        );
        return $row;
    }

}
