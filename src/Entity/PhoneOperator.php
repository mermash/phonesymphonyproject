<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PhoneOperatorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhoneOperatorRepository::class)]
class PhoneOperator
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 3)]
    private ?string $code = null;

    #[ORM\OneToMany(mappedBy: 'operator', targetEntity: PhoneNumber::class)]
    private Collection $phoneNumbers;

    public function __construct()
    {
        $this->phoneNumbers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection<int, PhoneNumber>
     */
    public function getPhoneNumbers(): Collection
    {
        return $this->phoneNumbers;
    }

    public function addPhoneNumber(PhoneNumber $phoneNumber): static
    {
        if (!$this->phoneNumbers->contains($phoneNumber)) {
            $this->phoneNumbers->add($phoneNumber);
            $phoneNumber->setOperator($this);
        }

        return $this;
    }

    public function removePhoneNumber(PhoneNumber $phoneNumber): static
    {
        if ($this->phoneNumbers->removeElement($phoneNumber)) {
            // set the owning side to null (unless already changed)
            if ($phoneNumber->getOperator() === $this) {
                $phoneNumber->setOperator(null);
            }
        }

        return $this;
    }
}
