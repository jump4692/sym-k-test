<?php

namespace App\Entity;

use App\Repository\InvoiceLineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceLineRepository::class)]
class InvoiceLine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Invoice::class, inversedBy: 'invoiceLines')]
    #[ORM\JoinColumn(nullable: false)]
    private $InvoiceId;

    #[ORM\Column(type: 'text')]
    private $Description;

    #[ORM\Column(type: 'integer')]
    private $Quantity;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $Amount;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $Vat;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $TotalWVat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $Id): self
    {
        $this->Id = $Id;

        return $this;
    }

    public function getInvoiceId(): ?Invoice
    {
        return $this->InvoiceId;
    }

    public function setInvoiceId(?Invoice $InvoiceId): self
    {
        $this->InvoiceId = $InvoiceId;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->Amount;
    }

    public function setAmount(string $Amount): self
    {
        $this->Amount = $Amount;

        return $this;
    }

    public function getVat(): ?string
    {
        return $this->Vat;
    }

    public function setVat(string $Vat): self
    {
        $this->Vat = $Vat;

        return $this;
    }

    public function getTotalWVat(): ?string
    {
        return $this->TotalWVat;
    }

    public function setTotalWVat(string $TotalWVat): self
    {
        $this->TotalWVat = $TotalWVat;

        return $this;
    }
}
