<?php

namespace App\Entity;

<<<<<<< HEAD
use App\Repository\CommandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
#[ORM\Table(name: 'commands')]
=======
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\Collection;
use App\Entity\Commande_produit;
use App\Entity\Livraison;

#[ORM\Entity]
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
<<<<<<< HEAD
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'product_id', type: 'integer', nullable: false)]
    private ?int $productId = null;

    #[ORM\Column(name: 'id_utilisateur', type: 'integer', nullable: true)]
    private ?int $idUtilisateur = null;

    #[ORM\Column(name: 'customer_name', type: 'string', length: 100, nullable: false)]
    private ?string $customerName = null;

    #[ORM\Column(name: 'phone', type: 'string', length: 20, nullable: false)]
    private ?string $phone = null;

    #[ORM\Column(name: 'location', type: 'string', length: 200, nullable: false)]
    private ?string $location = null;

    #[ORM\Column(name: 'created_at', type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(name: 'status', type: 'string', length: 50, nullable: false)]
    private ?string $status = 'en_attente';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function setProductId(?int $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

    public function getCustomerName(): ?string
    {
        return $this->customerName;
    }

    public function setCustomerName(?string $customerName): self
    {
        $this->customerName = $customerName;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }
=======
    #[ORM\Column(name: "idCommande", type: "integer")]
    private int $idCommande;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $dateCommande;

    #[ORM\Column(type: "string", length: 50)]
    private string $statut;

    #[ORM\Column(type: "float")]
    private float $total;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "commandes")]
    #[ORM\JoinColumn(name: 'idClient', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $idClient;

    public function getIdCommande()
    {
        return $this->idCommande;
    }

    public function setIdCommande($value)
    {
        $this->idCommande = $value;
    }

    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    public function setDateCommande($value)
    {
        $this->dateCommande = $value;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($value)
    {
        $this->statut = $value;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($value)
    {
        $this->total = $value;
    }

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setIdClient($value)
    {
        $this->idClient = $value;
    }

    #[ORM\OneToMany(mappedBy: "idCommande", targetEntity: Livraison::class)]
    private Collection $livraisons;

    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraison(Livraison $livraison): self
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons[] = $livraison;
            $livraison->setIdCommande($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): self
    {
        if ($this->livraisons->removeElement($livraison)) {
            if ($livraison->getIdCommande() === $this) {
                $livraison->setIdCommande(null);
            }
        }

        return $this;
    }

    #[ORM\OneToMany(mappedBy: "idCommande", targetEntity: Commande_produit::class)]
    private Collection $commande_produits;
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
}