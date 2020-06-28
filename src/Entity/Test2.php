<?php

namespace App\Entity;

use App\Repository\Test2Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Test2Repository::class)
 */
class Test2
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $ate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAte(): ?\DateTimeInterface
    {
        return $this->ate;
    }

    public function setAte(\DateTimeInterface $ate): self
    {
        $this->ate = $ate;

        return $this;
    }
}
