<?php

require_once 'VehicleBase.php';
require_once 'VehicleActions.php';
require_once 'FileHandler.php';

class VehicleManager extends VehicleBase implements VehicleActions {
    use FileHandler;

    public function addVehicle($data) {
        $Vehicles= $this-> readFile();
        $Vehicles[]= $data;
        $this->writeFile($Vehicles);
    }

    public function editVehicle($id, $data) {
        $Vehicles = $this->readFile();
        if(isset($Vehicles[$id])){
            $Vehicles[$id] = $data;
            $this->writeFile($Vehicles);
        }
    }

    public function deleteVehicle($id) {
          $Vehicles = $this->readFile();
          if(isset($Vehicles[$id])){
            unset($Vehicles[$id]);
            $this->writeFile(array_values($Vehicles));
          }
        }
   

    public function getVehicles() {
        return $this->readfile();
    }

    // Implement abstract method
    public function getDetails() {
        return[
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image,

        ];
    }
}
