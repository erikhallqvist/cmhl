<?php
/*
 * Yes, thiswas copied straight across from SthsPlayer so all the bad decisions
 * were copied across and will have to be fixed here as well.
 */
use \SparkLib\DB;

class SthsGoalie {

  protected $attribs;

  public function __construct() {
    $this->attribs = [];
  }

  // return goalie by "number"
  // Note: for some reason, number isn't guaranteed to be unique but STHS treats
  // it that way. Do not want to deal with the possible edge cases of this, though.
  //
  // In the future this should return a goalie object instead
  public function getSthsGoalie($id) {
    $dbh = \SparkLib\DB::pdo();
    $sth = $dbh->prepare("SELECT * FROM sths_goalie WHERE number = :id");
    $sth->execute(['id' => $id]);

    $goalie = $sth->fetch(PDO::FETCH_ASSOC);
    return $goalie; // can be "false"
  }

  // This feels primitive, expensive, and stupid because it is... for now
  // Should just be called with $this->update() in the future and explode
  // the attributes instead and update everything at once
  public function updateSthsGoalie($id, $field, $val) {

    try {
      $dbh = \SparkLib\DB::pdo();
      $sth = $dbh->prepare("UPDATE sths_goalie SET $field = :val WHERE  number = :id");
      $sth->execute([':id'    => $id,
                     ':val'   => $val
                   ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
  }




}
