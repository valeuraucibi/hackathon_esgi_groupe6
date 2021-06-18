<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * Stations
 * @ApiResource(
 *     collectionOperations={
 *          "get"={},
 *          "post"={}
 *     },
 *     itemOperations={
 *          "get"={},
 *          "put"={},
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *     "uniqueid": "exact", "id": "exact", "libelle": "partial", "latitude": "exact", "longitude": "exact", "altitude": "exact", "pays": "partial"
 * })
 * @ORM\Table(name="stations", uniqueConstraints={@ORM\UniqueConstraint(name="uniqueke", columns={"id"})}, indexes={@ORM\Index(name="pays", columns={"pays"}), @ORM\Index(name="base_climato", columns={"base_climato"}), @ORM\Index(name="longitude", columns={"longitude"}), @ORM\Index(name="station_reference", columns={"station_reference"}), @ORM\Index(name="libelle", columns={"libelle"}), @ORM\Index(name="departement", columns={"departement"}), @ORM\Index(name="pas_de_synop", columns={"pas_de_synop"}), @ORM\Index(name="climato_only", columns={"climato_only"}), @ORM\Index(name="latitude", columns={"latitude"})})
 * @ORM\Entity
 */
class Stations
{
    /**
     * @var int
     *
     * @ORM\Column(name="uniqueid", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uniqueid;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=15, nullable=false, options={"fixed"=true})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=0, nullable=false)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=3, nullable=false, options={"fixed"=true})
     */
    private $pays = '';

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $latitude = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $longitude = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="altitude", type="smallint", nullable=false, options={"unsigned"=true})
     */
    private $altitude = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="orientation", type="boolean", nullable=false)
     */
    private $orientation;

    /**
     * @var string
     *
     * @ORM\Column(name="station_reference", type="string", length=5, nullable=false, options={"fixed"=true})
     */
    private $stationReference;

    /**
     * @var int
     *
     * @ORM\Column(name="pas_de_synop", type="smallint", nullable=false, options={"comment"="si la station est un metar et qu'il n'existe pas de synop, champ à 1"})
     */
    private $pasDeSynop = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="climato_only", type="boolean", nullable=false)
     */
    private $climatoOnly = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dh_min_climato", type="date", nullable=true)
     */
    private $dhMinClimato;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dh_min_live", type="date", nullable=true)
     */
    private $dhMinLive;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dh_ouverture", type="date", nullable=true)
     */
    private $dhOuverture;

    /**
     * @var bool
     *
     * @ORM\Column(name="base_climato", type="boolean", nullable=false)
     */
    private $baseClimato = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_report", type="datetime", nullable=false)
     */
    private $lastReport;

    /**
     * @var string
     *
     * @ORM\Column(name="last_data", type="string", length=255, nullable=false)
     */
    private $lastData;

	/**
	 * @return int
	 */
	public function getUniqueid(): int {
		return $this->uniqueid;
	}

	/**
	 * @param int $uniqueid
	 */
	public function setUniqueid(int $uniqueid): void {
		$this->uniqueid = $uniqueid;
	}

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * @param string $id
	 */
	public function setId(string $id): void {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getGenre(): string {
		return $this->genre;
	}

	/**
	 * @param string $genre
	 */
	public function setGenre(string $genre): void {
		$this->genre = $genre;
	}

	/**
	 * @return string
	 */
	public function getLibelle(): string {
		return $this->libelle;
	}

	/**
	 * @param string $libelle
	 */
	public function setLibelle(string $libelle): void {
		$this->libelle = $libelle;
	}

	/**
	 * @return string
	 */
	public function getDepartement(): string {
		return $this->departement;
	}

	/**
	 * @param string $departement
	 */
	public function setDepartement(string $departement): void {
		$this->departement = $departement;
	}

	/**
	 * @return string
	 */
	public function getPays(): string {
		return $this->pays;
	}

	/**
	 * @param string $pays
	 */
	public function setPays(string $pays): void {
		$this->pays = $pays;
	}

	/**
	 * @return float
	 */
	public function getLatitude(): float|string {
		return $this->latitude;
	}

	/**
	 * @param float $latitude
	 */
	public function setLatitude(float|string $latitude): void {
		$this->latitude = $latitude;
	}

	/**
	 * @return float
	 */
	public function getLongitude(): float|string {
		return $this->longitude;
	}

	/**
	 * @param float $longitude
	 */
	public function setLongitude(float|string $longitude): void {
		$this->longitude = $longitude;
	}

	/**
	 * @return int
	 */
	public function getAltitude(): int|string {
		return $this->altitude;
	}

	/**
	 * @param int $altitude
	 */
	public function setAltitude(int|string $altitude): void {
		$this->altitude = $altitude;
	}

	/**
	 * @return bool
	 */
	public function isOrientation(): bool {
		return $this->orientation;
	}

	/**
	 * @param bool $orientation
	 */
	public function setOrientation(bool $orientation): void {
		$this->orientation = $orientation;
	}

	/**
	 * @return string
	 */
	public function getStationReference(): string {
		return $this->stationReference;
	}

	/**
	 * @param string $stationReference
	 */
	public function setStationReference(string $stationReference): void {
		$this->stationReference = $stationReference;
	}

	/**
	 * @return int
	 */
	public function getPasDeSynop(): int|string {
		return $this->pasDeSynop;
	}

	/**
	 * @param int $pasDeSynop
	 */
	public function setPasDeSynop(int|string $pasDeSynop): void {
		$this->pasDeSynop = $pasDeSynop;
	}

	/**
	 * @return bool
	 */
	public function isClimatoOnly(): bool|string {
		return $this->climatoOnly;
	}

	/**
	 * @param bool $climatoOnly
	 */
	public function setClimatoOnly(bool|string $climatoOnly): void {
		$this->climatoOnly = $climatoOnly;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getDhMinClimato(): ?\DateTime {
		return $this->dhMinClimato;
	}

	/**
	 * @param \DateTime|null $dhMinClimato
	 */
	public function setDhMinClimato(?\DateTime $dhMinClimato): void {
		$this->dhMinClimato = $dhMinClimato;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getDhMinLive(): ?\DateTime {
		return $this->dhMinLive;
	}

	/**
	 * @param \DateTime|null $dhMinLive
	 */
	public function setDhMinLive(?\DateTime $dhMinLive): void {
		$this->dhMinLive = $dhMinLive;
	}

	/**
	 * @return \DateTime|null
	 */
	public function getDhOuverture(): ?\DateTime {
		return $this->dhOuverture;
	}

	/**
	 * @param \DateTime|null $dhOuverture
	 */
	public function setDhOuverture(?\DateTime $dhOuverture): void {
		$this->dhOuverture = $dhOuverture;
	}

	/**
	 * @return bool
	 */
	public function isBaseClimato(): bool|string {
		return $this->baseClimato;
	}

	/**
	 * @param bool $baseClimato
	 */
	public function setBaseClimato(bool|string $baseClimato): void {
		$this->baseClimato = $baseClimato;
	}

	/**
	 * @return \DateTime
	 */
	public function getLastReport(): \DateTime {
		return $this->lastReport;
	}

	/**
	 * @param \DateTime $lastReport
	 */
	public function setLastReport(\DateTime $lastReport): void {
		$this->lastReport = $lastReport;
	}

	/**
	 * @return string
	 */
	public function getLastData(): string {
		return $this->lastData;
	}

	/**
	 * @param string $lastData
	 */
	public function setLastData(string $lastData): void {
		$this->lastData = $lastData;
	}
}
