<?php
use \SparkLib\Template;
use \SparkLib\Exception\AuthenticationException;
use \SparkLib\DB;
class CMHL extends \SparkLib\Application {
  protected $_defaultController = 'index';
  protected $_templateDir       = 'cmhl';
  protected $_dispatcher        = '';
  protected $_categories        = null;
  protected $_dbiWrite          = false;
  protected static $_hostname   = HOSTNAME_CMHL;
  protected static $_root       = '/';

  public function __construct ($environment)
  {
    parent::__construct($environment);
  }

}
