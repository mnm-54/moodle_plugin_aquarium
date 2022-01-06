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

define([
  "jquery",
  "core/ajax",
  "core/str",
  "core/modal_factory",
  "core/modal_events",
  "core/notification",
], function ($, Ajax, str, ModalFactory, ModalEvents, Notification) {
  $(".delete-btn").on("click", function () {
    console.log("ok,in");
    let btnId = $(this).attr("id");
    let ary = btnId.split("-");
    let fishId = ary[ary.length - 1];
    let fishname = ary[0];

    //creating modal
    ModalFactory.create({
      type: ModalFactory.types.SAVE_CANCEL,
      title: "Confirm Delete",
      body: fishname + " will be removed from the database",
    }).then(function (modal) {
      modal.setSaveButtonText("delete");

      let root = modal.getRoot();
      root.on(ModalEvents.save, function () {
        let wsfunction = "local_aquarium_delete_fish";
        let params = {
          fishid: fishId,
        };
        let request = {
          methodname: wsfunction,
          args: params,
        };

        Ajax.call([request])[0]
          .done(function () {
            window.location.href = $(location).attr("href");
          })
          .fail(Notification.exception);
      });
      modal.show();
    });
  });
});
