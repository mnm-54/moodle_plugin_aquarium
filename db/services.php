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


defined('MOODLE_INTERNAL') || die();

$functions = array(
    'local_aquarium_delete_fish' => array(
        'classname' => 'local_aquarium_external_delete',
        'methodname'  => 'delete_fish',
        'classpath'   => 'local/aquarium/externallib.php',
        'description' => 'Delete fish data of given id',
        'type'        => 'write',
        'ajax' => true,
    )
);

$services = array(
    'local_aquarium_delete' => array(
        'functions' => array('local_aquarium_delete_fish'),
        'restrictedusers' => 0,
        // into the administration
        'enabled' => 1,
        'shortname' =>  'aquarium_delete_service',
    )
);
