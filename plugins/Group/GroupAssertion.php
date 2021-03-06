<?php
 /**
  * Copyright (c) 2016, Regents of the University of Michigan.
  * All rights reserved. See LICENSE.txt for details.
  */
class GroupAssertion extends Omeka_Acl_Assert_Ownership {

 public function assert(Zend_Acl $acl,
                           Zend_Acl_Role_Interface $role = null,
                           Zend_Acl_Resource_Interface $resource = null,
                           $privilege = null)
    {

      $allowed = parent::assert($acl,$role,$resource,$privilege);

      if (!$allowed) {
         $allowed = $this->_is_exhibit_link_to_group($resource->id);
      }

      return $allowed;
    } // end assert

//This function validate if the user with group relation is linked to an exhibit.
 private function _is_exhibit_link_to_group($exhibitId)
 {
                 $flag = false;
		 $user = current_user();
		 $user_id = $user['id'];
		 $groups_in_exhibit = ExhibitGroupsRelationShip::findGroupsBelongToExhibit($exhibitId);
                 $user_groups = GroupUserRelationship::findUserRelationshipRecords($user_id);
                 foreach ($groups_in_exhibit as $groups_in_exhibit_object => $value) {
                    foreach ($user_groups as $group => $group_id) {
                       if ($group_id['group_id'] == $value['group_id'])
                          return true;
                        }
                 }

		 return $flag;
 }
}
