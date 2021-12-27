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


require_once("$CFG->libdir/formslib.php");

class update_form extends moodleform
{
    //Add elements to form
    public function definition()
    {
        $mform = $this->_form; // Don't forget the underscore! 

        $healthchoices = array(
            0 => "Healthy",
            1 => "Sick",
            2 => "not determined"
        );

        $mform->addElement('hidden', 'id', get_string('id', 'local_aquarium'));
        $mform->setType('id', PARAM_INT);

        $mform->addElement('text', 'fish', get_string('name', 'local_aquarium'));
        $mform->setType('fish', PARAM_NOTAGS);
        //$mform->setDefault('fish', $fishdata->fish);

        $mform->addElement('text', 'amount', get_string('amount', 'local_aquarium')); // Add elements to your form
        $mform->setType('amount', PARAM_INT);                 //Set type of element
        //$mform->setDefault('amount', $fishdata->amount);        //Default value

        $mform->addElement('text', 'price', get_string('price', 'local_aquarium')); // Add elements to your form
        $mform->setType('price', PARAM_INT);                   //Set type of element
        //$mform->setDefault('price', $fishdata->price);        //Default value

        $mform->addElement('select', 'health', get_string('health', 'local_aquarium'),  $healthchoices);
        //$mform->setDefault('health', $c);


        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files)
    {
        return array();
    }
}
