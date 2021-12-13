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
 * @package    local_edit
 * @author     shahriar
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @var stdClass $plugin 
 */


require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/aquarium/classes/form/update_form.php');

$PAGE->set_url(new moodle_url('/local/aquarium/update_data.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('title_update', 'local_aquarium'));

$mform = new update_form();

global $DB;

$fishid = array();
$choices = $DB->get_records('local_aquarium_fish_data');
$c = 0;
foreach ($choices as $choice) {
    $fishid[$c] = $choice->id;
    $c++;
}

$healthchoices = array(
    0 => "Healthy",
    1 => "Sick",
    2 => "not determined"
);


if ($mform->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
    redirect($CFG->wwwroot . '/local/aquarium/manage.php', "the update form is cancelled");
} else if ($fromform = $mform->get_data()) {
    //In this case you process validated data. $mform->get_data() returns data posted in form.
    $record = new stdClass();
    $record->id = $fishid[$fromform->fishname];
    $record->amount = $fromform->amount;
    $record->price = $fromform->price;
    $record->health_condition = $healthchoices[$fromform->health];

    $DB->update_record('local_aquarium_fish_data', $record, $bulk = false);
    redirect($CFG->wwwroot . '/local/aquarium/manage.php', "new data is updated in the database. ");
}

echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();
