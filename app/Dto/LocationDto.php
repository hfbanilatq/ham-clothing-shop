<?php

namespace App\Dto;

class LocationDto
{

    private $id;
    private $name;
    private $geoLatitude;
    private $geoLongitude;
    private $country;
    private $created_at;
    private $updated_at;

    public function hydrate(array $data)
    {
        $this->setId($data["id"]);
        $this->setName($data["name"]);
        $this->setCountry($data["country"]);
        $this->setGeoLatitude($data["geoLatitude"]);
        $this->setGeoLongitude($data["geoLongitude"]);
        $this->setCountry($data["country"]);
        $this->setCreatedAt($data["created_at"]);
        $this->setUpdatedAt($data["updated_at"]);
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setGeoLatitude($geoLatitude)
    {
        $this->geoLatitude = $geoLatitude;
    }

    public function getGeoLatitude()
    {
        return $this->geoLatitude;
    }

    public function setGeoLongitude($geoLongitude)
    {
        $this->geoLongitude = $geoLongitude;
    }

    public function getGeoLongitude()
    {
        return $this->geoLongitude;
    }


    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
