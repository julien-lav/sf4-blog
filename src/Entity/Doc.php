<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * Doc
 *
 * @ORM\Table(name="docs")
 * @ORM\Entity(repositoryClass="App\Repository\DocRepository")
 * @Vich\Uploadable
 */

/**
 * summary
 */
class Doc 
{
	/**
	 * @Vich\UploadableField(mapping="doc", fileNameProperty="docName")
	 * 
	 * @var File
	 */
	private $docFile;

	/**
	 * @ORM\Column(type="string", length=255)
	 *
	 * @var string
	 */
	private $docName;

	/**
	 * @ORM\Column(type="datetime")
	 *
	 * @var \DateTime
	*/
	private $updatedAt;

	/**
	 * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $doc
	 *
	 * @return Doc
	*/
	public function setDocFile(File $doc = null)
	{
	    $this->docFile = $doc;

	    if ($doc) 
	        $this->updatedAt = new \DateTimeImmutable();
	    
	    return $this;
	}

	/**
	 * @return File|null
	 */
	public function getDocFile()
	{
	    return $this->docFile;
	}

	/**
	 * @param string $docsName
	 *
	 * @return Doc
	 */
	public function setDocName($devisName)
	{
	    $this->docName = $docName;

	    return $this;
	}

	/**
	 * @return string|null
	 */
	public function getDocName()
	{
	    return $this->docName;
	}
}