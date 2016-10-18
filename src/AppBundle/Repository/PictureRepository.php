<?php
/**
 * @author: Koshkin Alexey <koshkin.alexey@gmail.com>
 */
namespace AppBundle\Repository;

use AppBundle\Entity\Genre;
use Doctrine\ORM\EntityRepository;

/**
 * Class PictureRepository
 * @package AppBundle\Repository
 */
class PictureRepository extends EntityRepository
{

	/**
	 * @param Genre $genre
	 * @return array
	 */
	public function findByGenre(Genre $genre)
	{
		print "ok";
		exit;
		return $this
			->createQueryBuilder('r')
			->where('r.genre = :genre')
			->setParameter(':genre', $genre)
			->getQuery()
			->getResult();
	}

}