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
 * Kaltura reports page
 *
 * @package    local
 * @subpackage kaltura
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/local/kaltura/locallib.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/repository/kaltura/locallib.php');

$courseid = required_param('courseid', PARAM_INT);

require_login($courseid);


$context  = get_context_instance(CONTEXT_COURSE, $courseid);

$PAGE->set_context($context);

$reports = get_string('header_kaltura_reports', 'local_kaltura');
$header  = format_string($SITE->shortname).": $reports";

$PAGE->set_url('/local/kaltura/reports.php');

$PAGE->set_pagetype('kaltura-reports-index');
$PAGE->set_pagelayout('standard');
//$PAGE->set_pagelayout('frontpage');
$PAGE->set_title($header);
$PAGE->set_heading($header);
$PAGE->add_body_class('kaltura-reports-index');

// Create navbar
$param       = array('id' => $courseid);
$course_name = $DB->get_field('course', 'fullname', $param);

//$PAGE->navbar->add(get_string('mycourses'));
//$PAGE->navbar->add(format_string($course_name), new moodle_url('/course/view.php', array('id' => $courseid)));
$PAGE->navbar->add(get_string('kaltura_report_navbar', 'local_kaltura'));

echo $OUTPUT->header();

require_capability('local/kaltura:view_report', $context, $USER);

$enabled = get_config(KALTURA_PLUGIN_NAME, 'enable_reports');

if (!empty($enabled)) {
    $renderer = $PAGE->get_renderer('local_kaltura');

    $wks = local_kaltura_generate_weak_kaltura_session($courseid, $course_name);


    if (!empty($wks)) {
        echo $renderer->create_report_iframe($wks);
    } else {
        echo get_string('conn_failed', 'local_kaltura');
    }
} else {
    echo get_string('report_disabled', 'local_kaltura');
}

echo $OUTPUT->footer();