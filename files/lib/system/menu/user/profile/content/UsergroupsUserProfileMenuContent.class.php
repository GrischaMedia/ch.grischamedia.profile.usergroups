<?php
namespace wcf\system\menu\user\profile\content;
use wcf\data\user\User;
use wcf\system\cache\builder\UserGroupCacheBuilder;
use wcf\system\SingletonFactory;
use wcf\system\WCF;

/**
 * Handles user profile user groups content.
 * 
 * @author		GrischaMedia.ch
 * @copyright	2019-2020 GrischaMedia.ch
 * @license		GrischaMedia.ch Commercial License <https://GrischaMedia.ch.de>
 * @package		ch.grischamedia.profile.usergroups
 */
class UsergroupsUserProfileMenuContent extends SingletonFactory implements IUserProfileMenuContent {
	/**
	 * @inheritDoc
	 */
	public function getContent($userID) {
		$user = new User($userID);
		$groupIDs = $user->getGroupIDs();
		
		$groups = [];
		foreach (UserGroupCacheBuilder::getInstance()->getData([], 'groups') as $group) {
			if (in_array($group->groupID, $groupIDs)) {
				$groups[] = $group;
			}
		}
		
		WCF::getTPL()->assign([
				'groups' => $groups,
				'userID' => $userID
		]);
		
		return WCF::getTPL()->fetch('userProfileUsergroups');
	}
	
	/**
	 * @inheritDoc
	 */
	public function isVisible($userID) {
		if (WCF::getSession()->getPermission('user.profile.canViewUsergroups')) return true;
		return false;
	}
}
