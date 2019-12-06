<?php

namespace Product\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ZendHydratorClassMethods;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="\Product\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;
    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;
    /**
     * @var double
     *
     * @ORM\Column(name="price", type="float", scale=2)
     */
    private $price;

    /**
     * @var DateTime
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $created_at;

    /**
     * @var DateTime
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updated_at;

    // public function __construct($data = [])
    // {
    //     $this->created_at = new DateTime();

    //     if (!empty($data)) {
    //         (new ClassMethods(false))->hydrate($data, $this);
    //     }
    // }
    
    public function toArray()
    {
        $data = get_object_vars($this);
        foreach ($data as $attribute => $value) {
            if (is_object($value)) {
                $data[$attribute] = get_object_vars($value);
            }
        }
        return $data;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at ? $this->created_at->format("Y-m-d H:i") : null;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at ? $this->updated_at->format("Y-m-d H:i") : null;
    }
}