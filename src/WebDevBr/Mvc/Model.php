<?php

namespace WebDevBr\Mvc;

use Doctrine\ORM\EntityManager;

class Model
{
	private static $entityManager;

	public static function init(EntityManager $entityManager)
	{
		self::$entityManager = $entityManager;
	}

	public static function getEntityManager()
	{
		return self::$entityManager;
	}
}