<?php
/**
 * @author: Koshkin Alexey <koshkin.alexey@gmail.com>
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Album;
use AppBundle\Entity\Genre;
use AppBundle\Entity\Tag;
use AppBundle\Repository\PictureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Picture;

class PictureController extends Controller
{
	/**
	 * @Route("/allfoto", name="allfoto")
	 */
	public function indexAction()
	{
		$pictures = $this->getDoctrine()
			->getRepository('AppBundle:Picture')
			->findBy([], null, 10);

		return $this->render('picture/list.html.twig', [
				'pictures' => $pictures,
			]
		);
	}

	/**
	 * Show one picture page
	 *
	 * @Route("/picture/{id}", name="picture_view")
	 * @Route("/album/{album_id}/{id}", name="picture_view_album")
	 * @Route("/genre/{genre_alias}/{id}", name="picture_view_genre")
	 * @Route("/tag/{tag_alias}/{id}", name="picture_view_tag")
	 */
	public function viewAction($id, $album_id = null, $genre_alias = null, $tag_alias = null) {

		$picture = $this->getDoctrine()
			->getRepository('AppBundle:Picture')
			->find($id);

		/** @var Picture[] $pictureList */
		$pictureList = [];

		if ($picture === null)
			throw $this->createNotFoundException();

		if ($album_id) {
			$album = $this->loadAlbumById($album_id);
			$pictureList = $this->loadAlbumContent($album);
		} else {
			$album = null;
		}

		if ($genre_alias) {
			$genre = $this->loadGenreByAlias($genre_alias);
			$pictureList = $this->loadGenreContent($genre);
		} else {
			$genre = null;
		}

		if ($tag_alias) {
			$tag = $this->loadTagByAlias($tag_alias);
			$pictureList = $this->loadTagContent($tag);
		} else {
			$tag = null;
		}

		return $this->render('picture/view.html.twig', [
				'picture' => $picture,
				'album' => $album,
				'genre' => $genre,
				'tag' => $tag,
				'pictureList' => $pictureList,
			]
		);

	}

	/**
	 * Show one album
	 *
	 * @param integer $id
	 * @return Response
	 *
	 * @Route("/album/{id}", name="album_view")
	 */
	public function albumAction($id) {

		$album = $this->loadAlbumById($id);

		return $this->render('picture/list.html.twig', [
				'album' => $album,
				'genre' => null,
				'tag' => null,
				'pictures' => $this->loadAlbumContent($album),
			]
		);
	}

	/**
	 * Show one genre
	 *
	 * @param string $alias
	 * @return Response
	 *
	 * @Route("/genre/{alias}", name="genre_view")
	 */
	public function genreAction($alias) {

		$genre = $this->loadGenreByAlias($alias);

		return $this->render('picture/list.html.twig', [
				'album' => null,
				'genre' => $genre,
				'tag' => null,
				'pictures' => $this->loadGenreContent($genre),
			]
		);
	}

	/**
	 * Show one tag
	 *
	 * @param string $alias
	 * @return Response
	 *
	 * @Route("/tag/{alias}", name="tag_view")
	 */
	public function tagAction($alias) {

		$tag = $this->loadTagByAlias($alias);

		return $this->render('picture/list.html.twig', [
				'album' => null,
				'genre' => null,
				'tag' => $tag,
				'pictures' => $this->loadTagContent($tag),
			]
		);
	}

	/**
	 * @param integer $id
	 * @return Album
	 */
	protected function loadAlbumById($id) {

		$album = $this->getDoctrine()
			->getRepository('AppBundle:Album')
			->findOneBy(['id'=>$id]);

		/** @var Album $album */
		if ($album === null)
			throw $this->createNotFoundException();

		return $album;
	}

	/**
	 * @param Album $album
	 * @return Picture[]
	 */
	protected function loadAlbumContent(Album $album) {

		return $this->getDoctrine()
			->getRepository('AppBundle:Picture')
			->findByAlbumId($album);
	}

	/**
	 * @param string $alias
	 * @return Genre
	 */
	protected function loadGenreByAlias($alias) {
		$genre = $this->getDoctrine()
			->getRepository('AppBundle:Genre')
			->findOneBy(['alias'=>$alias]);

		/** @var Genre $genre */
		if ($genre === null)
			throw $this->createNotFoundException();

		return $genre;
	}

	/**
	 * @param Genre $genre
	 * @return Picture[]
	 */
	protected function loadGenreContent(Genre $genre) {

		return  $this->getDoctrine()
			->getRepository('AppBundle:Picture')
			->createQueryBuilder('p')
			->where(':genre MEMBER OF p.genre')
			->setParameters(['genre' => $genre])
			->getQuery()
			->getResult();
	}

	/**
	 * @param string $alias
	 * @return Tag
	 */
	protected function loadTagByAlias($alias) {
		$tag = $this->getDoctrine()
			->getRepository('AppBundle:Tag')
			->findOneBy(['alias'=>$alias]);

		/** @var Tag $tag */
		if ($tag === null)
			throw $this->createNotFoundException();

		return $tag;
	}

	/**
	 * @param Tag $tag
	 * @return Picture[]
	 */
	protected function loadTagContent(Tag $tag) {

		return $this->getDoctrine()
			->getRepository('AppBundle:Picture')
			->createQueryBuilder('p')
			->where(':tag MEMBER OF p.tag')
			->setParameters(['tag' => $tag])
			->getQuery()
			->getResult();
	}
}