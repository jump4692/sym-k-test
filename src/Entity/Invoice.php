<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $InvoiceDate;

    #[ORM\Column(type: 'integer')]
    private $InvoiceNumber;

    #[ORM\Column(type: 'integer')]
    private $CustomerId;

    #[ORM\OneToMany(mappedBy: 'InvoiceId', cascade:["persist"], targetEntity: InvoiceLine::class)]
    private $invoiceLines;

    public function __construct()
    {
        $this->invoiceLines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $Id): self
    {
        $this->Id = $Id;

        return $this;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->InvoiceDate;
    }

    public function setInvoiceDate(\DateTimeInterface $InvoiceDate): self
    {
        $this->InvoiceDate = $InvoiceDate;

        return $this;
    }

    public function getInvoiceNumber(): ?int
    {
        return $this->InvoiceNumber;
    }

    public function setInvoiceNumber(int $InvoiceNumber): self
    {
        $this->InvoiceNumber = $InvoiceNumber;

        return $this;
    }

    public function getCustomerId(): ?int
    {
        return $this->CustomerId;
    }

    public function setCustomerId(int $CustomerId): self
    {
        $this->CustomerId = $CustomerId;

        return $this;
    }

    /**
     * @return Collection<int, InvoiceLine>
     */
    public function getInvoiceLines(): Collection
    {
        return $this->invoiceLines;
    }

    public function addInvoiceLine(InvoiceLine $invoiceLine): self
    {
        if (!$this->invoiceLines->contains($invoiceLine)) {
            $this->invoiceLines[] = $invoiceLine;
            $invoiceLine->setInvoiceId($this);
        }

        return $this;
    }

    public function removeInvoiceLine(InvoiceLine $invoiceLine): self
    {
        if ($this->invoiceLines->removeElement($invoiceLine)) {
            // set the owning side to null (unless already changed)
            if ($invoiceLine->getInvoiceId() === $this) {
                $invoiceLine->setInvoiceId(null);
            }
        }

        return $this;
    }
}
