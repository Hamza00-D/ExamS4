<?php

namespace App\Entity;

use App\Entity\Equipment;
use App\Repository\EquipmentRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipmentRepository::class)
 */
class Equipment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
    * min = 5,
    * max = 50,
    * minMessage = "Le nom d'un equipement doit comporter au moins {{ limit }} caractères",
    * maxMessage = "Le nom d'un equipement doit comporter au plus {{ limit }} caractères"
    * )
     */
    private $EquipmentName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
    * min = 5,
    * max = 50,
    * minMessage = "La marque d'un equipement doit comporter au moins {{ limit }} caractères",
    * maxMessage = "La marque d'un equipement doit comporter au plus {{ limit }} caractères"
    * )
     */
    private $EquipmentMark;

    /**
     * @ORM\Column(type="decimal", precision=100, scale=0)
     * @Assert\NotEqualTo(
        * value = 0,
        * message = "Le prix d’un equipement ne doit pas être égal à 0 "
        * )
     */
    private $EquipmentPrice;

    /**
     * @ORM\Column(type="text")
     
     */
    private $EquipmentDescription;

    /**
     * @ORM\Column(type="smallint")
     */
    private $EquipmentQuantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipmentName(): ?string
    {
        return $this->EquipmentName;
    }

    public function setEquipmentName(string $EquipmentName): self
    {
        $this->EquipmentName = $EquipmentName;

        return $this;
    }

    public function getEquipmentMark(): ?string
    {
        return $this->EquipmentMark;
    }

    public function setEquipmentMark(string $EquipmentMark): self
    {
        $this->EquipmentMark = $EquipmentMark;

        return $this;
    }

    public function getEquipmentPrice(): ?int
    {
        return $this->EquipmentPrice;
    }

    public function setEquipmentPrice(int $EquipmentPrice): self
    {
        $this->EquipmentPrice = $EquipmentPrice;

        return $this;
    }

    public function getEquipmentDescription(): ?string
    {
        return $this->EquipmentDescription;
    }

    public function setEquipmentDescription(string $EquipmentDescription): self
    {
        $this->EquipmentDescription = $EquipmentDescription;

        return $this;
    }

    public function getEquipmentQuantity(): ?int
    {
        return $this->EquipmentQuantity;
    }

    public function setEquipmentQuantity(int $EquipmentQuantity): self
    {
        $this->EquipmentQuantity = $EquipmentQuantity;

        return $this;
    }
}
