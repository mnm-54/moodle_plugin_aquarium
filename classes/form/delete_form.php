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


//moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");

class delete_form extends moodleform
{
    //Add elements to form
    public function definition()
    {
        global $CFG, $DB;

        $choices = $DB->get_records('local_aquarium_fish_data');
        $fishnames = array();
        $c = 0;
        foreach ($choices as $choice) {
            $fishnames[$c] = $choice->fish;
            $fishid[$c] = $choice->id;
            $c++;
        }

        $mform = $this->_form; // Don't forget the underscore! 

        $mform->addElement('select', 'fishname', get_string('deletefish', 'local_aquarium'),  $fishnames);
        $mform->setDefault('fishname', 0);

        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files)
    {
        return array();
    }
}
