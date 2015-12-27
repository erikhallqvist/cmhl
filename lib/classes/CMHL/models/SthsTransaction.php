<?php
/*
 * Yes, this was copied straight across from SthsPlayer so all the bad decisions
 * were copied across and will have to be fixed here as well.
 */
use \SparkLib\DB;

class SthsTransaction {

  // Transaction types we care about
  const ALL       = 99;
  const TRADE     = 1;
  const BUYOUT    = 2;
  const POSITION  = 3;
  const SIGNING   = 4;
  const INJURY    = 5;
  const SUSPEND   = 6;

  // Once again - this is interesting. We have no truly unique values outside of possibly
  // the time stamp + value. Remember that trades also go in the trade history table.
  public function addTransaction($id, $type, $time, $value) {
    $dbh = \SparkLib\DB::pdo();
    $sth = $dbh->prepare("SELECT * FROM transactions WHERE id = :id AND datetime = :time");
    $sth->execute([':time' => $time,
                   ':id'   => $id]);

    $transaction = $sth->fetch(PDO::FETCH_ASSOC);
    //compare value to value in result - obviously if they're the same, no insert!
    if($transaction['id'] == $id)
      return "ALREADY HERE <BR>";
    else
    {
    $sth = $dbh->prepare("INSERT INTO transactions (id, transaction_type, datetime, value)
                          VALUES (:id, :type, :time, :value);");
    $sth->execute([':id'    => $id,
                   ':type'  => $type,
                   ':time'  => $time,
                   ':value' => $value
                 ]);

    $transaction = $sth->fetch(PDO::FETCH_ASSOC);

    return $transaction; // can be "false"
    }
  }

  // Grab a bunch of transactions - will add team filter eventually
  public function getTransactions($limit, $type=SthsTransaction::ALL) {

    try {
      $dbh = \SparkLib\DB::pdo();
      if ($type != SthsTransaction::ALL)
      {
        $sth = $dbh->prepare("SELECT * from transactions WHERE transaction_type = :type LIMIT :limit");
        $sth->execute([':type'    => $type,
                       ':limit'   => $limit
                     ]);
      }
      else
      {
        $sth = $dbh->prepare("SELECT * from transactions LIMIT :limit");
        $sth->execute([':limit' => $limit]);
      }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $t = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $t;
  }

  public function updateTransaction($id, $timestamp, $newVal)
  {
    try{
      $dbh = \SparkLib\DB::pdo();
      $sth = $dbh->prepare("UPDATE transactions SET value = :newVal WHERE datetime = :time AND id = :id");
      $sth->execute([':newVal'  => $newVal,
                     ':time'    => $timestamp,
                     ':id'      => $id
                   ]);
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }




}
