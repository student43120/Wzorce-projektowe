<?php

class jukebox implements CDInfo
{
    private CDAmountInfo $hasCD;
    private CDAmountInfo $noCD;
    private CDAmountInfo $jukeboxEmpty;
    private CDAmountInfo $CDAmountInfo;

    private int $CDinJukebox = 20;

    public function __construct()
    {
        $this->hasCD = new HasCD($this);
        $this->noCD = new NoCD($this);

        $this->CDAmountInfo = $this->noCD;

        if ($this->CDinJukebox < 0) {
            $this->CDAmountInfo = $this->jukeboxEmpty;
        }
    }

    public function setCDAmountInfo(CDAmountInfo $newCDAmountInfo)
    {
        $this->CDAmountInfo = $newCDAmountInfo;
    }

    public function setCDinJukebox(int $newCDinJukebox)
    {
        $this->CDinJukebox = $newCDinJukebox;
    }

    public function getCDinJukebox(): int
    {
        return $this->CDinJukebox;
    }

    public function CDInfo(): CDAmountInfo
    {
        return $this->CDAmountInfo;
    }

    public function insertCD()
    {
        $this->CDAmountInfo->insertCD();
    }

    public function removeCD()
    {
        $this->CDAmountInfo->removeCD();
    }

    public function getHasCDAmountInfo(): CDAmountInfo
    {
        return $this->hasCD;
    }

    public function getNoCDAmountInfo(): CDAmountInfo
    {
        return $this->noCD;
    }


}


//Proxy 

class infoJukebox implements CDInfo
{
    private $player;

    public function __construct(jukebox $jukebox)
    {
        $this->player = $jukebox;
    }

    public function CDInfo(): CDAmountInfo
    {
        return $this->player->CDInfo();
    }

    public function getCDinJukebox(): int
    {
        return $this->player->getCDinJukebox();
    }
}


interface CDAmountInfo
{
    public function insertCD();
    public function removeCD();
}

interface CDInfo
{
    public function CDInfo(): CDAmountInfo;
    public function getCDinJukebox(): int;
}


class HasCD implements CDAmountInfo

{
    private jukebox $jukebox;

    public function __construct(jukebox $newjukebox)
    {
        $this->jukebox = $newjukebox;
    }

    public function insertCD()
    {
        echo "CD is already inside";
    }

    public function removeCD()
    {
        echo "CD stick out.";
        $this->jukebox->setCDAmountInfo($this->jukebox->getNoCDAmountInfo());
    }


}


class NoCD implements CDAmountInfo
{
    private jukebox $jukebox; 

    public function insertCD()
    {
        echo "Please enter a CD";
        $this->jukebox->setCDAmountInfo($this->jukebox->getHasCDAmountInfo());
    }

    public function __construct(jukebox $newjukebox)
    {
        $this->jukebox = $newjukebox;
    }

    public function removeCD()
    {
        echo "enter CD First.";
    }

}
?>
____________________________________________________________________

Wrong code:
<?php

class CDstock
{    
    function InsertToStock() {

        $stockCDs = CDarray("Gold Hits by Beastie Boys", "Gold Hits by Abba", "Old School by Helix", "Duice Is in the House by Duice");
    
     }

    function UpdateCDarray($jukebox, $CDarray, $stock, $stockUrl) 
    
    {   
        select_jukebox($jukebox) or die("Please select jukebox. " . mysql_error());
        $resultInsert = queryStock("SHOW COLUMNS FROM " . $CDarray . " WHERE rowArray NOT IN ('id')");
        $insertToStockArray=array();
          if (NumbweOfRows($resultInsert) > 0) {
            while ($row = fetchStock($resultInsert)) {
                $insertToStockArray[] = $row['rowArray'];
                $array = arrayKey( $_POST, cdArray($insertToStockArray) );
            }
          }
          $updateStock = CdLoad(', ', $updates);
          $sql = sprintf("UPDATE %s SET %s WHERE id='%s'", $CDarray, $updateStock, $_POST['id']);
          queryStock($sql);
          if ($stock == 'yes') {
            redirect($stockUrl.'?id='.$_REQUEST['id'].'&'.$CDarray);
          } else { echo "jukebox in full!"; }
    }
    

    function CheckStock($stockCD) {
         
        $amountOfCDs = count($stockCD);
    }

}

class CD extends CDstock {

    function insertCD() {
        $this->query(
            "INSERT INTO `stock` ($CDs) VALUES ()",
            [
              $CDarray["upload"]["name"],
              file_get_contents($CDarray["upload"]["name"])
            ]
          );
          return true;

    }

    function removeCD() {

        function __destruct () {
            if ($this->JukeboxStatus !== null) { $this->JukeboxStatus = null; }
            if ($this->count !== null) { $this->count = null; }
          }

    }

}

class DbChecker extends CDstock {

    function checkJukeboxStatus()
    {
    $db = "CDarray";
    $conn = new mysqli($db) or die("Connect failed:". $conn -> error);
    return $conn;

    }
    function get () {
        $JukeboxStatus = [];
        while ($r = $this->JukeboxStatus->joinJukebox()) { $JukeboxStatus[] = $r; }
        return $JukeboxStatus;
      }


}




