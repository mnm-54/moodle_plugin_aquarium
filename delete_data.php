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
require_once($CFG->dirroot . '/local/aquarium/classes/form/delete_form.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/aquarium/delete_data.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('title_delete', 'local_aquarium'));

$fishid = optional_param('id', '-1', PARAM_INT);

$fishdata = $DB->get_record('local_aquarium_fish_data', array('id' => $fishid));
//die(var_dump($fishdata));


$PAGE->requires->js_call_amd('local_aquarium/confirm_delete', 'init', array($fishid, $fishdata->fish));
echo $OUTPUT->header();
echo $OUTPUT->footer();


// $fishdata = $DB->get_record('local_aquarium_fish_data', array('id' => $fishid));
// $choices = $DB->delete_records('local_aquarium_fish_data', array('id' => $fishid));

//redirect($CFG->wwwroot . '/local/aquarium/manage.php', $fishdata->fish . " is deleted");
