<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AppointmentRepository")
 */
class Appointment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="appointments")
     */
    private $User;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer", inversedBy="appointments")
     */
    private $customer;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Place", inversedBy="appointments")
     */
    private $place;

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->User;
    }

    public function setUser(?User $User)
    {
        $this->User = $User;

        return $this;
    }



    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date)
    {
        $this->date = $date;

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place)
    {
        $this->place = $place;

        return $this;
    }



}
