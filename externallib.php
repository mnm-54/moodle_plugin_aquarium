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

require_once("$CFG->libdir/externallib.php");

class local_aquarium_external_delete extends external_api
{
    public static function delete_fish_parameters()
    {
        return new external_function_parameters(
            array(
                'fishid' => new external_value(PARAM_INT, "Fish id")
            )
        );
    }

    public static function delete_fish($fishid)
    {
        global $DB;
        $fish = $DB->delete_records('local_aquarium_fish_data', array('id' => $fishid));

        $return_value = [
            'id' => $fishid,
            'status' => 'deleted'
        ];

        return $return_value;
    }

    public static function delete_fish_returns()
    {
        return new external_single_structure(
            array(
                'id' => new external_value(PARAM_INT, 'id of deleted fish'),
                'status' => new external_value(PARAM_TEXT, 'deleted')
            )
        );
    }
}
