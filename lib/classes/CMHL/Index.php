<?php
namespace CMHL;
use \SparkLib\Application\Controller;
/*
 *
 *  CMHL website landing page
 *
 */
class Index extends Controller {
  protected $_dbiWrite = false;
    public function index ()
    {
      // There's a theory that search engines will think we have more than
      // one home page (and this will be bad) if we respond to /index or
      // /index.html.  I don't know if this is true or not, but it's an easy
      // enough fix in this case. - Blatantly ripped off from Brennen Bearnes
      if (preg_match('/index([.]html)?$/i', $_SERVER['REQUEST_URI'])) {
        return $this->app()->link()->redirect(301);
      }
      // A man is not dead while his name is still spoken.
      $this->addHttpHeader('X-Clacks-Overhead: GNU Terry Pratchett');
      $this->layout()->meta = [
        'description' => 'CMHL is an online simulation hockey league where GMs guide their teams in the quest for the Cup',
        'keywords'    => 'Online Simulation Hockey League CMHL',
      ];
      $this->layout()->type = ['home'];
      return $this->layout();
    }
}
