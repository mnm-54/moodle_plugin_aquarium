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

class add_form extends moodleform
{
    //Add elements to form
    public function definition()
    {
        global $CFG;

        $choices = array(
            0 => "Healthy",
            1 => "Sick",
            2 => "not determined"
        );

        $mform = $this->_form; // Don't forget the underscore! 

        $mform->addElement('text', 'fishname', get_string('name', 'local_aquarium')); // Add elements to your form
        $mform->setType('fishname', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('fishname', get_string('newname', 'local_aquarium'));        //Default value

        $mform->addElement('text', 'amount', get_string('add_amount', 'local_aquarium')); // Add elements to your form
        $mform->setType('amount', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('amount', 1);        //Default value

        $mform->addElement('text', 'price', get_string('add_price', 'local_aquarium')); // Add elements to your form
        $mform->setType('price', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('price', 50);        //Default value

        $mform->addElement('select', 'health', get_string('health', 'local_aquarium'),  $choices);
        $mform->setDefault('health', 0);

        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files)
    {
        return array();
    }
}
