<?php


namespace Vazzi\SlimeBoost;


use pocketmine\block\Block;
use pocketmine\block\BlockToolType;
use pocketmine\item\Item;
use pocketmine\math\Vector3;
use pocketmine\Player;

class SlimeBlock extends Block
{

	protected $id = self::SLIME_BLOCK;

	public function getName(): string
	{
		return "Slime Block";
	}

	public function getToolType(): int
	{
		return BlockToolType::TYPE_NONE;
	}

	public function place(Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, Player $player = null): bool
	{
		return parent::place($item, $blockReplace, $blockClicked, $face, $clickVector, $player);
	}

	public function onBreak(Item $item, Player $player = null): bool
	{
		return parent::onBreak($item, $player);
	}

}