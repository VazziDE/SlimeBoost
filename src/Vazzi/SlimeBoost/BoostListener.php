<?php


namespace Vazzi\SlimeBoost;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\math\Vector3;

class BoostListener implements Listener
{

	// Boost Settings
	public static $highboost = 1;
	public static $forwardboost = 1;


	public function boostPlayerEvent(PlayerMoveEvent $moveEvent){

		$player = $moveEvent->getPlayer();

		if($player->getLevel()->getBlock($player->floor()->subtract(0, 1, 0))->getId() === SlimeBoost::$blockID){
			switch ($player->getDirection()){

				case 2:
					//North
					$player->setMotion(new Vector3(-(self::$forwardboost), self::$highboost, 0));
					break;
				case 3:
					//East
					$player->setMotion(new Vector3(0, self::$highboost, -(self::$forwardboost)));
					break;
				case 0:
					//South
					$player->setMotion(new Vector3(self::$forwardboost, self::$highboost, 0));
					break;
				case 1:
					//West
					$player->setMotion(new Vector3(0, self::$highboost, self::$forwardboost));
					break;

			}
		}

	}

}