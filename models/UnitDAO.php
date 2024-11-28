<?php
require_once 'Unit.php';
require_once 'BasePDODAO.php';

class UnitDAO extends BasePDODAO 
{
    public function getAll()
    {
        $request = "SELECT * FROM UNIT";
        $result = $this->execRequest($request);
        $units = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $unite = new Unit();
            $unite->set_id($row['id']);
            $unite->set_name($row['name']);
            $unite->set_cost((int) $row['cost']);
            $unite->set_origin($row['origin']);
            $unite->set_url_img($row['url_img']);
            $units[] = $unite;
        }
        return $units;
    }

    public function getById(string $id)
    {
        $request = "SELECT * FROM unit WHERE id = :id";
        $result = $this->execRequest($request, ['id' => $id]);
        $row = $result->fetch();
        $unit = new Unit();
        if($row != null){
            $unit->set_id($row['id']);
            $unit->set_name($row['name']);
            $unit->set_cost($row['cost']);
            $unit->set_origin($row['origin']);
            $unit->set_url_img($row['url_img']);
        }
        return $unit;
    }
}