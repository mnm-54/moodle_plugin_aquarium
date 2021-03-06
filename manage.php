<?php
// This file is part of Moodle - http://moodle.org/
//
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
 * Version details
 *
 * @package    local_aquarium
 * @author     shahriar
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @var stdClass $plugin 
 */

require_once(__DIR__ . '/../../config.php');
global $DB;


$PAGE->set_url(new moodle_url('/local/aquarium/manage.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('title_manage', 'local_aquarium'));


$fishdata = $DB->get_records('local_aquarium_fish_data');

echo $OUTPUT->header();

$PAGE->requires->js_call_amd('local_aquarium/delete_modal', 'init', array());

$templetecontext = (object)[
    'fishdata' => array_values($fishdata),
    'editurl' => new moodle_url('/local/aquarium/update_data.php'),
    'addurl' => new moodle_url('/local/aquarium/add_data.php'),
    'deleteurl' => new moodle_url('/local/aquarium/delete_data.php')
];
echo $OUTPUT->render_from_template('local_aquarium/manage', $templetecontext);

echo $OUTPUT->footer();
