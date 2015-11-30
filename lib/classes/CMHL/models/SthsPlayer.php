<?php

use \SparkLib\DB;

class SthsPlayer {

  protected $attribs;

  public function __construct() {
    $this->attribs = [];
  }

  // return player by "number"
  // Note: for some reason, number isn't guaranteed to be unique but STHS treats
  // it that way. Do not want to deal with the possible edge cases of this, though.
  //
  // In the future this should return a player object instead
  public function getSthsPlayer($id) {
    $dbh = \SparkLib\DB::pdo();
    $sth = $dbh->prepare("SELECT * FROM sths_player WHERE number = :id");
    $sth->execute(['id' => $id]);

    $player = $sth->fetch(PDO::FETCH_ASSOC);
    return $player; // can be "false"
  }

  // This feels primitive, expensive, and stupid because it is... for now
  // Should just be called with $this->update() in the future and explode
  // the attributes instead and update everything at once
  public function updateSthsPlayer($id, $field, $val) {

    try {
      $dbh = \SparkLib\DB::pdo();
      $sth = $dbh->prepare("UPDATE sths_player SET $field = :val WHERE  number = :id");
      $sth->execute([':id'    => $id,
                     ':val'   => $val
                   ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
  }




}
