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
        global $CFG;

        $mform = $this->_form; // Don't forget the underscore! 

        $choices = array(
            0 => "GoldFish",
            1 => "Tetra",
            2 => "Danio",
            3 => "Guppy"
        );
        $mform->addElement('select', 'fishname', get_string('name', 'local_aquarium'),  $choices);
        $mform->setDefault('fishname', 0);


        $mform->addElement('text', 'amount', get_string('amount', 'local_aquarium')); // Add elements to your form
        $mform->setType('amount', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('amount', '10');        //Default value

        $mform->addElement('text', 'price', get_string('price', 'local_aquarium')); // Add elements to your form
        $mform->setType('price', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('price', '50');        //Default value

        $mform->addElement('text', 'health', get_string('health', 'local_aquarium')); // Add elements to your form
        $mform->setType('health', PARAM_NOTAGS);                   //Set type of element
        $mform->setDefault('health', 'Healthy');        //Default value


        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files)
    {
        return array();
    }
}
