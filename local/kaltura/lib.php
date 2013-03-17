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

require_once(dirname(__FILE__) . '/locallib.php');

/**
 * Kaltura video assignment grade preferences form
 *
 * @package    local
 * @subpackage kaltura
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * This function adds a link to Kaltura course reports in the navigation block tree
 *
 * @param object - navigation_node
 * @return - nothing
 */

// renamed by Loomer - function kaltura_extends_navigation($navigation) {
function local_kaltura_extends_navigation($navigation) {

    global $USER, $PAGE, $SITE;

    // Finds courses where the user has this capabiltiy
    $courses = get_user_capability_course('local/kaltura:view_report', null, true, 'shortname', 'shortname ASC');

    if (!isloggedin()) {
        return '';
    }

    if (empty($courses)) {
        return '';
    }

    $node_home = $navigation->get('home');
    $report_text = get_string('kaltura_course_reports', 'local_kaltura');

    if ($node_home) {
        $node_reports = $node_home->add($report_text, null, 70, $report_text, 'kal_reports');
    }

    $current_course = $PAGE->course->id;
    $i   = 5;

    foreach ($courses as $key => $course) {

        if ($SITE->id == $course->id) {
            $i++;
            continue;
        }

        $course_name = format_string($course->shortname);
        $node_reports->add($course_name, new moodle_url('/local/kaltura/reports.php',
                                                        array('courseid' => $course->id)),
                                                        navigation_node::NODETYPE_LEAF, $course_name, 'kal_reports_course' . $i);

        $i++;
    }
}

