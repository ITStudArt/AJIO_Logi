<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LogsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
/**
 * @ORM\Entity(repositoryClass=LogsRepository::class)
 * @ApiFilter(
 *     SearchFilter::class,
 *     properties={
            "processedBy": "partial",
 *          "processedOn": "partial",
 *          "process": "exact",
 *          "resultMessage": "exact",
 *          "description": "partial"
 *     }
 * )
 * @ApiFilter(
 *     DateFilter::class,
 *     properties={
            "startDate",
 *          "endTime"
 *     }
 * )
 * @ApiFilter(
 *     RangeFilter::class,
 *     properties={"id"}
 * )
 * @ApiFilter(
 *     OrderFilter::class,
 *     properties={
 *           "id",
 *          "startDate",
 *          "endTime"
 *     },
 *     arguments={"orderParameterName"="_ord"}
 *     )
 * @ApiResource(
 *     attributes={
 *     "order"={"id":"DESC"},
 *     "pagination_client_items_per_page"=false,
 *     "maximum_items_per_page" = 15
 *     },
 *     itemOperations={"get"},
 *     collectionOperations={"get"},
 *     normalizationContext={
            "groups"={"read"}
 *     }
 * )
 */
class Logs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     */
    private $processedBy;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     * @Groups({"read"})
     */
    private $processedOn;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     */
    private $process;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read"})
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read"})
     */
    private $endTime;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     * @Groups({"read"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read"})
     */
    private $resultMessage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProcessedBy(): ?string
    {
        return $this->processedBy;
    }

    public function setProcessedBy(string $processedBy): self
    {
        $this->processedBy = $processedBy;

        return $this;
    }

    public function getProcessedOn(): ?string
    {
        return $this->processedOn;
    }

    public function setProcessedOn(string $processedOn): self
    {
        $this->processedOn = $processedOn;

        return $this;
    }

    public function getProcess(): ?string
    {
        return $this->process;
    }

    public function setProcess(string $process): self
    {
        $this->process = $process;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeInterface $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getResultMessage(): ?string
    {
        return $this->resultMessage;
    }

    public function setResultMessage(string $resultMessage): self
    {
        $this->resultMessage = $resultMessage;

        return $this;
    }
}
