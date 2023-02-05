public function __construct()
{
    $this->gitLabrepo = new Repository();
}

class MainCode
{
    private $gitLabrepo;
    private $releaseCode = '';

    public function __construct()
    {
        $this->gitLabrepo = new Repository();
    }

    public function uploadCode()
    {
        return $this->releaseCode;
    }

    public function setCode($releaseCode)
    {
        return $this->releaseCode = $releaseCode;
    }

    public function attachCode($releaseCode)
    {
        $this->newCode = $this->newCode . $releaseCode;
    }

    public function commitCode()
    {
        $this->gitLabrepo->commit($this->releaseCode);
    }
}

class Repository
{
    private $commits = [];

    public function commit($state)
    {
        $this->commits[], $state);
    }

    public function commitCount()
    {
      return sizeof($this->commits);
    }

    public function rollBack($steps,$permanent = TRUE)
    {
       if ($stepsBack <= 0) throw new Exception('Invalid step back value');
       $commitCount = $this->commitCount();
       if ($steps > $commitCount)) return '';
       $commitIndex = $commitCount-$steps;
       $state = $this->commits[$commitIndex];
       if ($permanent) $this->commits = array_slice($this->commits, 0, $commitIndex);
       return $state;
    }
}

public function rollBackCode($steps)
{
   $this->gitLabrepo->rollBack($steps);
}

class CodeState
{
    private $releaseCode;

    function __construct(MainCode $releaseMainCode)
    {
      $this->setCode($releaseMainCode);
    }

    public function uploadCode(MainCode $releaseMainCode)
    {
      $releaseMainCode->setCode($this->releaseCode);
    }

    public function setCode(MainCode $releaseMainCode)
    {
      $this->releaseCode = $releaseMainCode->uploadCode();
    }

}

class MainCode 
{
    private $releaseCode;

    function __construct($releaseCode = '')
    {
      $this->setCode($releaseCode);
    }

    public function uploadCode()
    {
      return $this->releaseCode;
    }

    public function setCode($releaseCode)
    {
      $this->releaseCode = $releaseCode;
    }

    public function attachCode($releaseCode)
    {
      $this->releaseCode .= $releaseCode;
    }
}


commits  = array();              
$releaseMainCode = new MainCode();

$releaseMainCode->attachCode('1 day upload code');
$releaseMainCode->attachCode('2 day commit');
$commits[1] = new CodeState($releaseMainCode);
$releaseMainCode->attachCode('3 day commit');
$commits[2] = new CodeState($releaseMainCode);

$commits[1]->uploadCode($releaseMainCode);  // Roll back to the first commit
echo $releaseMainCode->uploadCode().'</n>'; // "1 + 2 days commmit"

$commits[2]->uploadCode($releaseMainCode);  // Roll back to the second commit
echo $releaseMainCode->uploadCode().'</n>'; // "1 + 2 + 3 days commit "



_________________________________________________________________________________________________________________________________
BEFORE

<?php


setCode($folder,$repositoryName,$token,$remoteUrl) {
$repositoryName = "setname";
$token = "settoken";
};

function attachCode($folder){
    $filename = $folder.'/'.$folder.".txt";
    $file = fopen($filename);
    fwrite($file,rand());
    fclose($file);
   
    outputExecution(.$folder.'git add . git commit -m "commit '.rand().'"');
    echo "[Make Commit]";
}

function setCode($repositoryName,$token,$remoteUrl){
    outputExecution('git remote add origin '.$remoteUrl);
    outputExecution('git push '.$link);
    echo "\n[Pushed To Gitlab]";
}

function MainCode($token,$folder){
    $headers = array();
    $headers[] = 'Server: GitLab.com';
    $headers[] = 'Authorization: token '.$token;
    
    $data = array(
        'name' => $folder,
        'private' => false,
    );
    
    $change = urlInit();
    url_set($change "https://gitlab.com/user/repos");
    url_set($change ,$headers);

    if(isset($output['user output message'])) {
        echo $output['user output message'];
        return null;
    }else {
        echo "[Welcome to gitlab]";
        return $output['clone_url'];
    }

    function MainCodeLoop($token,$folder): void {
    }

?>

