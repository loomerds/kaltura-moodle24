<?php

// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * My Media display library
 *
 * @package    local
 * @subpackage mymedia
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once(dirname(dirname(dirname(__FILE__))) . '/lib/tablelib.php');

class local_kaltura_renderer extends plugin_renderer_base {

    public function create_report_iframe($weak_session) {
        $html        = '';
        $report_url  = get_config(KALTURA_PLUGIN_NAME, 'report_uri');

        // Remove trailing slash
        $trailing_slash = strrpos($report_url, '/') + 1;
        $length         = strlen($report_url);

        if ($trailing_slash == $length) {
            $report_url = rtrim($report_url, '/');
        }

        $html = <<<EOT
<div class="resourcecontent resourcegeneral">
  <iframe id="resourceobject" src="{$report_url}/index.php/plugin/CategoryMediaReportAction?hpks={$weak_session}" width="700" height="700">
  </iframe>
</div>
EOT;

        return $html;

    }
}